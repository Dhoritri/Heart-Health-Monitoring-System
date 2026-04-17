<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/php/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL . '/signup.php');
    exit();
}

$first   = trim($_POST['first_name'] ?? '');
$last    = trim($_POST['last_name'] ?? '');
$nid     = trim($_POST['nid'] ?? '');
$dob     = $_POST['dob'] ?? '';
$gender  = $_POST['gender'] ?? '';
$spec    = $_POST['specialization'] ?? '';
$exp     = $_POST['experience'] ?? '';
$start   = $_POST['start_time'] ?? '';
$end     = $_POST['end_time'] ?? '';
$password = $_POST['password'] ?? '';

if (!$first || !$last || !$nid || !$dob || !$gender || !$spec || !$password) {
    header('Location: ' . BASE_URL . '/signup.php?error=missing&tab=physician');
    exit();
}

$hash    = password_hash($password, PASSWORD_DEFAULT);
$workhour = "$start-$end";
$cert    = '';

if (!empty($_FILES['certificate']['name'])) {
    $upload_dir = ROOT_DIR . '/uploads/';
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);
    $ext = strtolower(pathinfo($_FILES['certificate']['name'], PATHINFO_EXTENSION));
    if ($ext !== 'pdf') {
        header('Location: ' . BASE_URL . '/signup.php?error=filetype&tab=physician');
        exit();
    }
    $cert = $nid . '_' . time() . '.pdf';
    move_uploaded_file($_FILES['certificate']['tmp_name'], $upload_dir . $cert);
}

$conn->begin_transaction();
try {
    $s1 = $conn->prepare("INSERT INTO PERSON (NID, FirstName, LastName, Gender, Password, DateOfBirth) VALUES (?,?,?,?,?,?)");
    $s1->bind_param('ssssss', $nid, $first, $last, $gender, $hash, $dob);
    $s1->execute();

    $s2 = $conn->prepare("INSERT INTO PHYSICIAN (PhysicianID, Specialization, WorkHour, YearsExperience) VALUES (?,?,?,?)");
    $s2->bind_param('ssss', $nid, $spec, $workhour, $exp);
    $s2->execute();

    if ($cert) {
        $s3 = $conn->prepare("INSERT INTO PHYSICIAN_CERTIFICATE (PhysicianID, Certification) VALUES (?,?)");
        $s3->bind_param('ss', $nid, $cert);
        $s3->execute();
    }

    $conn->commit();
} catch (Exception $e) {
    $conn->rollback();
    header('Location: ' . BASE_URL . '/signup.php?error=exists&tab=physician');
    exit();
}

if (session_status() === PHP_SESSION_NONE) session_start();
$_SESSION['nid'] = $nid;
header('Location: ' . BASE_URL . '/index.php');
exit();
