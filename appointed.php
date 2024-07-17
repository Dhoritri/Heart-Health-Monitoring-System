<?php
global $conn;
session_start();
include 'php/db.php'; // Database connection file

// Fetch appointments for the logged-in patient
$patientID = $_SESSION['nid'];
$query = "SELECT * FROM APPOINTMENT WHERE PatientID = '$patientID'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching appointments: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="css/appoint.css">

</head>
<body>
<h1>My Appointments</h1>
<table>
    <thead>
    <tr>
        <th>Appointment ID</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['AppointmentID']; ?></td>
            <td><?php echo $row['AppointmentDate']; ?></td>
            <td><?php echo $row['AppointmentTime']; ?></td>
            <td><?php echo $row['Status']; ?></td>
            <td>
                <a href="php/edit-appointment.php?id=<?php echo $row['AppointmentID']; ?>">Edit</a>
                <a href="php/delete-appointment.php?id=<?php echo $row['AppointmentID']; ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<a href="index.php">Back to Home</a>
</body>
</html>

<?php mysqli_close($conn); ?>
