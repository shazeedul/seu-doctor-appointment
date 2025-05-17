<?php
$pageTitle = "Team - Doctor Appointment System";
$extraStyle  = `
    <link rel="stylesheet" href="/assets/libs/aos/css/aos.css">
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
<!-- Team Section -->
<section id="team" class="py-50 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Meet Our Team</h2>
            <p>Professional and experienced dental specialists</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="team-member">
                    <img src="https://images.pexels.com/photos/4173239/pexels-photo-4173239.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        class="img-fluid" alt="Dr. John">
                    <div class="p-4">
                        <h5>Dr. John Doe</h5>
                        <p class="text-muted mb-0">Chief Dental Surgeon</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="team-member">
                    <img src="https://images.pexels.com/photos/4173251/pexels-photo-4173251.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        class="img-fluid" alt="Dr. Sarah">
                    <div class="p-4">
                        <h5>Dr. Sarah Smith</h5>
                        <p class="text-muted mb-0">Orthodontist</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="team-member">
                    <img src="https://images.pexels.com/photos/4173251/pexels-photo-4173251.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        class="img-fluid" alt="Dr. Mike">
                    <div class="p-4">
                        <h5>Dr. Mike Johnson</h5>
                        <p class="text-muted mb-0">Pediatric Dentist</p>
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