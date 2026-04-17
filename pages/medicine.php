<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'Medicine Guide — HeartCare';
$extra_css  = ['/assets/css/pages/medicine.css'];
$extra_js   = ['/assets/js/pages/meds.js'];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span> Medicine Guide
  </div>
  <h1><i class="fas fa-pills"></i> Heart Medicine Guide</h1>
  <p>Common medications recommended for cardiac conditions — always consult your physician first</p>
</div>

<div class="page-content">
  <div class="medicine-selector">
    <div class="alert alert-warning mb-3">
      <i class="fas fa-exclamation-triangle"></i>
      <strong>Medical Disclaimer:</strong> This guide is for informational purposes only. Always consult a qualified physician before starting any medication.
    </div>

    <h3 style="margin-bottom:1rem;font-size:1.1rem;">Select a Heart Condition</h3>
    <div class="condition-grid" id="conditionGrid">
      <button class="condition-btn" data-condition="hypertension">Hypertension</button>
      <button class="condition-btn" data-condition="cad">Coronary Artery Disease</button>
      <button class="condition-btn" data-condition="heartFailure">Heart Failure</button>
      <button class="condition-btn" data-condition="arrhythmia">Arrhythmia</button>
      <button class="condition-btn" data-condition="valvular">Valvular Heart Disease</button>
      <button class="condition-btn" data-condition="congenital">Congenital Heart Disease</button>
      <button class="condition-btn" data-condition="cardiomyopathy">Cardiomyopathy</button>
      <button class="condition-btn" data-condition="pericarditis">Pericarditis</button>
      <button class="condition-btn" data-condition="endocarditis">Endocarditis</button>
      <button class="condition-btn" data-condition="pulmonaryHypertension">Pulmonary Hypertension</button>
    </div>

    <div class="meds-result" id="medsResult">
      <div class="meds-result__header">
        <h3 id="resultCondition"></h3>
        <p>Commonly recommended medications for this condition</p>
      </div>
      <div class="meds-result__body" id="medsList"></div>
    </div>
  </div>
</div>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
