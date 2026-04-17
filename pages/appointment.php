<?php
require_once __DIR__ . '/../config.php';
require_once ROOT_DIR . '/includes/auth.php';
require_once ROOT_DIR . '/php/db.php';

require_login();

$nid  = current_user();
$user = null;

$stmt = $conn->prepare("SELECT p.FirstName, p.LastName FROM PERSON p WHERE p.NID = ?");
$stmt->bind_param('s', $nid);
$stmt->execute();
$stmt->bind_result($first, $last);
$stmt->fetch();
$stmt->close();
$user_name = $first ? htmlspecialchars("$first $last") : '';

$success = isset($_GET['success']);
$error   = $_GET['error'] ?? null;

$page_title = 'Book Appointment — HeartCare';
$extra_css  = ['/assets/css/pages/appointment.css'];
require_once ROOT_DIR . '/includes/header.php';
?>

<div class="page-header">
  <div class="breadcrumb">
    <a href="<?= BASE_URL ?>/index.php">Home</a>
    <span>/</span> Book Appointment
  </div>
  <h1><i class="fas fa-calendar-plus"></i> Book an Appointment</h1>
  <p>Schedule a consultation with one of our specialist cardiologists</p>
</div>

<div class="page-content">
  <?php if ($success): ?>
    <div class="alert alert-success" data-auto-dismiss>
      <i class="fas fa-check-circle"></i> Appointment booked successfully! We will confirm it shortly.
    </div>
  <?php elseif ($error === 'missing'): ?>
    <div class="alert alert-warning" data-auto-dismiss>
      <i class="fas fa-exclamation-triangle"></i> Please fill in all required fields.
    </div>
  <?php elseif ($error === 'failed'): ?>
    <div class="alert alert-error" data-auto-dismiss>
      <i class="fas fa-exclamation-circle"></i> Booking failed. Please try again.
    </div>
  <?php endif; ?>

  <div class="appointment-layout">
    <form class="card appt-form-card" action="<?= BASE_URL ?>/php/appointment.php" method="post">
      <div class="card-header">Appointment Details</div>
      <div class="card-body">

        <div class="form-group">
          <label class="form-label">Your Name</label>
          <input class="form-control" type="text" value="<?= $user_name ?>" disabled />
          <p class="form-hint">Booking as NID: <?= htmlspecialchars($nid) ?></p>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Appointment Date *</label>
            <input class="form-control" type="date" name="date"
                   min="<?= date('Y-m-d') ?>" required />
          </div>
          <div class="form-group">
            <label class="form-label">Preferred Time *</label>
            <input class="form-control" type="time" name="time" required />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Select Physician *</label>
          <div class="physician-select-grid">
            <?php
            $physicians = [
              ['id'=>1,'name'=>'Dr. A.K.M Akramul Haque','spec'=>'Interventional Cardiology','fee'=>'BDT 1,200'],
              ['id'=>2,'name'=>'Dr. GM Mokbul Hossain','spec'=>'Cardiac Surgery','fee'=>'BDT 1,500'],
              ['id'=>3,'name'=>'Dr. Lutfor Rahman','spec'=>'Electrophysiology','fee'=>'BDT 1,000'],
              ['id'=>4,'name'=>'Dr. Mohammad Sanaul Hoque','spec'=>'Heart Failure','fee'=>'BDT 900'],
              ['id'=>5,'name'=>'Dr. Asit Baran Adhikary','spec'=>'Vascular Surgery','fee'=>'BDT 1,100'],
              ['id'=>6,'name'=>'Dr. Ayesha Siddiqua','spec'=>'Cardiology','fee'=>'BDT 800'],
            ];
            foreach ($physicians as $doc): ?>
            <label class="physician-option">
              <input type="radio" name="physician" value="<?= $doc['id'] ?>"
                     <?= $doc['id'] === 1 ? 'checked' : '' ?> required />
              <div class="doc-name"><?= $doc['name'] ?></div>
              <div class="doc-spec"><?= $doc['spec'] ?> · <?= $doc['fee'] ?></div>
            </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Estimated Bill (BDT)</label>
          <input class="form-control" type="number" name="bill" id="billInput"
                 placeholder="Auto-filled on physician selection" min="0" />
        </div>

        <div class="form-group">
          <label class="form-label">Notes (optional)</label>
          <textarea class="form-control" name="notes" rows="3"
                    placeholder="Any symptoms or previous conditions to mention..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-full">
          <i class="fas fa-calendar-check"></i> Confirm Appointment
        </button>
      </div>
    </form>

    <aside class="appt-sidebar">
      <div class="card">
        <div class="card-header">Booking Summary</div>
        <div class="card-body">
          <div class="info-row">
            <span>Status</span>
            <span class="badge badge-warning">Pending</span>
          </div>
          <div class="info-row">
            <span>Patient NID</span>
            <span><?= htmlspecialchars($nid) ?></span>
          </div>
          <div class="info-row">
            <span>Date</span>
            <span id="summary-date">—</span>
          </div>
          <div class="info-row">
            <span>Time</span>
            <span id="summary-time">—</span>
          </div>
          <div class="info-row">
            <span>Doctor</span>
            <span id="summary-doc">—</span>
          </div>
        </div>
      </div>

      <div class="appt-tip">
        <i class="fas fa-info-circle"></i>
        Arrive 15 minutes early with your NID card and any previous medical reports.
      </div>
      <div class="appt-tip">
        <i class="fas fa-phone"></i>
        For urgent appointments call: <strong>+880 2 9876543</strong>
      </div>
    </aside>
  </div>
</div>

<script>
const fees = {1:1200,2:1500,3:1000,4:900,5:1100,6:800};
const names = {1:'Dr. Akramul Haque',2:'Dr. Mokbul Hossain',3:'Dr. Lutfor Rahman',4:'Dr. Sanaul Hoque',5:'Dr. Asit Adhikary',6:'Dr. Ayesha Siddiqua'};

function updateSummary() {
  const radio = document.querySelector('input[name="physician"]:checked');
  const date  = document.querySelector('input[name="date"]').value;
  const time  = document.querySelector('input[name="time"]').value;
  if (radio) {
    const id = parseInt(radio.value);
    document.getElementById('summary-doc').textContent  = names[id] || '—';
    document.getElementById('billInput').value = fees[id] || '';
  }
  document.getElementById('summary-date').textContent = date || '—';
  document.getElementById('summary-time').textContent = time || '—';
}

function refreshSelected() {
  document.querySelectorAll('.physician-option').forEach(opt => {
    opt.classList.toggle('selected', opt.querySelector('input').checked);
  });
}

document.querySelectorAll('input[name="physician"]').forEach(el => {
  el.addEventListener('change', () => { updateSummary(); refreshSelected(); });
});

document.querySelectorAll('input[name="date"], input[name="time"]')
  .forEach(el => el.addEventListener('change', updateSummary));

updateSummary();
refreshSelected();
</script>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
