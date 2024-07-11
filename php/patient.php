<?php
// Database connection
global $servername, $username, $password, $dbname;
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$nid = $_POST['nid'];
$dob = $_POST['dob'];
$bloodGroup = $_POST['blood_group'];
$gender = $_POST['gender'];
$occupation = $_POST['occupation'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$phone = $_POST['phone'];

// Insert data into PERSON table
$sql = "INSERT INTO PERSON (NID, FirstName, LastName, Gender, Password, DateOfBirth)
        VALUES ('$nid', '$firstName', '$lastName', '$gender', '$password', '$dob')";

if ($conn->query($sql) === TRUE) {
    // Insert data into PATIENT table
    $sql = "INSERT INTO PATIENT (PatientID, Occupation, BloodGroup)
            VALUES ('$nid', '$occupation', '$bloodGroup')";

    if ($conn->query($sql) === TRUE) {
        // Insert data into PERSON_PHONE table
        $sql = "INSERT INTO PERSON_PHONE (NID, Phone)
                VALUES ('$nid', '$phone')";

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