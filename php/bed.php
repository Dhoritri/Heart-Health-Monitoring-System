<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/php/db.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL . '/pages/book.php');
    exit();
}

if (empty($_SESSION['nid'])) {
    header('Location: ' . BASE_URL . '/login.php');
    exit();
}

$hospital    = trim($_POST['hospital'] ?? '');
$ward        = trim($_POST['ward'] ?? '');
$check_in    = $_POST['check_in'] ?? '';
$check_out   = $_POST['check_out'] ?? '';
$patient_nid = $_SESSION['nid'];

if (!$hospital || !$ward || !$check_in || !$check_out) {
    header('Location: ' . BASE_URL . '/pages/book.php?error=missing');
    exit();
}

$stmt = $conn->prepare("INSERT INTO BED_BOOKING (PatientID, HospitalName, Ward, CheckIn, CheckOut) VALUES (?,?,?,?,?)");
$stmt->bind_param('sssss', $patient_nid, $hospital, $ward, $check_in, $check_out);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header('Location: ' . BASE_URL . '/pages/book.php?success=1');
    exit();
}

$stmt->close();
$conn->close();
header('Location: ' . BASE_URL . '/pages/book.php?error=failed');
exit();
