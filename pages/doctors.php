<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'Find Doctors — HeartCare';
$extra_css  = ['/assets/css/pages/doctors.css'];
require_once ROOT_DIR . '/includes/header.php';

$doctors = [
  ['name'=>'Dr. A.K.M Akramul Haque','spec'=>'Interventional Cardiology','exp'=>18,'hospital'=>'National Heart Foundation','city'=>'Dhaka','fee'=>1200,'img'=>'Dr.-A.K.M-Akramul-Haque.jpg'],
  ['name'=>'Dr. GM Mokbul Hossain','spec'=>'Cardiac Surgery','exp'=>22,'hospital'=>'United Hospital','city'=>'Dhaka','fee'=>1500,'img'=>'Dr.-GM-Mokbul-Hossain.jpg'],
  ['name'=>'Dr. Lutfor Rahman','spec'=>'Electrophysiology','exp'=>15,'hospital'=>'Ibrahim Cardiac Hospital','city'=>'Dhaka','fee'=>1000,'img'=>'Dr.-Lutfor-Rahman.jpg'],
  ['name'=>'Dr. Mohammad Sanaul Hoque','spec'=>'Heart Failure','exp'=>12,'hospital'=>'Square Hospital','city'=>'Dhaka','fee'=>900,'img'=>'Dr.-Mohammad-Sanaul-Hoque-Sarker.jpg'],
  ['name'=>'Dr. Asit Baran Adhikary','spec'=>'Vascular Surgery','exp'=>20,'hospital'=>'Apollo Hospitals Dhaka','city'=>'Dhaka','fee'=>1100,'img'=>'Prof.-Dr.-Asit-Baran-Adhikary.jpg'],
  ['name'=>'Dr. Ayesha Siddiqua','spec'=>'Cardiology','exp'=>10,'hospital'=>'Labaid Cardiac','city'=>'Dhaka','fee'=>800,'img'=>''],
  ['name'=>'Dr. Kamrul Islam','spec'=>'Cardiology','exp'=>14,'hospital'=>'Evercare Chattogram','city'=>'Chattogram','fee'=>850,'img'=>''],
  ['name'=>'Dr. Nasrin Sultana','spec'=>'Interventional Cardiology','exp'=>9,'hospital'=>'CMCH','city'=>'Chattogram','fee'=>750,'img'=>''],
  ['name'=>'Dr. Mahbubur Rahman','spec'=>'Cardiac Surgery','exp'=>17,'hospital'=>'Khulna Medical College','city'=>'Khulna','fee'=>900,'img'=>''],
  ['name'=>'Dr. Shirin Akter','spec'=>'Heart Failure','exp'=>11,'hospital'=>'Rajshahi Metropolitan','city'=>'Rajshahi','fee'=>700,'img'=>''],
  ['name'=>'Dr. Iqbal Hossain','spec'=>'Electrophysiology','exp'=>13,'hospital'=>'Oasis Hospital','city'=>'Sylhet','fee'=>800,'img'=>''],
  ['name'=>'Dr. Fatema Khanam','spec'=>'Cardiology','exp'=>8,'hospital'=>'Sher-E-Bangla Hospital','city'=>'Barishal','fee'=>650,'img'=>''],
];

$specializations = array_unique(array_column($doctors, 'spec'));
$cities = array_unique(array_column($doctors, 'city'));
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a><span>/</span> Doctors
  </div>
  <h1><i class="fas fa-user-md"></i> Find Specialist Doctors</h1>
  <p>Browse our verified cardiologists and cardiac surgeons across Bangladesh</p>
</div>

<div class="page-content">
  <div class="doctors-layout">

    <aside>
      <div class="card filter-card">
        <div class="card-header">Filter Doctors</div>
        <div class="card-body">
          <div class="filter-group">
            <h4>Specialization</h4>
            <label class="filter-option">
              <input type="radio" name="spec" value="" checked> All Specializations
            </label>
            <?php foreach ($specializations as $s): ?>
            <label class="filter-option">
              <input type="radio" name="spec" value="<?= htmlspecialchars($s) ?>"> <?= htmlspecialchars($s) ?>
            </label>
            <?php endforeach; ?>
          </div>

          <div class="filter-group">
            <h4>City</h4>
            <label class="filter-option">
              <input type="radio" name="city" value="" checked> All Cities
            </label>
            <?php foreach ($cities as $c): ?>
            <label class="filter-option">
              <input type="radio" name="city" value="<?= htmlspecialchars($c) ?>"> <?= htmlspecialchars($c) ?>
            </label>
            <?php endforeach; ?>
          </div>

          <button class="btn btn-outline w-full" id="clearFilters">Clear Filters</button>
        </div>
      </div>
    </aside>

    <main>
      <div class="doctors-grid" id="doctorsGrid">
        <?php foreach ($doctors as $i => $doc): ?>
        <div class="doctor-card" data-spec="<?= htmlspecialchars($doc['spec']) ?>" data-city="<?= htmlspecialchars($doc['city']) ?>">
          <div class="doctor-card__header">
            <?php if ($doc['img'] && file_exists(ROOT_DIR . '/images/' . $doc['img'])): ?>
              <img class="doctor-card__avatar" src="<?= BASE_URL ?>/images/<?= htmlspecialchars($doc['img']) ?>" alt="<?= htmlspecialchars($doc['name']) ?>" />
            <?php else: ?>
              <div class="doctor-card__avatar-placeholder"><i class="fas fa-user-md"></i></div>
            <?php endif; ?>
            <span class="badge badge-primary"><?= htmlspecialchars($doc['spec']) ?></span>
          </div>
          <div class="doctor-card__body">
            <div class="doctor-card__name"><?= htmlspecialchars($doc['name']) ?></div>
            <div class="doctor-card__meta">
              <div class="doctor-card__meta-item">
                <i class="fas fa-hospital"></i> <?= htmlspecialchars($doc['hospital']) ?>
              </div>
              <div class="doctor-card__meta-item">
                <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($doc['city']) ?>
              </div>
              <div class="doctor-card__meta-item">
                <i class="fas fa-medal"></i> <?= $doc['exp'] ?> years experience
              </div>
            </div>
          </div>
          <div class="doctor-card__footer">
            <div class="doctor-card__fee">
              BDT <?= number_format($doc['fee']) ?> <span>/ visit</span>
            </div>
            <a href="<?= BASE_URL ?>/pages/appointment.php" class="btn btn-primary btn-sm">Book</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <p id="noResults" style="display:none;text-align:center;padding:3rem;color:var(--text-muted);">
        No doctors found for the selected filters.
      </p>
    </main>
  </div>
</div>

<script>
function filterDoctors() {
  const spec = document.querySelector('input[name="spec"]:checked')?.value || '';
  const city = document.querySelector('input[name="city"]:checked')?.value || '';
  const cards = document.querySelectorAll('.doctor-card');
  let visible = 0;

  cards.forEach(card => {
    const matchSpec = !spec || card.dataset.spec === spec;
    const matchCity = !city || card.dataset.city === city;
    const show = matchSpec && matchCity;
    card.style.display = show ? '' : 'none';
    if (show) visible++;
  });

  document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';
}

document.querySelectorAll('input[name="spec"], input[name="city"]')
  .forEach(el => el.addEventListener('change', filterDoctors));

document.getElementById('clearFilters').addEventListener('click', () => {
  document.querySelectorAll('input[name="spec"], input[name="city"]').forEach(el => {
    if (el.value === '') el.checked = true;
  });
  filterDoctors();
});
</script>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
