<?php

global $conn;
session_start();
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$bookingDate = $_POST['bookingDate'];
$patientID = $_POST['patientID'];

// Insert data into the BED_BOOKING table
$sql = "INSERT INTO BED_BOOKING (Name, Email, Contact, BookingDate, PatientID)
        VALUES ('$name', '$email', '$contact', '$bookingDate', '$patientID')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();