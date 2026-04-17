<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/php/db.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL . '/login.php');
    exit();
}

$nid      = trim($_POST['nid'] ?? '');
$password = $_POST['password'] ?? '';

if ($nid === '' || $password === '') {
    header('Location: ' . BASE_URL . '/login.php?error=empty');
    exit();
}

$stmt = $conn->prepare("SELECT Password FROM PERSON WHERE NID = ?");
$stmt->bind_param('s', $nid);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
    $stmt->bind_result($hash);
    $stmt->fetch();
    if (password_verify($password, $hash)) {
        $_SESSION['nid'] = $nid;
        $stmt->close();
        $conn->close();
        header('Location: ' . BASE_URL . '/index.php');
        exit();
    }
}

$stmt->close();
$conn->close();
header('Location: ' . BASE_URL . '/login.php?error=invalid');
exit();
