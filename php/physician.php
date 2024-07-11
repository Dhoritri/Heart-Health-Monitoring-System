<?php
// Database connection
global $conn;
include 'db.php';

// Get form data
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$nid = $_POST['nid'];
$dob = $_POST['dob'];
$bloodGroup = $_POST['blood_group'];
$gender = $_POST['gender'];
$specialization = $_POST['specialization'];
$experience = $_POST['experience'];
$email = $_POST['email'];
$startTime = $_POST['start_time'];
$endTime = $_POST['end_time'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$certificate = $_POST['$certificate'];
$certificate = $_FILES['certificate']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["certificate"]["name"]);

// Move uploaded file
if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars(basename($_FILES["certificate"]["name"])). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

// Insert data into PERSON table
$sql = "INSERT INTO PERSON (NID, FirstName, LastName, Gender, Password, DateOfBirth)
        VALUES ('$nid', '$firstName', '$lastName', '$gender', '$password', '$dob')";

if ($conn->query($sql) === TRUE) {
    // Insert data into PHYSICIAN table
    $sql = "INSERT INTO PHYSICIAN (PhysicianID, Specialization, WorkHour, YearsExperience)
            VALUES ('$nid', '$specialization', '$startTime-$endTime', '$experience')";

    if ($conn->query($sql) === TRUE) {
        // Insert data into PHYSICIAN_CERTIFICATE table
        $sql = "INSERT INTO PHYSICIAN_CERTIFICATE (PhysicianID, Certification)
                VALUES ('$nid', '$certificate')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();