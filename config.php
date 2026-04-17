<?php
// Auto-detect base URL — case-insensitive compare, preserve original casing
$_rd = str_replace('\\', '/', __DIR__);
$_dr = rtrim(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] ?? ''), '/');
// Use strlen of doc-root to slice the suffix from the original-case path
$_base = ($_dr !== '' && stripos($_rd, $_dr) === 0)
    ? substr($_rd, strlen($_dr))
    : '';
define('BASE_URL', rtrim($_base, '/'));
unset($_rd, $_dr, $_base);

define('ROOT_DIR', __DIR__);
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');       // Change to your MySQL password
define('DB_NAME', 'hospitalmanagement');
