<?php
require_once __DIR__ . '/config.php';
require_once ROOT_DIR . '/includes/auth.php';

if (is_logged_in()) {
    header('Location: ' . BASE_URL . '/index.php');
    exit();
}

$error = $_GET['error'] ?? null;
$page_title = 'Log In — HeartCare';
$extra_css  = ['/assets/css/pages/auth.css'];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="auth-page">
  <div class="auth-panel">
    <div class="auth-form-box">
      <div class="auth-logo">
        <i class="fas fa-heartbeat"></i> HeartCare
      </div>

      <h1 class="auth-title">Welcome back</h1>
      <p class="auth-subtitle">Sign in to access your health dashboard</p>

      <?php if ($error === 'invalid'): ?>
        <div class="alert alert-error" data-auto-dismiss>
          <i class="fas fa-exclamation-circle"></i> Invalid NID or password. Please try again.
        </div>
      <?php elseif ($error === 'empty'): ?>
        <div class="alert alert-warning" data-auto-dismiss>
          <i class="fas fa-exclamation-triangle"></i> Please fill in all fields.
        </div>
      <?php endif; ?>

      <form class="auth-form" action="<?= BASE_URL ?>/php/login.php" method="post" novalidate>
        <div class="form-group">
          <label class="form-label" for="nid">National ID (NID)</label>
          <input class="form-control" type="text" id="nid" name="nid"
                 placeholder="Enter your NID number" required autocomplete="username" />
        </div>

        <div class="form-group">
          <label class="form-label" for="password">
            Password
            <a href="#" style="float:right;font-weight:400;color:var(--primary);font-size:.8rem;">Forgot password?</a>
          </label>
          <input class="form-control" type="password" id="password" name="password"
                 placeholder="Enter your password" required autocomplete="current-password" />
        </div>

        <button type="submit" class="btn btn-primary mt-2">
          <i class="fas fa-sign-in-alt"></i> Sign In
        </button>
      </form>

      <div class="auth-divider">or</div>

      <div class="auth-footer">
        Don't have an account? <a href="<?= BASE_URL ?>/signup.php">Create one free</a>
      </div>
    </div>
  </div>

  <div class="auth-brand">
    <div class="auth-brand__inner">
      <div class="auth-brand__heart">❤️</div>
      <h2>Your Heart, Our Priority</h2>
      <p>Access your personal cardiac health dashboard, appointments, medical history, and expert recommendations.</p>
      <div class="auth-brand__features">
        <div class="auth-brand__feature"><i class="fas fa-check-circle"></i> 140+ verified cardiologists</div>
        <div class="auth-brand__feature"><i class="fas fa-check-circle"></i> 80+ partner hospitals nationwide</div>
        <div class="auth-brand__feature"><i class="fas fa-check-circle"></i> Complete medical history tracking</div>
        <div class="auth-brand__feature"><i class="fas fa-check-circle"></i> 24/7 emergency ambulance services</div>
      </div>
    </div>
  </div>
</div>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
