<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'Diagnosis Data — HeartCare';
$extra_css  = ['/assets/css/pages/diagnosis.css'];
$extra_js   = [
  'https://cdn.jsdelivr.net/npm/chart.js',
  '/assets/js/pages/diagnosis.js',
];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span> Diagnosis Data
  </div>
  <h1><i class="fas fa-chart-line"></i> Cardiac Diagnosis Trends</h1>
  <p>Monthly case data for 10 major heart conditions across our network</p>
</div>

<div class="page-content">
  <div class="diagnosis-layout">
    <aside>
      <div class="card">
        <div class="card-header">Conditions</div>
        <div class="card-body" style="padding:1rem;">
          <div class="condition-list">
            <div class="condition-item active" data-condition="hypertension">
              <span class="dot" style="background:#FF6384"></span> Hypertension
            </div>
            <div class="condition-item" data-condition="cad">
              <span class="dot" style="background:#36A2EB"></span> Coronary Artery Disease
            </div>
            <div class="condition-item" data-condition="heartFailure">
              <span class="dot" style="background:#4BC0C0"></span> Heart Failure
            </div>
            <div class="condition-item" data-condition="arrhythmia">
              <span class="dot" style="background:#9966FF"></span> Arrhythmia
            </div>
            <div class="condition-item" data-condition="valvularHeartDisease">
              <span class="dot" style="background:#FF9F40"></span> Valvular Disease
            </div>
            <div class="condition-item" data-condition="congenitalHeartDisease">
              <span class="dot" style="background:#FFCD56"></span> Congenital HD
            </div>
            <div class="condition-item" data-condition="cardiomyopathy">
              <span class="dot" style="background:#4BC0C0"></span> Cardiomyopathy
            </div>
            <div class="condition-item" data-condition="pericarditis">
              <span class="dot" style="background:#36A2EB"></span> Pericarditis
            </div>
            <div class="condition-item" data-condition="endocarditis">
              <span class="dot" style="background:#9966FF"></span> Endocarditis
            </div>
            <div class="condition-item" data-condition="pulmonaryHypertension">
              <span class="dot" style="background:#FF9F40"></span> Pulmonary HTN
            </div>
          </div>
        </div>
      </div>
    </aside>

    <main>
      <div class="card">
        <div class="card-header" id="chartTitle">
          Hypertension — Monthly Cases (Jan–Jun)
        </div>
        <div class="card-body">
          <div class="chart-container">
            <canvas id="diagnosisChart"></canvas>
          </div>
          <div class="chart-info">
            <div class="chart-stat">
              <div class="value" id="statTotal">44</div>
              <div class="label">Total Cases</div>
            </div>
            <div class="chart-stat">
              <div class="value" id="statPeak">19</div>
              <div class="label">Peak Month</div>
            </div>
            <div class="chart-stat">
              <div class="value" id="statAvg">7.3</div>
              <div class="label">Avg / Month</div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
