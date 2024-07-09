<?php
session_start();
include 'db.php'; // Assuming db.php connects to the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nid = $_POST['nid'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM person WHERE nid = ? AND password = ?");
    $stmt->bind_param("ss", $nid, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        header("Location: ../index.html");
    } else {
        echo "Invalid email or password";
    }

    $stmt->close();
    $conn->close();
}
?>
