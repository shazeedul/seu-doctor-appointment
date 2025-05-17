<?php

$pageTitle = "Home - SmileCare Dental Clinic";

$extraStyle = `
    <link rel="stylesheet" href="/assets/libs/aos/css/aos.min.css">
`;

$extraScript = `
    <script src="/assets/libs/aos/js/aos.min.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 100,
            once: true,
            easing: 'ease-in-out'
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
`;
ob_start(); // Start output buffering
?>

<!-- Hero Slider -->
<?php include_once 'sections/hero-slider.php'; ?>

<!-- About Section -->
<?php include_once 'sections/about.php'; ?>

<!-- Services Section -->
<?php include_once 'sections/service.php'; ?>

<!-- Team Section -->
<?php include_once 'sections/team.php'; ?>

<!-- Testimonials Section -->
<?php include_once 'sections/testimonials.php'; ?>

<!-- Why Choose Us Section -->
<?php include_once 'sections/choose-us.php'; ?>

<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="display-5 fw-bold">Need to See a Doctor?</h2>
        <p class="lead mb-4">Book your appointment in just a few clicks. Quick, easy, and secure!</p>
        <a href="patient/book" class="btn btn-light btn-lg px-4 rounded-pill">
            Book an Appointment
        </a>
    </div>
</section>

<?php
$content = ob_get_clean(); // Get buffered content
include __DIR__ . '/../layout.php'; // Render with layout
?>