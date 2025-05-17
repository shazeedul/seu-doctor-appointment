<?php
$pageTitle = "About Us - SmileCare Dental Clinic";
ob_start(); // Start output buffering
?>
<section class="py-50  why-choose">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Content -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="fw-bold">Who We Are</h2>
                <p>
                    Our Doctor Appointment System helps patients easily book appointments with certified doctors from the comfort of their home. We are committed to providing accessible, efficient, and high-quality healthcare.
                </p>
                <p>
                    With a growing network of medical professionals and a patient-friendly interface, our goal is to make healthcare more convenient and transparent for everyone.
                </p>
            </div>

            <!-- Image -->
            <div class="col-md-6">
                <img src="https://images.pexels.com/photos/3845810/pexels-photo-3845810.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Doctor at work" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean(); // Get buffered content
include __DIR__ . '/../layout.php'; // Render with layout
?>