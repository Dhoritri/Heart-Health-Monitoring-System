<?php
require_once dirname(__DIR__) . '/config.php';
require_once dirname(__DIR__) . '/php/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . BASE_URL . '/signup.php');
    exit();
}

$first    = trim($_POST['first_name'] ?? '');
$last     = trim($_POST['last_name'] ?? '');
$nid      = trim($_POST['nid'] ?? '');
$dob      = $_POST['dob'] ?? '';
$blood    = $_POST['blood_group'] ?? '';
$gender   = $_POST['gender'] ?? '';
$occ      = trim($_POST['occupation'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';

if (!$first || !$last || !$nid || !$dob || !$gender || !$password || !$phone) {
    header('Location: ' . BASE_URL . '/signup.php?error=missing&tab=patient');
    exit();
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$conn->begin_transaction();
try {
    $s1 = $conn->prepare("INSERT INTO PERSON (NID, FirstName, LastName, Gender, Password, DateOfBirth) VALUES (?,?,?,?,?,?)");
    $s1->bind_param('ssssss', $nid, $first, $last, $gender, $hash, $dob);
    $s1->execute();

    $s2 = $conn->prepare("INSERT INTO PATIENT (PatientID, Occupation, BloodGroup) VALUES (?,?,?)");
    $s2->bind_param('sss', $nid, $occ, $blood);
    $s2->execute();

    $s3 = $conn->prepare("INSERT INTO PERSON_PHONE (NID, Phone) VALUES (?,?)");
    $s3->bind_param('ss', $nid, $phone);
    $s3->execute();

    $conn->commit();
} catch (Exception $e) {
    $conn->rollback();
    header('Location: ' . BASE_URL . '/signup.php?error=exists&tab=patient');
    exit();
}

if (session_status() === PHP_SESSION_NONE) session_start();
$_SESSION['nid'] = $nid;
header('Location: ' . BASE_URL . '/index.php');
exit();
