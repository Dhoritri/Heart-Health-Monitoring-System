<?php
require_once __DIR__ . '/config.php';
require_once ROOT_DIR . '/includes/auth.php';

if (is_logged_in()) {
    header('Location: ' . BASE_URL . '/index.php');
    exit();
}

$error = $_GET['error'] ?? null;
$tab   = $_GET['tab'] ?? 'patient';
$page_title = 'Sign Up — HeartCare';
$extra_css  = ['/assets/css/pages/auth.css'];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="auth-page">
  <div class="auth-panel" style="align-items:flex-start;overflow-y:auto;padding:2.5rem;">
    <div class="auth-form-box" style="max-width:480px;margin:0 auto;padding:1rem 0;">
      <div class="auth-logo">
        <i class="fas fa-heartbeat"></i> HeartCare
      </div>

      <h1 class="auth-title">Create your account</h1>
      <p class="auth-subtitle">Join HeartCare to manage your cardiac health</p>

      <?php if ($error === 'exists'): ?>
        <div class="alert alert-error" data-auto-dismiss>
          <i class="fas fa-exclamation-circle"></i> This NID is already registered. <a href="<?= BASE_URL ?>/login.php">Log in instead?</a>
        </div>
      <?php elseif ($error === 'missing'): ?>
        <div class="alert alert-warning" data-auto-dismiss>
          <i class="fas fa-exclamation-triangle"></i> Please fill in all required fields.
        </div>
      <?php elseif ($error === 'filetype'): ?>
        <div class="alert alert-error" data-auto-dismiss>
          <i class="fas fa-exclamation-circle"></i> Certificate must be a PDF file.
        </div>
      <?php endif; ?>

      <!-- Tab switcher -->
      <div class="auth-tabs">
        <button class="auth-tab <?= $tab === 'patient' ? 'active' : '' ?>" data-tab="patient">
          <i class="fas fa-user"></i> I'm a Patient
        </button>
        <button class="auth-tab <?= $tab === 'physician' ? 'active' : '' ?>" data-tab="physician">
          <i class="fas fa-user-md"></i> I'm a Physician
        </button>
      </div>

      <!-- Patient form -->
      <div class="auth-tab-pane <?= $tab === 'patient' ? 'active' : '' ?>" id="tab-patient">
        <form class="auth-form" action="<?= BASE_URL ?>/php/patient.php" method="post">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">First Name *</label>
              <input class="form-control" type="text" name="first_name" placeholder="First name" required />
            </div>
            <div class="form-group">
              <label class="form-label">Last Name *</label>
              <input class="form-control" type="text" name="last_name" placeholder="Last name" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">National ID (NID) *</label>
              <input class="form-control" type="text" name="nid" placeholder="10 or 17 digits" required />
            </div>
            <div class="form-group">
              <label class="form-label">Phone *</label>
              <input class="form-control" type="tel" name="phone" placeholder="+880..." required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Date of Birth *</label>
              <input class="form-control" type="date" name="dob" required />
            </div>
            <div class="form-group">
              <label class="form-label">Gender *</label>
              <select class="form-control" name="gender" required>
                <option value="" hidden>Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Blood Group</label>
              <select class="form-control" name="blood_group">
                <option value="" hidden>Select</option>
                <option>A+</option><option>A-</option>
                <option>B+</option><option>B-</option>
                <option>O+</option><option>O-</option>
                <option>AB+</option><option>AB-</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Occupation</label>
              <input class="form-control" type="text" name="occupation" placeholder="Your occupation" />
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Password *</label>
            <input class="form-control" type="password" name="password" placeholder="Min. 8 characters" required minlength="8" />
          </div>

          <button type="submit" class="btn btn-primary mt-2">
            <i class="fas fa-user-plus"></i> Create Patient Account
          </button>
        </form>
      </div>

      <!-- Physician form -->
      <div class="auth-tab-pane <?= $tab === 'physician' ? 'active' : '' ?>" id="tab-physician">
        <form class="auth-form" action="<?= BASE_URL ?>/php/physician.php" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label">First Name *</label>
              <input class="form-control" type="text" name="first_name" placeholder="First name" required />
            </div>
            <div class="form-group">
              <label class="form-label">Last Name *</label>
              <input class="form-control" type="text" name="last_name" placeholder="Last name" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">National ID (NID) *</label>
              <input class="form-control" type="text" name="nid" placeholder="10 or 17 digits" required />
            </div>
            <div class="form-group">
              <label class="form-label">Date of Birth *</label>
              <input class="form-control" type="date" name="dob" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Gender *</label>
              <select class="form-control" name="gender" required>
                <option value="" hidden>Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Specialization *</label>
              <select class="form-control" name="specialization" required>
                <option value="" hidden>Select</option>
                <option>Cardiology</option><option>Interventional Cardiology</option>
                <option>Electrophysiology</option><option>Heart Failure</option>
                <option>Cardiac Surgery</option><option>Vascular Surgery</option>
                <option>General Surgery</option><option>Emergency Medicine</option>
                <option>Internal Medicine</option><option>Anesthesiology</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label">Years of Experience *</label>
              <select class="form-control" name="experience" required>
                <option value="" hidden>Select</option>
                <?php for ($i = 1; $i <= 40; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?> year<?= $i > 1 ? 's' : '' ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Work Hours</label>
              <div class="form-row" style="gap:.5rem">
                <input class="form-control" type="time" name="start_time" placeholder="Start" />
                <input class="form-control" type="time" name="end_time" placeholder="End" />
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label">Password *</label>
            <input class="form-control" type="password" name="password" placeholder="Min. 8 characters" required minlength="8" />
          </div>

          <div class="form-group">
            <label class="form-label">Medical Certificate (PDF)</label>
            <input class="form-control" type="file" name="certificate" accept=".pdf" />
            <p class="form-hint">Upload your BMDC registration or equivalent certificate</p>
          </div>

          <button type="submit" class="btn btn-primary mt-2">
            <i class="fas fa-user-plus"></i> Create Physician Account
          </button>
        </form>
      </div>

      <div class="auth-footer mt-3">
        Already have an account? <a href="<?= BASE_URL ?>/login.php">Sign in</a>
      </div>
    </div>
  </div>

  <div class="auth-brand">
    <div class="auth-brand__inner">
      <div class="auth-brand__heart">❤️</div>
      <h2>Join HeartCare Today</h2>
      <p>Whether you're a patient seeking expert care or a physician wanting to reach more patients — HeartCare connects you.</p>
      <div class="auth-brand__features">
        <div class="auth-brand__feature"><i class="fas fa-check-circle"></i> Free patient registration</div>
        <div class="auth-brand__feature"><i class="fas fa-check-circle"></i> Verified physician profiles</div>
        <div class="auth-brand__feature"><i class="fas fa-check-circle"></i> Secure health records</div>
        <div class="auth-brand__feature"><i class="fas fa-check-circle"></i> Appointment management</div>
      </div>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.auth-tab').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.auth-tab').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.auth-tab-pane').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById('tab-' + btn.dataset.tab).classList.add('active');
    });
  });
</script>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
