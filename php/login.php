<?php
session_start();

include 'db_connection.php';

$userID = $_POST['userID'];
$password = $_POST['password'];

$sql = "SELECT * FROM USER_T WHERE userID='$userID' AND password_s='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['type'] == 'Customer') {
        header("Location: customer/index.html");
    }
    else if ($row['type'] == 'Vendor') {
        header("Location: vendor/index.html");
    }
    else if ($row['type'] == 'Farmer') {
        header("Location: farmer/index.html");
    }

    exit();
} else {
    echo "<script>alert('Invalid User ID or password'); window.history.back();</script>";
}

$conn->close();
?>
