<?php

global $conn;
session_start();
include 'db.php';


$
$contact = $_POST['contact'];
$medication =$_POST['$medication'];
$medicalDate =$_POST['$medicalDate'];
$surgery = $_POST['$surgery'];
$medicalNote =$_POST['$medicalNote'];
$diagnose =$_POST['$diagnose'];
$diagonosesReport =$_POST['$diagonosesReport'];


// Insert data into the BED_BOOKING table
$sql = "INSERT INTO MDICAL_HISTORY ( Contact, DateOfRecord, Surgery, MedicalNote, Diagnose, DiagonoseReport ) 
        VALUES ('$contact','$medicalDate','$surgery','$medicalNote','$diagnose','$diagonosesReport')";

if ($conn->query($sql) === TRUE) {
    echo "New Medical History record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();