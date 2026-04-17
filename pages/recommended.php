<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'Health Recommendations — HeartCare';
$extra_css  = ['/assets/css/pages/misc.css'];
require_once ROOT_DIR . '/includes/header.php';

$categories = [
  'diet'     => ['label'=>'Diet & Nutrition', 'icon'=>'🥗', 'color'=>'var(--success)'],
  'exercise' => ['label'=>'Exercise', 'icon'=>'🏃', 'color'=>'var(--teal)'],
  'tests'    => ['label'=>'Recommended Tests', 'icon'=>'🔬', 'color'=>'var(--primary)'],
  'lifestyle'=> ['label'=>'Lifestyle', 'icon'=>'🧘', 'color'=>'var(--warning)'],
];

$recommendations = [
  'diet' => [
    ['title'=>'DASH Diet','desc'=>'Dietary Approaches to Stop Hypertension — rich in fruits, vegetables, and low-fat dairy with reduced sodium.'],
    ['title'=>'Mediterranean Diet','desc'=>'Olive oil, fish, whole grains, and legumes shown to significantly reduce cardiac risk.'],
    ['title'=>'Limit Sodium','desc'=>'Keep sodium intake under 2,300 mg/day. Avoid processed foods, canned soups, and fast food.'],
    ['title'=>'Heart-Healthy Fats','desc'=>'Replace saturated fats with unsaturated fats — avocados, nuts, olive oil, and fatty fish.'],
    ['title'=>'Increase Fiber','desc'=>'Aim for 25-35g of dietary fiber daily through whole grains, beans, fruits, and vegetables.'],
    ['title'=>'Limit Alcohol','desc'=>'If you drink alcohol, limit to 1 drink/day for women and 2/day for men.'],
  ],
  'exercise' => [
    ['title'=>'Aerobic Exercise','desc'=>'150 minutes of moderate aerobic exercise per week — walking, swimming, or cycling.'],
    ['title'=>'Resistance Training','desc'=>'2+ sessions of strength training per week to improve overall cardiovascular fitness.'],
    ['title'=>'Avoid Prolonged Sitting','desc'=>'Take a 5-minute walk every hour. Sedentary time is an independent cardiac risk factor.'],
    ['title'=>'Cardiac Rehab','desc'=>'If post-procedure, enroll in a supervised cardiac rehabilitation program.'],
  ],
  'tests' => [
    ['title'=>'Lipid Panel','desc'=>'Annual cholesterol check including LDL, HDL, and triglycerides for all adults over 40.'],
    ['title'=>'Blood Pressure Monitoring','desc'=>'Check BP at least monthly. Target below 130/80 mmHg for most cardiac patients.'],
    ['title'=>'ECG / EKG','desc'=>'Annual electrocardiogram to detect arrhythmias, conduction issues, and ischemic changes.'],
    ['title'=>'Echocardiogram','desc'=>'Ultrasound of the heart to assess structure and function — recommended every 2-3 years.'],
    ['title'=>'Stress Test','desc'=>'Exercise stress test to evaluate heart function under exertion — key for angina diagnosis.'],
    ['title'=>'Blood Glucose','desc'=>'Annual fasting glucose test — diabetes significantly elevates cardiac risk.'],
  ],
  'lifestyle' => [
    ['title'=>'Quit Smoking','desc'=>'Smoking doubles cardiac risk. Quitting reduces risk by 50% within one year.'],
    ['title'=>'Stress Management','desc'=>'Chronic stress raises blood pressure and inflammation. Practice mindfulness or yoga.'],
    ['title'=>'Quality Sleep','desc'=>'7-9 hours per night. Sleep apnea significantly increases cardiac risk — get screened.'],
    ['title'=>'Regular Doctor Visits','desc'=>'Annual cardiology checkup even when feeling well. Prevention beats treatment.'],
  ],
];
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span> Recommendations
  </div>
  <h1><i class="fas fa-heart"></i> Health Recommendations</h1>
  <p>Evidence-based cardiac health guidance for diet, exercise, tests, and lifestyle</p>
</div>

<div class="page-content">
  <div class="recommended-categories">
    <?php foreach ($categories as $key => $cat): ?>
    <button class="rec-category <?= $key === 'diet' ? 'active' : '' ?>" data-category="<?= $key ?>">
      <?= $cat['icon'] ?> <?= $cat['label'] ?>
    </button>
    <?php endforeach; ?>
  </div>

  <?php foreach ($categories as $key => $cat): ?>
  <div class="rec-grid category-pane <?= $key !== 'diet' ? '' : '' ?>" id="cat-<?= $key ?>">
    <?php foreach ($recommendations[$key] as $rec): ?>
    <div class="rec-card">
      <div class="rec-card__icon"><?= $cat['icon'] ?></div>
      <h3><?= htmlspecialchars($rec['title']) ?></h3>
      <p><?= htmlspecialchars($rec['desc']) ?></p>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endforeach; ?>

  <div class="alert alert-info mt-4">
    <i class="fas fa-info-circle"></i>
    These recommendations are general guidelines. Always consult your cardiologist before making significant changes to your diet, exercise routine, or medications.
  </div>
</div>

<script>
const panes = document.querySelectorAll('.category-pane');
const btns  = document.querySelectorAll('.rec-category');

// Show only first pane initially
panes.forEach((p, i) => p.style.display = i === 0 ? 'grid' : 'none');

btns.forEach(btn => {
  btn.addEventListener('click', () => {
    btns.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    panes.forEach(p => p.style.display = 'none');
    document.getElementById('cat-' + btn.dataset.category).style.display = 'grid';
  });
});
</script>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
