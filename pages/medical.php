<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';

require_login();

$success = isset($_GET['success']);
$error   = $_GET['error'] ?? null;

$page_title = 'Medical History — HeartCare';
$extra_css  = ['/assets/css/pages/misc.css'];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span> Medical History
  </div>
  <h1><i class="fas fa-file-medical"></i> Medical History</h1>
  <p>Record and manage your cardiac health history</p>
</div>

<div class="page-content">
  <?php if ($success): ?>
    <div class="alert alert-success" data-auto-dismiss>
      <i class="fas fa-check-circle"></i> Medical record saved successfully.
    </div>
  <?php elseif ($error): ?>
    <div class="alert alert-warning" data-auto-dismiss>
      <i class="fas fa-exclamation-triangle"></i> Please fill in the required fields.
    </div>
  <?php endif; ?>

  <div class="medical-layout">
    <form class="card" action="<?= BASE_URL ?>/php/medical.php" method="post">
      <div class="card-header">Add Medical Record</div>
      <div class="card-body" style="padding:2rem;">

        <div class="form-group">
          <label class="form-label">Primary Condition / Diagnosis *</label>
          <input class="form-control" type="text" name="condition" id="conditionInput"
                 placeholder="e.g. Hypertension, Atrial Fibrillation..." required />
        </div>

        <div class="form-group">
          <label class="form-label">Common Conditions (click to select)</label>
          <div class="conditions-checklist">
            <?php $conditions = [
              'Hypertension','Coronary Artery Disease','Heart Failure','Arrhythmia',
              'Valvular Disease','Cardiomyopathy','Pericarditis','Endocarditis',
              'Pulmonary Hypertension','Congenital Heart Disease','Angina Pectoris','Myocardial Infarction'
            ]; ?>
            <?php foreach ($conditions as $c): ?>
            <label class="condition-check">
              <input type="checkbox" value="<?= htmlspecialchars($c) ?>" class="condition-preset" />
              <?= htmlspecialchars($c) ?>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Date of Record *</label>
          <input class="form-control" type="date" name="date" value="<?= date('Y-m-d') ?>" required />
        </div>

        <div class="form-group">
          <label class="form-label">Description / Notes</label>
          <textarea class="form-control" name="description" rows="5"
                    placeholder="Describe symptoms, treatment received, medications prescribed, or any other relevant details..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-full">
          <i class="fas fa-save"></i> Save Medical Record
        </button>
      </div>
    </form>

    <aside>
      <div class="card">
        <div class="card-header">About Medical Records</div>
        <div class="card-body">
          <p style="font-size:.875rem;color:var(--text-muted);line-height:1.8;margin-bottom:1rem;">
            Keep your medical history up-to-date so doctors can provide better care during appointments.
          </p>
          <div style="font-size:.85rem;">
            <div style="display:flex;gap:.6rem;align-items:flex-start;padding:.6rem 0;border-bottom:1px solid var(--border);">
              <i class="fas fa-shield-alt" style="color:var(--success);margin-top:.15rem;"></i>
              <span>Your records are private and only visible to you and your treating physician.</span>
            </div>
            <div style="display:flex;gap:.6rem;align-items:flex-start;padding:.6rem 0;border-bottom:1px solid var(--border);">
              <i class="fas fa-history" style="color:var(--teal);margin-top:.15rem;"></i>
              <span>Include past surgeries, hospitalizations, and known allergies.</span>
            </div>
            <div style="display:flex;gap:.6rem;align-items:flex-start;padding:.6rem 0;">
              <i class="fas fa-pills" style="color:var(--primary);margin-top:.15rem;"></i>
              <span>Note current medications and dosages for accurate doctor consultations.</span>
            </div>
          </div>
        </div>
      </div>
    </aside>
  </div>
</div>

<script>
document.querySelectorAll('.condition-preset').forEach(cb => {
  cb.addEventListener('change', () => {
    const checked = [...document.querySelectorAll('.condition-preset:checked')].map(el => el.value);
    document.getElementById('conditionInput').value = checked.join(', ');
  });
});
</script>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
