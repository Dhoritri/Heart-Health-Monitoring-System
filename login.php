<?php
    global $conn;
    session_start();
    include 'php/db.php';
?>
<!DOCTYPE html>`
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/nLogin.css">
    <title>Login</title>
</head>
<body>
<!--start-->
<div class="container" id="container">
    <div class="form-container sign-in">
        <form method="post">
            <h1 style="color: #2c5664;">L o g i n</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
            <div class="wave-group">
                <label>
                    <input required type="text" name="nid" class="input">
                </label>
                <span class="bar"></span>
                <label class="label">
                    <span class="label-char" style="--index: 0">U</span>
                    <span class="label-char" style="--index: 1">s</span>
                    <span class="label-char" style="--index: 2">e</span>
                    <span class="label-char" style="--index: 3">r</span>
                    <span class="label-char" style="--index: 4">n</span>
                    <span class="label-char" style="--index: 5">a</span>
                    <span class="label-char" style="--index: 6">m</span>
                    <span class="label-char" style="--index: 7">e</span>
                </label>
            </div>
            <div class="wave-group">
                <label>
                    <input required type="password" name="password" class="input">
                </label>
                <span class="bar"></span>
                <label class="label">
                    <span class="label-char" style="--index: 0">P</span>
                    <span class="label-char" style="--index: 1">a</span>
                    <span class="label-char" style="--index: 2">s</span>
                    <span class="label-char" style="--index: 3">s</span>
                    <span class="label-char" style="--index: 4">w</span>
                    <span class="label-char" style="--index: 5">o</span>
                    <span class="label-char" style="--index: 6">r</span>
                    <span class="label-char" style="--index: 7">d</span>
                </label>
            </div>
            <div class="checkbox">
                <input type="checkbox" id="remember-me" />
                <label for="remember-me">Remember me </label>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Login</button>
            <br>
            <span>
                    <div class="signup-link"> Not a member? <a style="color: blue;" href="nSign.html">Signup now</a></div>
                </span>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <h1>Welcome!</h1>
                <p>Experience the best medical care from our team of expert doctors.</p>
                <h3>OUR SERVICES</h3>
                <p>We have 140+ Doctors At Work.<br>
                    24/7 Ambulance Services.<br>
                    500+ Bed Facility.<br>
                    80+ Available Hospitals</p>
                <p>If you haven't signed up yet, please click the button below. Thanks!</p>
                <button><a href="nSign.html">Sign up</a></button>
            </div>
        </div>
    </div>
</div>
<?php
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
                header("Location: index.php");
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
?>
<script src="js/nSignup.js"></script>
</body>
</html>
