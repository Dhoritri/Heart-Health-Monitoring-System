<?php

global $conn;
session_start();
include 'db.php'; // This file should handle the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointmentID = $_POST['appointmentID'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = $_POST['status'];

    $query = "UPDATE APPOINTMENT SET AppointmentDate = '$date', AppointmentTime = '$time', Status = '$status' WHERE AppointmentID = '$appointmentID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: view-appointments.php");
        exit;
    } else {
        echo "Error updating appointment: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
