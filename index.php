<?php
require_once __DIR__ . '/config.php';
require_once ROOT_DIR . '/includes/auth.php';

$page_title = 'HeartCare — Heart Health Monitoring';
$extra_css  = ['/assets/css/pages/home.css'];
require_once ROOT_DIR . '/includes/header.php';
?>

<!-- ── Hero ── -->
<section class="hero">
  <div class="hero__inner">
    <div class="hero__content">
      <div class="hero__tag"><i class="fas fa-heartbeat"></i> Bangladesh's #1 Cardiac Platform</div>
      <h1 class="hero__title">
        Your Heart Deserves<br>
        <em>Expert Care.</em><br>
        Right Now.
      </h1>
      <p class="hero__subtitle">
        Connect with 140+ specialist cardiologists, access top-tier hospitals across Bangladesh, and monitor your heart health — all in one place.
      </p>
      <div class="hero__actions">
        <a href="<?= BASE_URL ?>/pages/appointment.php" class="btn btn-accent btn-lg">
          <i class="fas fa-calendar-plus"></i> Book Appointment
        </a>
        <a href="<?= BASE_URL ?>/pages/doctors.php" class="btn btn-ghost btn-lg">
          <i class="fas fa-user-md"></i> Find Doctors
        </a>
      </div>
    </div>

    <div class="hero__ecg">
      <svg viewBox="0 0 520 280" xmlns="http://www.w3.org/2000/svg" fill="none">
        <!-- ECG grid lines -->
        <defs>
          <pattern id="grid" width="26" height="26" patternUnits="userSpaceOnUse">
            <path d="M 26 0 L 0 0 0 26" fill="none" stroke="rgba(255,255,255,0.06)" stroke-width=".5"/>
          </pattern>
        </defs>
        <rect width="520" height="280" rx="20" fill="rgba(255,255,255,0.05)" stroke="rgba(255,255,255,0.12)" stroke-width="1"/>
        <rect width="520" height="280" rx="20" fill="url(#grid)"/>

        <!-- ECG line -->
        <polyline
          points="0,140 40,140 60,140 70,80 80,200 90,30 100,200 110,140 140,140 160,140 180,140 190,100 200,180 210,60 220,190 230,140 260,140 280,140 300,140 310,100 320,175 330,55 340,185 350,140 380,140 400,140 420,140 430,95 440,180 450,50 460,185 470,140 500,140 520,140"
          stroke="rgba(255,255,255,0.9)"
          stroke-width="2.5"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        />

        <!-- Animated pulse dot -->
        <circle r="5" fill="#E53935">
          <animateMotion dur="3.5s" repeatCount="indefinite" path="M0,140 L40,140 L60,140 L70,80 L80,200 L90,30 L100,200 L110,140 L140,140 L160,140 L180,140 L190,100 L200,180 L210,60 L220,190 L230,140 L260,140 L280,140 L300,140 L310,100 L320,175 L330,55 L340,185 L350,140 L380,140 L400,140 L420,140 L430,95 L440,180 L450,50 L460,185 L470,140 L500,140 L520,140"/>
        </circle>

        <!-- Labels -->
        <text x="20" y="268" fill="rgba(255,255,255,0.4)" font-size="11" font-family="Inter,sans-serif">Live ECG Monitor</text>
        <text x="420" y="268" fill="#4ADE80" font-size="11" font-family="Inter,sans-serif">● Normal Sinus</text>
      </svg>
    </div>
  </div>
</section>

<!-- ── Stats strip ── -->
<section class="stats-strip">
  <div class="stats-strip__inner">
    <div class="stat-item">
      <div class="stat-item__icon" style="color:#0D47A1">🩺</div>
      <div class="stat-item__number" data-counter data-target="140">0</div>
      <div class="stat-item__label">Specialist Doctors</div>
    </div>
    <div class="stat-item">
      <div class="stat-item__icon" style="color:#E53935">❤️</div>
      <div class="stat-item__number" data-counter data-target="1040">0</div>
      <div class="stat-item__label">Patients Served</div>
    </div>
    <div class="stat-item">
      <div class="stat-item__icon" style="color:#00ACC1">🏥</div>
      <div class="stat-item__number" data-counter data-target="80">0</div>
      <div class="stat-item__label">Partner Hospitals</div>
    </div>
    <div class="stat-item">
      <div class="stat-item__icon" style="color:#43A047">🛏️</div>
      <div class="stat-item__number" data-counter data-target="500">0</div>
      <div class="stat-item__label">Bed Capacity</div>
    </div>
    <div class="stat-item">
      <div class="stat-item__icon" style="color:#FB8C00">📊</div>
      <div class="stat-item__number" data-counter data-target="10">0</div>
      <div class="stat-item__label">Conditions Tracked</div>
    </div>
  </div>
</section>

<!-- ── Services ── -->
<section class="services">
  <div class="services__header">
    <div class="section-label">What We Offer</div>
    <h2 class="section-title">Complete Heart Care Services</h2>
    <p class="section-subtitle">From diagnosis to recovery — we support every step of your cardiac health journey.</p>
  </div>

  <div class="services__grid">
    <a href="<?= BASE_URL ?>/pages/appointment.php" class="service-card">
      <div class="service-card__icon" style="background:#EEF2FF; color:#3730A3">
        <i class="fas fa-calendar-check"></i>
      </div>
      <h3>Book Appointments</h3>
      <p>Schedule consultations with cardiologists at your convenience. Choose your doctor, date, and time with ease.</p>
      <span class="service-card__link">Book now <i class="fas fa-arrow-right"></i></span>
    </a>

    <a href="<?= BASE_URL ?>/pages/doctors.php" class="service-card">
      <div class="service-card__icon" style="background:#EFF6FF; color:#0D47A1">
        <i class="fas fa-user-md"></i>
      </div>
      <h3>Find Specialists</h3>
      <p>Browse our directory of 140+ board-certified cardiologists across Bangladesh with specializations and availability.</p>
      <span class="service-card__link">Find doctors <i class="fas fa-arrow-right"></i></span>
    </a>

    <a href="<?= BASE_URL ?>/pages/hospital.php" class="service-card">
      <div class="service-card__icon" style="background:#E0F7FA; color:#006064">
        <i class="fas fa-hospital-alt"></i>
      </div>
      <h3>Hospital Directory</h3>
      <p>Explore 80+ partner hospitals across Dhaka, Chattogram, Khulna, Rajshahi, Sylhet, Barishal, and Rangpur.</p>
      <span class="service-card__link">Explore hospitals <i class="fas fa-arrow-right"></i></span>
    </a>

    <a href="<?= BASE_URL ?>/pages/book.php" class="service-card">
      <div class="service-card__icon" style="background:#FFF3E0; color:#E65100">
        <i class="fas fa-procedures"></i>
      </div>
      <h3>Bed Booking</h3>
      <p>Reserve hospital beds in advance. Choose your preferred ward and check-in dates without the last-minute rush.</p>
      <span class="service-card__link">Reserve bed <i class="fas fa-arrow-right"></i></span>
    </a>

    <a href="<?= BASE_URL ?>/pages/medicine.php" class="service-card">
      <div class="service-card__icon" style="background:#F3E8FF; color:#6B21A8">
        <i class="fas fa-pills"></i>
      </div>
      <h3>Medicine Guide</h3>
      <p>Get medication recommendations based on your heart condition. Always consult your physician before use.</p>
      <span class="service-card__link">View medicines <i class="fas fa-arrow-right"></i></span>
    </a>

    <a href="<?= BASE_URL ?>/pages/ambulance.php" class="service-card">
      <div class="service-card__icon" style="background:#FFF1F2; color:#9F1239">
        <i class="fas fa-ambulance"></i>
      </div>
      <h3>24/7 Ambulance</h3>
      <p>Access emergency cardiac ambulance services with ALS, BLS, and mobile ICU support across major cities.</p>
      <span class="service-card__link">Emergency info <i class="fas fa-arrow-right"></i></span>
    </a>
  </div>
</section>

<!-- ── Why Us ── -->
<section class="why-us">
  <div class="why-us__inner">
    <div class="why-us__content">
      <div class="section-label">Why HeartCare</div>
      <h2 class="section-title">Built for Bangladesh's Cardiac Patients</h2>
      <div class="why-us__list">
        <div class="why-us__item">
          <div class="why-us__item-icon"><i class="fas fa-shield-alt"></i></div>
          <div>
            <h4>Verified Specialists Only</h4>
            <p>Every doctor on our platform is board-certified with verified credentials and hospital affiliations.</p>
          </div>
        </div>
        <div class="why-us__item">
          <div class="why-us__item-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div>
            <h4>Nationwide Coverage</h4>
            <p>Partner hospitals and clinics in all 8 major divisions of Bangladesh for accessibility wherever you are.</p>
          </div>
        </div>
        <div class="why-us__item">
          <div class="why-us__item-icon"><i class="fas fa-chart-line"></i></div>
          <div>
            <h4>Data-Driven Insights</h4>
            <p>Track diagnosis trends, medication history, and health analytics to understand your cardiac health better.</p>
          </div>
        </div>
        <div class="why-us__item">
          <div class="why-us__item-icon"><i class="fas fa-clock"></i></div>
          <div>
            <h4>Always Available</h4>
            <p>Emergency ambulance services and 24/7 hospital bed booking for when every minute counts.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="why-us__image">
      <img src="<?= BASE_URL ?>/images/medical-banner-with-doctor-wearing-goggles_23-2149611193.avif" alt="Expert cardiac care" />
    </div>
  </div>
</section>

<!-- ── How It Works ── -->
<section class="how-it-works">
  <div class="how-it-works__header">
    <div class="section-label">Getting Started</div>
    <h2 class="section-title">Care in 3 Simple Steps</h2>
    <p class="section-subtitle" style="margin:0 auto">Getting the right cardiac care has never been simpler.</p>
  </div>

  <div class="steps">
    <div class="step">
      <div class="step__number">1</div>
      <h3>Create Your Account</h3>
      <p>Sign up as a patient in under 2 minutes. We securely store your medical profile for quick appointment booking.</p>
    </div>
    <div class="step">
      <div class="step__number">2</div>
      <h3>Find Your Doctor</h3>
      <p>Browse our specialist directory and filter by specialization, city, experience, or availability.</p>
    </div>
    <div class="step">
      <div class="step__number">3</div>
      <h3>Book & Get Care</h3>
      <p>Confirm your appointment, arrive at the clinic, and receive expert cardiac care with your full history ready.</p>
    </div>
  </div>
</section>

<!-- ── CTA ── -->
<section class="cta-banner">
  <h2>Your Heart Can't Wait</h2>
  <p>Join thousands of patients who trust HeartCare for their cardiac health management.</p>
  <div class="flex flex-center gap-2">
    <a href="<?= BASE_URL ?>/signup.php" class="btn btn-ghost btn-lg">
      <i class="fas fa-user-plus"></i> Sign Up Free
    </a>
    <a href="<?= BASE_URL ?>/pages/appointment.php" class="btn btn-lg" style="background:#fff;color:var(--accent);">
      <i class="fas fa-calendar-plus"></i> Book Now
    </a>
  </div>
</section>

<?php require_once ROOT_DIR . '/includes/footer.php'; ?>
