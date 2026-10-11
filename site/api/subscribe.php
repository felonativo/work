<?php
/**
 * Newsletter signup.
 *
 * 1. Validates the email.
 * 2. ALWAYS appends it to cache/subscribers.csv first (private backup — blocked
 *    from the web by cache/.htaccess), so a Brevo outage or a missing API key
 *    never loses a subscriber. Columns: time, email, lang, page, brevo_status.
 * 3. Sends it to Brevo: double opt-in if a template id is configured,
 *    otherwise straight onto the list.
 *
 * Answers JSON: {"ok":true,"mode":"doi"|"plain"|"pending"} or {"ok":false,"error":"invalid"|"server"}.
 */
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function out(int $code, array $body): void {
    http_response_code($code);
    echo json_encode($body);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') out(405, ['ok' => false, 'error' => 'method']);

$data = json_decode((string) file_get_contents('php://input', false, null, 0, 2048), true);
if (!is_array($data)) out(400, ['ok' => false, 'error' => 'invalid']);

// Honeypot: real people never fill this hidden field. Pretend success to bots.
if (!empty($data['website'])) out(200, ['ok' => true, 'mode' => 'doi']);

$email = strtolower(trim((string) ($data['email'] ?? '')));
if (strlen($email) > 254 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    out(422, ['ok' => false, 'error' => 'invalid']);
}
$lang = ($data['lang'] ?? '') === 'en' ? 'en' : 'es';
$page = substr(preg_replace('/[^a-z0-9\/_\-]/i', '', (string) ($data['page'] ?? '')), 0, 40);

$cfg  = require __DIR__ . '/../inc/config.php';
$nl   = $cfg['newsletter'];
$sec  = is_file(__DIR__ . '/../inc/secrets.php') ? require __DIR__ . '/../inc/secrets.php' : [];
$key  = (string) ($sec['brevo_api_key'] ?? '');
$list = (int) $nl['brevo_list_id'];
$tpl  = (int) $nl['doi_template_id'];

$cache = __DIR__ . '/../cache/';

function backup(string $path, array $row): void {
    $fh = @fopen($path, 'ab');
    if (!$fh) return;
    flock($fh, LOCK_EX);
    fputcsv($fh, $row);
    flock($fh, LOCK_UN);
    fclose($fh);
}

/** @return array{0:int,1:string} http status, body */
function brevo(string $key, string $path, array $payload): array {
    $ch = curl_init('https://api.brevo.com/v3' . $path);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode($payload),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 8,
        CURLOPT_HTTPHEADER     => [
            'accept: application/json',
            'content-type: application/json',
            'api-key: ' . $key,
        ],
    ]);
    $body = (string) curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return [$code, $body];
}

// Not configured yet: keep the email safely, tell the visitor all is well.
if ($key === '' || $list <= 0 || !function_exists('curl_init')) {
    backup($cache . 'subscribers.csv', [gmdate('c'), $email, $lang, $page, 'not-configured']);
    out(200, ['ok' => true, 'mode' => 'pending']);
}

if ($tpl > 0) {
    [$code, $body] = brevo($key, '/contacts/doubleOptinConfirmation', [
        'email'          => $email,
        'includeListIds' => [$list],
        'templateId'     => $tpl,
        'redirectionUrl' => $nl['confirm_url'],
    ]);
    $mode = 'doi';
} else {
    [$code, $body] = brevo($key, '/contacts', [
        'email'         => $email,
        'listIds'       => [$list],
        'updateEnabled' => true,
    ]);
    $mode = 'plain';
}

$ok = $code >= 200 && $code < 300;
backup($cache . 'subscribers.csv', [gmdate('c'), $email, $lang, $page, $ok ? 'ok' : "error-$code"]);
if (!$ok) {
    @file_put_contents($cache . 'errors.log',
        gmdate('c') . "\t$code\t" . substr($body, 0, 300) . "\n", FILE_APPEND | LOCK_EX);
    // The email is safe in the backup; the visitor still sees success.
    out(200, ['ok' => true, 'mode' => 'pending']);
}
out(200, ['ok' => true, 'mode' => $mode]);
