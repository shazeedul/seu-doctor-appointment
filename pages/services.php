<?php
$pageTitle = "Services - Doctor Appointment System";
ob_start(); // Start output buffering
?>
<!-- Services Section -->
<section class="py-50">
  <div class="container">
    <div class="row text-center g-4">
      <!-- Service 1 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <div class="service-icon mb-3">🦷</div>
            <h5 class="card-title fw-bold">Dental Checkups</h5>
            <p class="card-text">Regular exams to ensure optimal dental health and early detection of issues.</p>
          </div>
        </div>
      </div>

      <!-- Service 2 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <div class="service-icon mb-3">📅</div>
            <h5 class="card-title fw-bold">Online Appointments</h5>
            <p class="card-text">Book appointments online with ease, anytime and anywhere.</p>
          </div>
        </div>
      </div>

      <!-- Service 3 -->
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <div class="service-icon mb-3">🩺</div>
            <h5 class="card-title fw-bold">Specialist Referrals</h5>
            <p class="card-text">Get referred to trusted dental specialists for advanced treatments.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$content = ob_get_clean(); // Get buffered content
include __DIR__ . '/../layout.php'; // Render with layout
?>