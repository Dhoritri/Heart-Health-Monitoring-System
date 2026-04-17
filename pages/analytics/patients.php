<?php
require_once __DIR__ . '/../../config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'Patient Analytics — HeartCare';
$extra_css  = ['/assets/css/pages/analytics.css'];
$extra_js   = [
  'https://cdn.jsdelivr.net/npm/chart.js',
  '/assets/js/pages/analytics-patients.js',
];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span>
    <a href="#">Analytics</a><span>/</span> Patients
  </div>
  <h1><i class="fas fa-chart-pie"></i> Patient Analytics</h1>
  <p>Demographics and distribution statistics across HeartCare's patient network</p>
</div>

<div class="page-content">
  <div class="analytics-summary">
    <div class="stat-card">
      <div class="stat-icon" style="background:#EFF6FF;color:var(--primary)"><i class="fas fa-users"></i></div>
      <div class="stat-number" data-counter data-target="1040">0</div>
      <div class="stat-label">Total Patients</div>
    </div>
    <div class="stat-card">
      <div class="stat-icon" style="background:#FFF1F2;color:var(--accent)"><i class="fas fa-heart"></i></div>
      <div class="stat-number" data-counter data-target="312">0</div>
      <div class="stat-label">Active Cases</div>
    </div>
    <div class="stat-card">
      <div class="stat-icon" style="background:#E0F7FA;color:var(--teal)"><i class="fas fa-calendar-check"></i></div>
      <div class="stat-number" data-counter data-target="2840">0</div>
      <div class="stat-label">Appointments</div>
    </div>
    <div class="stat-card">
      <div class="stat-icon" style="background:#E8F5E9;color:var(--success)"><i class="fas fa-smile"></i></div>
      <div class="stat-number" data-counter data-target="96">0</div>
      <div class="stat-label">Satisfaction %</div>
    </div>
  </div>

  <div class="chart-grid">
    <div class="card chart-card">
      <div class="card-header">Gender Distribution</div>
      <div class="card-body">
        <canvas id="genderChart"></canvas>
      </div>
    </div>

    <div class="card chart-card">
      <div class="card-header">Marital Status</div>
      <div class="card-body">
        <canvas id="maritalChart"></canvas>
      </div>
    </div>

    <div class="card chart-card chart-full">
      <div class="card-header">Age Distribution</div>
      <div class="card-body">
        <canvas id="ageChart"></canvas>
      </div>
    </div>

    <div class="card chart-card chart-full">
      <div class="card-header">Blood Group Distribution</div>
      <div class="card-body">
        <canvas id="bloodGroupChart"></canvas>
      </div>
    </div>
  </div>
</div>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
