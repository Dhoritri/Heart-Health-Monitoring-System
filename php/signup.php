<?php
include 'php/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $blood_group = $_POST['blood_group'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (isset($_POST['occupation'])) {
        // Patient Registration
        $occupation = $_POST['occupation'];
        $phone = $_POST['phone'];

        // Insert into PERSON table
        $stmt = $conn->prepare("INSERT INTO PERSON (FirstName, LastName, Gender, Password, DateOfBirth) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $gender, $password, $dob);
        $stmt->execute();
        $nid = $stmt->insert_id;
        $stmt->close();

        // Insert into PATIENT table
        $stmt = $conn->prepare("INSERT INTO PATIENT (PatientID, Occupation, BloodGroup) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $nid, $occupation, $blood_group);
        $stmt->execute();
        $stmt->close();

        // Insert into PERSON_PHONE table
        $stmt = $conn->prepare("INSERT INTO PERSON_PHONE (NID, Phone) VALUES (?, ?)");
        $stmt->bind_param("is", $nid, $phone);
        $stmt->execute();
        $stmt->close();

    } else {
        // Physician Registration
        $specialization = $_POST['specialization'];
        $experience = $_POST['experience'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $work_hour = $start_time . " - " . $end_time;

        // Insert into PERSON table
        $stmt = $conn->prepare("INSERT INTO PERSON (FirstName, LastName, Gender, Password, DateOfBirth) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $gender, $password, $dob);
        $stmt->execute();
        $nid = $stmt->insert_id;
        $stmt->close();

        // Insert into PHYSICIAN table
        $stmt = $conn->prepare("INSERT INTO PHYSICIAN (PhysicianID, Specialization, WorkHour, YearsExperience) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $nid, $specialization, $work_hour, $experience);
        $stmt->execute();
        $stmt->close();

        // Insert certificate into PHYSICIAN_CERTIFICATE table
        if (isset($_FILES['certificate'])) {
            $certificate = file_get_contents($_FILES['certificate']['tmp_name']);
            $stmt = $conn->prepare("INSERT INTO PHYSICIAN_CERTIFICATE (PhysicianID, Certification) VALUES (?, ?)");
            $stmt->bind_param("ib", $nid, $certificate);
            $stmt->execute();
            $stmt->close();
        }
    }
    $conn->close();
}
?>
