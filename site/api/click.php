<?php
/**
 * Which box people actually press.
 * Appends one line per outbound click; no cookies, no IP, no identifiers.
 * Read it with: tail -100 cache/clicks.log
 */
header('Content-Type: application/json');

$raw  = file_get_contents('php://input', false, null, 0, 512);
$data = json_decode((string) $raw, true);

if (is_array($data) && isset($data['t'])) {
    $target = preg_replace('/[^a-z0-9:_\-]/i', '', (string) $data['t']);
    $page   = preg_replace('/[^a-z0-9\/_\-]/i', '', (string) ($data['p'] ?? ''));
    if ($target !== '') {
        $line = gmdate('Y-m-d H:i') . "\t" . substr($target, 0, 40) . "\t" . substr($page, 0, 40) . "\n";
        @file_put_contents(__DIR__ . '/../cache/clicks.log', $line, FILE_APPEND | LOCK_EX);
    }
}
http_response_code(204);
