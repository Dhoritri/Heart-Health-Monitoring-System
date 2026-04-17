<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'Hospitals — HeartCare';
$extra_css  = ['/assets/css/pages/hospital.css'];
$inline_js  = 'const BASE_URL = "' . BASE_URL . '";';
$extra_js   = ['/assets/js/pages/hospital.js'];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span> Hospitals
  </div>
  <h1><i class="fas fa-hospital-alt"></i> Hospital Directory</h1>
  <p>80+ partner hospitals across 7 divisions of Bangladesh</p>
</div>

<div class="page-content">
  <div class="city-tabs" id="cityTabs">
    <button class="city-tab active" data-city="Dhaka">Dhaka</button>
    <button class="city-tab" data-city="Chattogram">Chattogram</button>
    <button class="city-tab" data-city="Khulna">Khulna</button>
    <button class="city-tab" data-city="Rajshahi">Rajshahi</button>
    <button class="city-tab" data-city="Sylhet">Sylhet</button>
    <button class="city-tab" data-city="Barishal">Barishal</button>
    <button class="city-tab" data-city="Rangpur">Rangpur</button>
    <button class="city-tab" data-city="Mymensingh">Mymensingh</button>
  </div>

  <div class="hospitals-grid" id="hospitalsGrid">
    <div id="hospitals-empty" style="display:none;">
      <i class="fas fa-hospital" style="font-size:3rem;opacity:.2;display:block;margin-bottom:1rem;"></i>
      Select a city to view hospitals
    </div>
  </div>
</div>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
