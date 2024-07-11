<?php

global $conn;
session_start();
include 'db.php';
// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$bill = $_POST['bill'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO APPOINTMENT (AppointmentDate, AppointmentTime, Status, Cost, PatientID, PhysicianID) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssdii", $date, $time, $status, $bill, $patientID, $physicianID);

// Set parameters and execute
$status = 'Pending';
$patientID = 1; // Replace with actual patient ID logic
$physicianID = 1; // Replace with actual physician ID logic

if ($stmt->execute()) {
  echo "Appointment booked successfully";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>