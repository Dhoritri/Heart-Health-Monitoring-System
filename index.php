<?php
    session_start();
    include 'php/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HeartCare | Home</title>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link
            rel="stylesheet"
            type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
</head>
<body>
<header class="header">
    <a href="#" class="logo"
    ><i class="fas fa-heartbeat"></i>Heart<i>C</i>are.</a
    >
    <div class="nav-link">
        <nav class="nav">
            <a href="#home" class="nvlink">Home</a>
            <a href="#services" class="nvlink">Services</a>
            <a href="#about" class="nvlink">About</a>
            <div class="dropdown">
                <a href="doctors.html" class="nvlink dropdown-toggle">Facility</a>
                <div class="dropdown-menu">
                    <a href="medicine.html">Medicine</a>
                    <a href="recommended.html">Recommendation</a>
                    <a href="hospital.html">Hospital</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="appointment.php" class="nvlink dropdown-toggle"
                >Appointment</a
                >
                <div class="dropdown-menu">
                    <a href="appointment.php">Appointment</a>
                    <a href="doctors.html">Doctors</a>
                    <a href="book.html">Bed Facility</a>
                </div>
            </div>
            <div>
                <?php
                $nid = $_SESSION['nid'];
                if (isset($_SESSION['nid'])) {
                    echo '<div class="nvlink">User ID: ' . $nid . ' | <a href="login.php"><button class="login">Log Out</button></a></div>';
                } else {
                    echo '<a href="login.php"><button class="login">LogIn</button></a>';
                }
                ?>
            </div>
        </nav>
    </div>
    <div id="menu-btn" class="fas fa-bars"></div>
</header>
<section class="home" id="home">
    <div class="image">
        <img
                src="images/medical-banner-with-doctor-wearing-goggles_23-2149611193.avif"
                alt=""
        />
    </div>
    <div class="content">
        <h3>Stay Safe, Stay Healthy</h3>
        <div class="typewriter">
            <p class="text">Get the best medical care from our expert doctors</p>
        </div>
        <a href="#footer" class="btn contact-btn"
        >Contact Us<span class="fas fa-chevron-right"></span
            ></a>
    </div>
    <!--heart animated logo -->
    <div class="video-container">
        <video src="images/heart animation logo.webm" autoplay loop muted></video>
    </div>
</section>
<section class="icons-container">
    <div class="icons">
        <a href="doctorAnal.html">
            <i class="fas fa-user-md"></i>
            <h3 class="number-ticker" data-target-number="140">0</h3>
            <p>Doctors At Work</p>
        </a>
    </div>
    <div class="icons">
        <a href="patientAnalytics.html"
        ><i class="fas fa-user"></i>
        <h3 class="number-ticker" data-target-number="1040">0</h3>
            <p>Satisfied Patients</p>
        </a>
    </div>
    <div class="icons">
        <a href="book.html">
            <i class="fas fa-procedures"></i>
            <h3 class="number-ticker" data-target-number="100">0</h3>
            <p>Bed Facility</p>
        </a>
    </div>
    <div class="icons">
        <a href="hospital.html">
            <i class="fas fa-hospital"></i>
            <h3 class="number-ticker" data-target-number="80">0</h3>
            <p>Available Hospitals</p>
        </a>
    </div>
    <div class="icons">
        <a href="diagnosis.html">
            <i class="fa fa-area-chart"></i>
            <h3 class="number-ticker" data-target-number="80">0</h3>
            <p>Diagnosis Data</p>
        </a>
    </div>
</section>
<section class="services" id="services">
    <h1 class="heading">our <span>services</span></h1>
    <div class="box-container">
        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>Scheduled Checkups</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#" class="btn"
            >Learn more <span class="fas fa-chevron-right"></span
                ></a>
        </div>
        <div class="box">
            <i class="fas fa-ambulance"></i>
            <h3>24/7 Ambulance Services</h3>
            <p>We have fast Ambulance services</p>
            <a href="ambulance.html" class="btn"
            >Learn more <span class="fas fa-chevron-right"></span
                ></a>
        </div>
        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>Medicine</h3>
            <p>Get Medicine Suggestions according to your Heart Issue</p>
            <a href="medicine.html" class="btn"
            >Learn more <span class="fas fa-chevron-right"></span
                ></a>
        </div>
        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>Bed Facility</h3>
            <p>Book beds quickly at your finger tip</p>
            <a href="book.html" class="btn"
            >Learn more <span class="fas fa-chevron-right"></span
                ></a>
        </div>
        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Total Care</h3>
            <p>
                Get Recommendations for diets,Tests and Facilities according to your
                heart condition
            </p>
            <a href="recommended.html" class="btn"
            >Learn more <span class="fas fa-chevron-right"></span
                ></a>
        </div>
    </div>
</section>
<section class="about" id="about">
    <h1 class="heading"><span>about</span> us</h1>
    <div class="row">
        <div class="image">
            <img
                    src="images/medical-banner-with-doctor-wearing-goggles_23-2149611193.avif"
                    alt="banner"
            />
        </div>
        <div class="content">
            <h3>We Take Care Of Healthy Life</h3>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro
                iusto esse iste numquam provident perspiciatis, laudantium
                molestias? Doloribus error voluptate placeat magni possimus dolorum
                sapiente. Assumenda vero facere sunt accusantium!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Non facilis
                neque, enim nemo eveniet incidunt tempora veritatis. Doloribus
                maxime placeat nihil sed id eius porro accusantium cupiditate, velit
                asperiores tenetur?
            </p>
            <a href="#" class="btn"
            >Learn more <span class="fas fa-chevron-right"></span
                ></a>
        </div>
    </div>
</section>
<footer class="footer" id="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="#home" class="footer-link">Home</a>
            <a href="#services" class="footer-link">Services</a>
            <a href="#about" class="footer-link">About</a>
        </div>
        <div class="box">
            <h3>Extra Links</h3>
            <a href="#" class="footer-link">Ask Questions</a>
            <a href="appointment.php" class="footer-link">Book Appointment</a>
            <a href="#" class="footer-link">Send Feedback</a>
            <a href="doctors.html" class="footer-link">Doctors</a>
        </div>
        <div class="box">
            <h3>Contact Info</h3>
            <p class="footer-p" ><i class="fas fa-phone"></i> +345-8990-445</p>
            <p class="footer-p"><i class="fas fa-phone"></i> +452-2887-377</p>
            <p class="footer-p">
                <i class="fas fa-envelope"></i> health@healthcare.com
            </p>
            <p class="footer-p">
                <i class="fas fa-map-marker-alt"></i> Dhaka,Bangladesh - 226021
            </p>
        </div>
        <div class="box">
            <h3>Follow Us</h3>
            <a href="#" class="footer-link"
            ><i class="fab fa-facebook"></i>Facebook</a
            >
            <a href="#" class="footer-link"
            ><i class="fab fa-twitter"></i>Twitter</a
            >
            <a href="#" class="footer-link"
            ><i class="fab fa-linkedin"></i>LinkedIn</a
            >
            <a href="#" class="footer-link"
            ><i class="fab fa-instagram"></i>Instagram</a
            >
        </div>
    </div>
</footer>
<script>
    let menu = document.querySelector("#menu-btn");
    let nav = document.querySelector(".nav");
    let dropdownToggles = document.querySelectorAll(".dropdown-toggle");

    menu.onclick = () => {
        menu.classList.toggle("fa-times");
        nav.classList.toggle("active");
    };

    window.onscroll = () => {
        menu.classList.remove("fa-times");
        nav.classList.remove("active");
    };

    // Close dropdowns on click outside
    document.addEventListener("click", function (event) {
        let isClickInside = nav.contains(event.target);
        if (!isClickInside) {
            menu.classList.remove("fa-times");
            nav.classList.remove("active");
        }
    });

    // Toggle dropdown on mobile
    dropdownToggles.forEach((toggle) => {
        toggle.onclick = (event) => {
            event.preventDefault();
            let dropdownMenu = toggle.nextElementSibling;
            dropdownMenu.classList.toggle("active");
        };
    });

    //Counting animation//
    document.addEventListener("DOMContentLoaded", function() {
        function animateNumber(element, start, end, duration) {
        let startTime = null;

        function tick(currentTime) {
            if (!startTime) startTime = currentTime;
                const progress = Math.min((currentTime - startTime) / duration, 1);
                element.textContent = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    }

        const elements = document.querySelectorAll('.number-ticker');
            elements.forEach(element => {
        const targetNumber = parseInt(element.getAttribute('data-target-number'), 10) || 0;
        const duration = 2000;  // Duration of the animation in milliseconds

            animateNumber(element, 0, targetNumber, duration);
        });
    });
    //counting animation end//

</script>
<script src="Counting.js"></script>
</body>
</html>
