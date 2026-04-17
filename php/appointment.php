<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/php/db.php';

if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL . '/pages/appointment.php');
    exit();
}

if (empty($_SESSION['nid'])) {
    header('Location: ' . BASE_URL . '/login.php');
    exit();
}

$date        = $_POST['date'] ?? '';
$time        = $_POST['time'] ?? '';
$physician   = intval($_POST['physician'] ?? 0);
$patient_nid = $_SESSION['nid'];
$status      = 'Pending';
$cost        = floatval($_POST['bill'] ?? 0);

if (!$date || !$time || !$physician) {
    header('Location: ' . BASE_URL . '/pages/appointment.php?error=missing');
    exit();
}

$stmt = $conn->prepare("INSERT INTO APPOINTMENT (AppointmentDate, AppointmentTime, Status, Cost, PatientID, PhysicianID) VALUES (?,?,?,?,?,?)");
$stmt->bind_param('sssdsi', $date, $time, $status, $cost, $patient_nid, $physician);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header('Location: ' . BASE_URL . '/pages/appointment.php?success=1');
    exit();
}

$stmt->close();
$conn->close();
header('Location: ' . BASE_URL . '/pages/appointment.php?error=failed');
exit();
