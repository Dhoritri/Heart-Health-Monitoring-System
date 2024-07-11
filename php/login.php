<?php
global $conn;
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nid = $_POST['nid'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT Password FROM person WHERE nid = ?");
    $stmt->bind_param("s", $nid);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['nid'] = $nid;
            header("Location: ../index.php");
            exit();
        } else {
            echo "Invalid NID or password";
        }
    } else {
        echo "Invalid NID or password";
    }

    $stmt->close();
    $conn->close();
}
