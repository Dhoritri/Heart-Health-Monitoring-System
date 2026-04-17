<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'Ambulance Services — HeartCare';
$extra_css  = ['/assets/css/pages/misc.css'];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span> Ambulance Services
  </div>
  <h1><i class="fas fa-ambulance"></i> Emergency Ambulance Services</h1>
  <p>24/7 cardiac emergency transport across Bangladesh</p>
</div>

<div class="page-content">
  <div class="emergency-banner">
    <div class="emergency-banner__icon">🚨</div>
    <div>
      <h2>Cardiac Emergency? Call Now.</h2>
      <p>Our dispatch team is available 24/7. For life-threatening emergencies, call the national emergency line first.</p>
      <div class="emergency-numbers">
        <span class="emergency-number"><i class="fas fa-phone"></i> 999 — National Emergency</span>
        <span class="emergency-number"><i class="fas fa-ambulance"></i> +880 2 9876543 — HeartCare Ambulance</span>
        <span class="emergency-number"><i class="fas fa-hospital"></i> 16000 — Health Helpline</span>
      </div>
    </div>
  </div>

  <h2 style="font-size:1.3rem;font-weight:700;margin-bottom:1.25rem;">Our Ambulance Fleet</h2>
  <div class="ambulance-types">
    <div class="amb-type-card">
      <div class="icon">🚑</div>
      <h3>Advanced Life Support (ALS)</h3>
      <p>Fully equipped cardiac care units with trained paramedics and life-saving equipment for critical patients.</p>
      <div class="amb-feature"><i class="fas fa-check"></i> 12-lead ECG monitoring</div>
      <div class="amb-feature"><i class="fas fa-check"></i> Defibrillator on board</div>
      <div class="amb-feature"><i class="fas fa-check"></i> IV medication capability</div>
      <div class="amb-feature"><i class="fas fa-check"></i> Oxygen therapy</div>
    </div>

    <div class="amb-type-card">
      <div class="icon">🏥</div>
      <h3>Basic Life Support (BLS)</h3>
      <p>Standard medical transport with trained EMTs for stable patients requiring hospital transfer or outpatient visits.</p>
      <div class="amb-feature"><i class="fas fa-check"></i> First aid & CPR ready</div>
      <div class="amb-feature"><i class="fas fa-check"></i> Stretcher equipped</div>
      <div class="amb-feature"><i class="fas fa-check"></i> Basic vital monitoring</div>
      <div class="amb-feature"><i class="fas fa-check"></i> Oxygen available</div>
    </div>

    <div class="amb-type-card">
      <div class="icon">🫀</div>
      <h3>Mobile ICU</h3>
      <p>Hospital-grade intensive care on wheels for the most critical cardiac patients requiring continuous monitoring.</p>
      <div class="amb-feature"><i class="fas fa-check"></i> Ventilator support</div>
      <div class="amb-feature"><i class="fas fa-check"></i> Cardiac monitoring suite</div>
      <div class="amb-feature"><i class="fas fa-check"></i> IABP capability</div>
      <div class="amb-feature"><i class="fas fa-check"></i> Physician on board</div>
    </div>
  </div>

  <div class="grid-2 mt-4">
    <div class="card">
      <div class="card-header"><i class="fas fa-map-marker-alt" style="color:var(--accent)"></i> Coverage Areas</div>
      <div class="card-body">
        <?php $cities = ['Dhaka','Chattogram','Khulna','Rajshahi','Sylhet','Barishal','Rangpur','Mymensingh']; ?>
        <?php foreach ($cities as $c): ?>
        <div style="display:flex;align-items:center;gap:.6rem;padding:.5rem 0;border-bottom:1px solid var(--border);font-size:.875rem;">
          <i class="fas fa-check-circle" style="color:var(--success)"></i> <?= $c ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card">
      <div class="card-header"><i class="fas fa-info-circle" style="color:var(--teal)"></i> When to Call</div>
      <div class="card-body">
        <?php $symptoms = [
          'Severe chest pain or pressure',
          'Shortness of breath at rest',
          'Sudden heart palpitations',
          'Fainting or loss of consciousness',
          'Sudden severe sweating with chest pain',
          'Pain radiating to arm, jaw or back',
          'Sudden confusion or weakness',
          'Irregular heartbeat with dizziness',
        ]; ?>
        <?php foreach ($symptoms as $s): ?>
        <div style="display:flex;align-items:center;gap:.6rem;padding:.5rem 0;border-bottom:1px solid var(--border);font-size:.875rem;">
          <i class="fas fa-exclamation-circle" style="color:var(--accent)"></i> <?= $s ?>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
