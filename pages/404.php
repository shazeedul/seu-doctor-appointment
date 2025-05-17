<?php
$pageTitle = "Page Not Found - Doctor Appointment System";

ob_start(); // Start output buffering
?>
<!-- 404 Error Section -->

<section class="py-50 text-center">
    <div class="container">
        <h1 class="display-4 fw-bold">404</h1>
        <p class="lead">Oops! The page you're looking for doesn't exist.</p>
        <a href="/" class="btn btn-primary">Go Back to Home</a>
    </div>
</section>

<?php
$content = ob_get_clean(); // Get buffered content
include __DIR__ . '/../layout.php'; // Render with layout
?>