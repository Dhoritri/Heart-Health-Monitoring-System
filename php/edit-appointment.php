<?php
global $conn;
session_start();
include 'db.php'; // Adjust path if necessary

$appointmentID = $_GET['id']; // Assuming you're retrieving ID from URL parameter

// Fetch appointment details
$query = "SELECT * FROM APPOINTMENT WHERE AppointmentID = $appointmentID";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error fetching appointment details: ' . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

// Example form using fetched data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <!-- Include your CSS link here -->
</head>
<body>
<h1>Edit Appointment</h1>
<form action="update-appointment.php" method="post">
    <input type="hidden" name="appointmentID" value="<?php echo $appointmentID; ?>">
    <label>Date:</label>
    <input type="date" name="date" value="<?php echo $row['AppointmentDate']; ?>">
    <label>Time:</label>
    <input type="time" name="time" value="<?php echo $row['AppointmentTime']; ?>">
    <label>Status:</label>
    <select name="status">
        <option value="Pending" <?php echo ($row['Status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
        <option value="Confirmed" <?php echo ($row['Status'] == 'Confirmed') ? 'selected' : ''; ?>>Confirmed</option>
        <option value="Cancelled" <?php echo ($row['Status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
    </select>
    <button type="submit">Update</button>
</form>
<a href="view-appointments.php">Cancel</a>
</body>
</html>

<?php
mysqli_close($conn); // Close connection at the end of the script
?>
