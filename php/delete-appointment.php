<?php
global $conn;
session_start();
include 'db.php'; // Database connection file

if (isset($_GET['id'])) {
    $appointmentID = $_GET['id'];
    $query = "DELETE FROM APPOINTMENT WHERE AppointmentID = '$appointmentID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: view-appointments.php");
        exit;
    } else {
        echo "Error deleting appointment: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
