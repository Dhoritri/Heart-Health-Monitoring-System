<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/php/db.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL . '/pages/medical.php');
    exit();
}

if (empty($_SESSION['nid'])) {
    header('Location: ' . BASE_URL . '/login.php');
    exit();
}

$patient_nid = $_SESSION['nid'];
$condition   = trim($_POST['condition'] ?? '');
$description = trim($_POST['description'] ?? '');
$date        = $_POST['date'] ?? date('Y-m-d');

if (!$condition) {
    header('Location: ' . BASE_URL . '/pages/medical.php?error=missing');
    exit();
}

$stmt = $conn->prepare("INSERT INTO MEDICAL_HISTORY (PatientID, Condition_Name, Description, RecordDate) VALUES (?,?,?,?)");
$stmt->bind_param('ssss', $patient_nid, $condition, $description, $date);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header('Location: ' . BASE_URL . '/pages/medical.php?success=1');
    exit();
}

$stmt->close();
$conn->close();
header('Location: ' . BASE_URL . '/pages/medical.php?error=failed');
exit();
