<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "nigga"; // Change this to your actual password
$dbname = "HospitalManagement";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nid = $_SESSION['nid'];
$user = null;

if (isset($nid)) {
    $query = "
        SELECT p.FirstName, p.LastName, p.Gender, p.DateOfBirth, pat.PatientID, pat.Occupation, pat.BloodGroup 
        FROM PERSON p
        JOIN PATIENT pat ON p.NID = pat.PatientID
        WHERE p.NID = '$nid'
    ";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book an Appointment</title>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/appointment.css" />
    <link
            rel="stylesheet"
            type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
</head>
<body>
<header class="header">
    <a href="#" class="logo"><i class="fas fa-heartbeat"></i>Heart<i>C</i>are.</a>
    <div class="nav-link">
        <nav class="nav">
            <a href="index.php" class="nvlink">Home</a>
            <div class="dropdown">
                <a href="doctors.html" class="nvlink dropdown-toggle">Facility</a>
                <div class="dropdown-menu">
                    <a href="medicine.html">Medicine</a>
                    <a href="recommended.html">Recommendation</a>
                    <a href="hospital.html">Hospital</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="appointment.html" class="nvlink dropdown-toggle">Appointment</a>
                <div class="dropdown-menu">
                    <a href="appointment.html">Appointment</a>
                    <a href="doctors.html">Doctors</a>
                    <a href="book.html">Bed Facility</a>
                </div>
                <div>
                    <?php
                    if (isset($_SESSION['nid'])) {
                        echo '<div class="nvlink">User ID: ' . $nid . ' | <a href="logout.php"><button class="login">Log Out</button></a></div>';
                    } else {
                        echo '<a href="login.php"><button class="login">LogIn</button></a>';
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>
<form action="php/appointment.php" method="post">
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <div class="formbold-mb-5">
                <label for="name" class="formbold-form-label"> Full Name </label>
                <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Enter your Full Name"
                        class="formbold-form-input"
                        value="<?php echo isset($user) ? htmlspecialchars($user['FirstName'] . ' ' . $user['LastName']) : ''; ?>"
                />
            </div>
            <div class="flex flex-wrap formbold--mx-3">
                <div class="w-full sm:w-half formbold-px-3">
                    <div class="formbold-mb-5">
                        <label for="phone" class="formbold-form-label">
                            Phone Number
                        </label>
                        <input
                                type="text"
                                name="phone"
                                id="phone"
                                placeholder="Enter your phone number"
                                class="formbold-form-input"
                        />
                    </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                    <div class="formbold-mb-5">
                        <label for="email" class="formbold-form-label">
                            Email Address
                        </label>
                        <input
                                type="email"
                                name="email"
                                id="email"
                                placeholder="Enter your email"
                                class="formbold-form-input"
                        />
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap formbold--mx-3">
                <div class="w-full sm:w-half formbold-px-3">
                    <div class="formbold-mb-5">
                        <label for="date" class="formbold-form-label"> Date </label>
                        <input
                                type="date"
                                name="date"
                                id="date"
                                class="formbold-form-input"
                        />
                    </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                    <div class="formbold-mb-5">
                        <label for="time" class="formbold-form-label"> Time </label>
                        <input
                                type="time"
                                name="time"
                                id="time"
                                class="formbold-form-input"
                        />
                    </div>
                </div>
            </div>
            <div class="formbold-mb-5">
                <label for="bill" class="formbold-form-label"> Total Bill </label>
                <input
                        type="number"
                        name="bill"
                        id="bill"
                        placeholder="Generate bill"
                        class="formbold-form-input"
                />
            </div>
            <div>
                <button class="formbold-btn">Book Appointment</button>
            </div>
        </div>
    </div>
</form>
<script>
    let menu = document.querySelector('#menu-btn');
    let nav = document.querySelector('.nav');
    let dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    menu.onclick = () => {
        menu.classList.toggle('fa-times');
        nav.classList.toggle('active');
    };

    window.onscroll = () => {
        menu.classList.remove('fa-times');
        nav.classList.remove('active');
    };

    document.addEventListener('click', function(event) {
        let isClickInside = nav.contains(event.target);
        if (!isClickInside) {
            menu.classList.remove('fa-times');
            nav.classList.remove('active');
        }
    });

    dropdownToggles.forEach(toggle => {
        toggle.onclick = (event) => {
            event.preventDefault();
            let dropdownMenu = toggle.nextElementSibling;
            dropdownMenu.classList.toggle('active');
        };
    });
</script>
<script src="js/style.js"></script>
</body>
</html>
