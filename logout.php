<?php
require_once __DIR__ . '/config.php';

if (session_status() === PHP_SESSION_NONE) session_start();
$_SESSION = [];
session_destroy();
header('Location: ' . BASE_URL . '/login.php');
exit();
