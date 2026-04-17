<?php
require_once ROOT_DIR . '/config.php';

function require_login(): void {
    if (session_status() === PHP_SESSION_NONE) session_start();
    if (empty($_SESSION['nid'])) {
        header('Location: ' . BASE_URL . '/login.php');
        exit();
    }
}

function current_user(): ?string {
    if (session_status() === PHP_SESSION_NONE) session_start();
    return $_SESSION['nid'] ?? null;
}

function is_logged_in(): bool {
    if (session_status() === PHP_SESSION_NONE) session_start();
    return !empty($_SESSION['nid']);
}
