<?php

global $conn;
session_start();
include 'db.php';


$contact = $_POST['contact'];
$medication =$_POST['medication'];
$medicalDate =$_POST['medicalDate'];
$surgery = $_POST['surgery'];
$medicalNote =$_POST['medicalNote'];
$diagnose =$_POST['diagnose'];
$diagonosesReport =$_POST['diagonosesReport'];

// Insert data into the MEDICAL_HISTORY table
$sql = "INSERT INTO MEDICAL_HISTORY (MH_ID, DateOfRecord, MedicalNote, PatientID) 
        VALUES (NULL, '$medicalDate', '$medicalNote', '$patientID')";
        
$patientID = $_SESSION['nid'];

if ($conn->query($sql) === TRUE) {
    $mh_id = $conn->insert_id; 
    echo "New Medical History record created successfully with MH_ID: $mh_id";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>