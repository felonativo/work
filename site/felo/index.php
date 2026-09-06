<?php
$cfg = require __DIR__ . '/../inc/config.php';
$str = require __DIR__ . '/../inc/strings.php';
require __DIR__ . '/../inc/youtube.php';
require __DIR__ . '/../inc/render.php';
echo render_page($cfg, $str, 'felo');
