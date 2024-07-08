
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'doctor') {
    header('Location: login.html');
    exit();
}

include 'db.php';

$doctor_id = $_SESSION['user_id'];
$query = "SELECT * FROM appointments WHERE doctor_id='$doctor_id' AND date >= CURDATE()";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Doctor Dashboard</h1>
    <h2>Upcoming Appointments</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Patient</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['patient_name']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
