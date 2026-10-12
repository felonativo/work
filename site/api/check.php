<?php
/**
 * Setup check — open https://sannayfelo.com/api/check.php in a browser.
 * Shows only yes/no facts, never the API key. Add ?brevo=1 to test the key
 * against Brevo. Delete this file once everything works.
 */
header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: no-store');

$root = __DIR__ . '/..';
$cfgOk = is_file("$root/inc/config.php");
$cfg = $cfgOk ? require "$root/inc/config.php" : [];
$sec = is_file("$root/inc/secrets.php") ? require "$root/inc/secrets.php" : null;
$key = is_array($sec) ? (string) ($sec['brevo_api_key'] ?? '') : '';

$lines = [
  'PHP version'               => PHP_VERSION,
  'inc/config.php found'      => $cfgOk ? 'yes' : 'NO',
  'brevo_list_id'             => (string) ($cfg['newsletter']['brevo_list_id'] ?? 'MISSING'),
  'inc/secrets.php found'     => $sec === null ? 'NO' : 'yes',
  'API key filled in'         => $key === '' ? 'NO' : 'yes (' . strlen($key) . ' characters)',
  'curl available'            => function_exists('curl_init') ? 'yes' : 'NO',
  'cache/ writable'           => is_writable("$root/cache") ? 'yes' : 'NO',
  'new form code deployed'    => is_file("$root/newsletter/gracias/index.php") ? 'yes' : 'NO',
  'subscribers.csv exists'    => is_file("$root/cache/subscribers.csv") ? 'yes' : 'no',
  'errors.log exists'         => is_file("$root/cache/errors.log") ? 'yes' : 'no',
];

if (isset($_GET['brevo']) && $key !== '' && function_exists('curl_init')) {
    $ch = curl_init('https://api.brevo.com/v3/contacts/lists/' . (int) ($cfg['newsletter']['brevo_list_id'] ?? 0));
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 8,
        CURLOPT_HTTPHEADER => ['accept: application/json', 'api-key: ' . $key]]);
    $body = (string) curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $j = json_decode($body, true);
    if ($code === 200)      $ans = 'OK — list "' . ($j['name'] ?? '?') . '" found';
    elseif ($code === 401)  $ans = 'KEY REJECTED (401) — key wrong or copied with spaces';
    elseif ($code === 404)  $ans = 'LIST NOT FOUND (404) — check brevo_list_id';
    else                    $ans = "HTTP $code — " . substr($body, 0, 200);
    $lines['Brevo answer'] = $ans;}

foreach ($lines as $k => $v) echo str_pad($k, 26) . $v . "\n";
if (is_file("$root/cache/errors.log")) {
    echo "\nLast errors:\n";
    $log = file("$root/cache/errors.log");
    foreach (array_slice($log, -5) as $l) echo '  ' . $l;
}
