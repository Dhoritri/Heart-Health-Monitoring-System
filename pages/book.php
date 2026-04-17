<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';

require_login();

$success = isset($_GET['success']);
$error   = $_GET['error'] ?? null;

$page_title = 'Bed Booking — HeartCare';
$extra_css  = ['/assets/css/pages/misc.css'];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span> Bed Booking
  </div>
  <h1><i class="fas fa-procedures"></i> Hospital Bed Booking</h1>
  <p>Reserve a hospital bed in advance across our partner hospitals</p>
</div>

<div class="page-content">
  <?php if ($success): ?>
    <div class="alert alert-success" data-auto-dismiss>
      <i class="fas fa-check-circle"></i> Bed reservation submitted. The hospital will confirm within 24 hours.
    </div>
  <?php elseif ($error === 'missing'): ?>
    <div class="alert alert-warning" data-auto-dismiss>
      <i class="fas fa-exclamation-triangle"></i> Please fill in all required fields.
    </div>
  <?php endif; ?>

  <div class="book-layout">
    <form class="card" action="<?= BASE_URL ?>/php/bed.php" method="post">
      <div class="card-header">Bed Reservation Details</div>
      <div class="card-body" style="padding:2rem;">

        <div class="form-group">
          <label class="form-label">Select Hospital *</label>
          <select class="form-control" name="hospital" required>
            <option value="" hidden>Choose a hospital</option>
            <optgroup label="Dhaka">
              <option>National Heart Foundation Hospital</option>
              <option>United Hospital</option>
              <option>Square Hospital</option>
              <option>Ibrahim Cardiac Hospital</option>
              <option>Apollo Hospitals Dhaka</option>
              <option>Labaid Cardiac Hospital</option>
            </optgroup>
            <optgroup label="Chattogram">
              <option>Chattogram Metropolitan Hospital</option>
              <option>Chattogram Medical College Hospital</option>
              <option>Evercare Hospital Chattogram</option>
            </optgroup>
            <optgroup label="Other Cities">
              <option>Khulna Medical College Hospital</option>
              <option>Rajshahi Metropolitan Hospital</option>
              <option>Oasis Hospital Sylhet</option>
              <option>Sher-E-Bangla Medical College Hospital</option>
            </optgroup>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Ward Type *</label>
          <div class="ward-options">
            <label class="ward-option">
              <input type="radio" name="ward" value="General" required />
              <div class="ward-icon">🛏️</div>
              <div><div class="ward-name">General</div><div class="ward-desc">Shared, 4-6 beds</div></div>
            </label>
            <label class="ward-option">
              <input type="radio" name="ward" value="Semi-Private" />
              <div class="ward-icon">🏨</div>
              <div><div class="ward-name">Semi-Private</div><div class="ward-desc">2-bed room</div></div>
            </label>
            <label class="ward-option">
              <input type="radio" name="ward" value="Private" />
              <div class="ward-icon">🌟</div>
              <div><div class="ward-name">Private</div><div class="ward-desc">Single room</div></div>
            </label>
            <label class="ward-option">
              <input type="radio" name="ward" value="ICU" />
              <div class="ward-icon">🫀</div>
              <div><div class="ward-name">Cardiac ICU</div><div class="ward-desc">Intensive care</div></div>
            </label>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Check-in Date *</label>
            <input class="form-control" type="date" name="check_in" min="<?= date('Y-m-d') ?>" required />
          </div>
          <div class="form-group">
            <label class="form-label">Expected Check-out *</label>
            <input class="form-control" type="date" name="check_out" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" required />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Additional Notes</label>
          <textarea class="form-control" name="notes" rows="3" placeholder="Any special requirements, dietary needs, or medical notes..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-full">
          <i class="fas fa-bed"></i> Confirm Bed Reservation
        </button>
      </div>
    </form>

    <aside>
      <div class="card mb-2">
        <div class="card-header">Booking Info</div>
        <div class="card-body">
          <div style="font-size:.85rem;color:var(--text-muted);line-height:1.8;">
            <p class="mb-2"><i class="fas fa-clock" style="color:var(--teal)"></i> <strong>Confirmation:</strong> Within 24 hours</p>
            <p class="mb-2"><i class="fas fa-id-card" style="color:var(--teal)"></i> <strong>Bring:</strong> NID card & previous medical reports</p>
            <p class="mb-2"><i class="fas fa-phone" style="color:var(--teal)"></i> <strong>Helpline:</strong> +880 2 9876543</p>
            <p><i class="fas fa-info-circle" style="color:var(--teal)"></i> <strong>Note:</strong> ICU bookings require physician referral</p>
          </div>
        </div>
      </div>
      <div class="appt-tip" style="background:#E8F5E9;border-color:#A5D6A7;color:#2E7D32;">
        <i class="fas fa-check-circle"></i>
        Bed availability is subject to hospital confirmation. You will receive an SMS once confirmed.
      </div>
    </aside>
  </div>
</div>

<script>
document.querySelectorAll('.ward-option input[type="radio"]').forEach(radio => {
  radio.addEventListener('change', () => {
    document.querySelectorAll('.ward-option').forEach(o => o.classList.remove('selected'));
    radio.closest('.ward-option').classList.add('selected');
  });
});
</script>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
