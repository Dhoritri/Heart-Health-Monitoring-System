<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$nid = $_SESSION['nid'] ?? null;

// Determine active page for nav highlighting
$_current_script = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');

function nav_active(string ...$files): string {
    global $_current_script;
    foreach ($files as $f) {
        if (str_ends_with($_current_script, $f)) return ' class="active"';
    }
    return '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $page_title ?? 'HeartCare' ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css" />
  <?php if (!empty($extra_css)): foreach ($extra_css as $css): ?>
  <link rel="stylesheet" href="<?= BASE_URL . $css ?>" />
  <?php endforeach; endif; ?>
</head>
<body>

<nav class="navbar" id="navbar">
  <a href="<?= BASE_URL ?>/index.php" class="navbar__logo">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402C1 3.201 5.197 1 7.5 1c1.8 0 3.547.93 4.5 2.426C12.953 1.929 14.7 1 16.5 1 18.803 1 23 3.201 23 7.191c0 4.105-5.371 8.862-11 14.402z"/>
    </svg>
    Heart<span>Care</span>
  </a>

  <div class="navbar__links" id="navLinks">
    <a href="<?= BASE_URL ?>/index.php"<?= nav_active('index.php') ?>>Home</a>

    <div class="navbar__dropdown">
      <a href="<?= BASE_URL ?>/pages/doctors.php"<?= nav_active('/pages/doctors.php', '/pages/appointment.php') ?>>Doctors</a>
      <div class="navbar__dropdown-menu">
        <a href="<?= BASE_URL ?>/pages/doctors.php">Find Doctors</a>
        <a href="<?= BASE_URL ?>/pages/appointment.php">Book Appointment</a>
      </div>
    </div>

    <div class="navbar__dropdown">
      <a href="<?= BASE_URL ?>/pages/hospital.php"<?= nav_active('/pages/hospital.php', '/pages/book.php', '/pages/ambulance.php') ?>>Facilities</a>
      <div class="navbar__dropdown-menu">
        <a href="<?= BASE_URL ?>/pages/hospital.php">Hospitals</a>
        <a href="<?= BASE_URL ?>/pages/book.php">Bed Booking</a>
        <a href="<?= BASE_URL ?>/pages/ambulance.php">Ambulance</a>
      </div>
    </div>

    <div class="navbar__dropdown">
      <a href="<?= BASE_URL ?>/pages/medicine.php"<?= nav_active('/pages/medicine.php', '/pages/recommended.php', '/pages/diagnosis.php') ?>>Health</a>
      <div class="navbar__dropdown-menu">
        <a href="<?= BASE_URL ?>/pages/medicine.php">Medicines</a>
        <a href="<?= BASE_URL ?>/pages/recommended.php">Recommendations</a>
        <a href="<?= BASE_URL ?>/pages/diagnosis.php">Diagnosis Data</a>
      </div>
    </div>

    <a href="<?= BASE_URL ?>/pages/medical.php"<?= nav_active('/pages/medical.php') ?>>Medical History</a>

    <div class="navbar__dropdown">
      <a href="<?= BASE_URL ?>/pages/analytics/patients.php"<?= nav_active('/pages/analytics/patients.php', '/pages/analytics/doctors.php') ?>>Analytics</a>
      <div class="navbar__dropdown-menu">
        <a href="<?= BASE_URL ?>/pages/analytics/patients.php">Patient Stats</a>
        <a href="<?= BASE_URL ?>/pages/analytics/doctors.php">Doctor Stats</a>
      </div>
    </div>
  </div>

  <div class="navbar__user">
    <?php if ($nid): ?>
      <span class="navbar__user-id"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($nid) ?></span>
      <a href="<?= BASE_URL ?>/php/logout.php" class="btn btn-ghost btn-sm">Log Out</a>
    <?php else: ?>
      <a href="<?= BASE_URL ?>/login.php" class="btn btn-ghost btn-sm">Log In</a>
      <a href="<?= BASE_URL ?>/signup.php" class="btn btn-accent btn-sm">Sign Up</a>
    <?php endif; ?>
  </div>

  <button class="navbar__toggle" id="navToggle" aria-label="Toggle menu">
    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
  </button>
</nav>
