
<footer class="footer">
  <div class="footer__grid">
    <div class="footer__brand">
      <div class="footer__logo">
        <svg viewBox="0 0 24 24"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402C1 3.201 5.197 1 7.5 1c1.8 0 3.547.93 4.5 2.426C12.953 1.929 14.7 1 16.5 1 18.803 1 23 3.201 23 7.191c0 4.105-5.371 8.862-11 14.402z"/></svg>
        Heart<span>Care</span>
      </div>
      <p>Bangladesh's dedicated heart health monitoring platform. Connecting patients with expert cardiologists and world-class facilities across the country.</p>
      <div class="footer__socials">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>

    <div class="footer__col">
      <h4>Services</h4>
      <ul>
        <li><a href="<?= BASE_URL ?>/pages/appointment.php">Book Appointment</a></li>
        <li><a href="<?= BASE_URL ?>/pages/doctors.php">Find Doctors</a></li>
        <li><a href="<?= BASE_URL ?>/pages/hospital.php">Hospitals</a></li>
        <li><a href="<?= BASE_URL ?>/pages/book.php">Bed Booking</a></li>
        <li><a href="<?= BASE_URL ?>/pages/ambulance.php">Ambulance</a></li>
        <li><a href="<?= BASE_URL ?>/pages/medicine.php">Medicines</a></li>
      </ul>
    </div>

    <div class="footer__col">
      <h4>Health Tools</h4>
      <ul>
        <li><a href="<?= BASE_URL ?>/pages/diagnosis.php">Diagnosis Data</a></li>
        <li><a href="<?= BASE_URL ?>/pages/recommended.php">Recommendations</a></li>
        <li><a href="<?= BASE_URL ?>/pages/medical.php">Medical History</a></li>
        <li><a href="<?= BASE_URL ?>/pages/analytics/patients.php">Patient Analytics</a></li>
        <li><a href="<?= BASE_URL ?>/pages/analytics/doctors.php">Doctor Analytics</a></li>
      </ul>
    </div>

    <div class="footer__col">
      <h4>Contact</h4>
      <div class="contact-item"><i class="fas fa-phone"></i> +880 2 9876543</div>
      <div class="contact-item"><i class="fas fa-envelope"></i> info@heartcare.com.bd</div>
      <div class="contact-item"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</div>
    </div>
  </div>

  <div class="footer__bottom">
    <span>&copy; <?= date('Y') ?> HeartCare. All rights reserved.</span>
    <span>Built for Bangladesh's cardiac health community</span>
  </div>
</footer>

<script src="<?= BASE_URL ?>/assets/js/main.js"></script>
<?php if (!empty($inline_js)): ?>
<script><?= $inline_js ?></script>
<?php endif; ?>
<?php if (!empty($extra_js)): foreach ($extra_js as $js): ?>
<script src="<?= BASE_URL . $js ?>"></script>
<?php endforeach; endif; ?>
</body>
</html>
