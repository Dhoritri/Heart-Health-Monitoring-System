<?php
require_once __DIR__ . '/../../config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'Doctor Analytics — HeartCare';
$extra_css  = ['/assets/css/pages/analytics.css'];
$extra_js   = [
  'https://cdn.jsdelivr.net/npm/chart.js',
  '/assets/js/pages/analytics-doctors.js',
];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span>
    <a href="#">Analytics</a><span>/</span> Doctors
  </div>
  <h1><i class="fas fa-user-md"></i> Doctor Analytics</h1>
  <p>Specialization distribution, experience levels, and performance metrics across our physician network</p>
</div>

<div class="page-content">
  <div class="analytics-summary">
    <div class="stat-card">
      <div class="stat-icon" style="background:#EFF6FF;color:var(--primary)"><i class="fas fa-user-md"></i></div>
      <div class="stat-number" data-counter data-target="140">0</div>
      <div class="stat-label">Total Physicians</div>
    </div>
    <div class="stat-card">
      <div class="stat-icon" style="background:#E0F7FA;color:var(--teal)"><i class="fas fa-stethoscope"></i></div>
      <div class="stat-number" data-counter data-target="12">0</div>
      <div class="stat-label">Specializations</div>
    </div>
    <div class="stat-card">
      <div class="stat-icon" style="background:#E8F5E9;color:var(--success)"><i class="fas fa-medal"></i></div>
      <div class="stat-number" data-counter data-target="14">0</div>
      <div class="stat-label">Avg Experience (Yrs)</div>
    </div>
    <div class="stat-card">
      <div class="stat-icon" style="background:#FFF1F2;color:var(--accent)"><i class="fas fa-star"></i></div>
      <div class="stat-number" data-counter data-target="4">0</div>
      <div class="stat-label">Avg Rating</div>
    </div>
  </div>

  <div class="chart-grid">
    <div class="card chart-card chart-full">
      <div class="card-header">Doctors by Specialization</div>
      <div class="card-body">
        <canvas id="specChart"></canvas>
      </div>
    </div>

    <div class="card chart-card">
      <div class="card-header">Experience Distribution</div>
      <div class="card-body">
        <canvas id="expChart"></canvas>
      </div>
    </div>

    <div class="card chart-card">
      <div class="card-header">Gender Split</div>
      <div class="card-body">
        <canvas id="docGenderChart"></canvas>
      </div>
    </div>

    <div class="card chart-card chart-full">
      <div class="card-header">Monthly Appointments by Specialization</div>
      <div class="card-body">
        <canvas id="apptChart"></canvas>
      </div>
    </div>
  </div>
</div>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
