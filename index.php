<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmileCare Dental Clinic</title>

    <!-- Bootstrap 5 CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="/assets/js/aos.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="/assets/css/fonts.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="./images/smile-care-logo.png" alt="SmileCare" height="40" class="pulse-animation">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about-us.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="team.php">Team</a></li>
                </ul>
                <a href="patient/book.php" class="main-btn mt-2 ms-5">Get an Appointment</a>
            </div>
        </div>
    </nav>
    <!-- Hero Slider -->
    <div id="mainSlider" class="carousel slide hero-slider" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://images.unsplash.com/photo-1588774069410-84ae30757c8e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1920&q=80')">
                <div class="carousel-caption">
                    <h1 class="display-4 mb-4">Create Your Perfect Smile</h1>
                    <p class="lead mb-4">Comprehensive dental care for all ages</p>
                    <a href="/about-us/contact-us" class="main-btn mt-2">Get an Appointment <img src="images/main-btn-arrow.svg" alt="Main Button Arrow Icon" class="ms-3" width="10" height="16"></a>
                </div>
            </div>

            <div class="carousel-item" style="background-image: url('https://images.pexels.com/photos/6627534/pexels-photo-6627534.jpeg?auto=compress&cs=tinysrgb&w=1920')">
                <div class="carousel-caption">
                    <h1 class="display-4 mb-4">Modern Dental Technology</h1>
                    <p class="lead mb-4">Pain-free treatments with advanced equipment</p>
                    <a href="/about-us/contact-us" class="main-btn mt-2">Get an Appointment <img src="images/main-btn-arrow.svg" alt="Main Button Arrow Icon" class="ms-3" width="10" height="16"></a>
                </div>
            </div>

            <div class="carousel-item" style="background-image: url('images/dental-background.png')">
                <div class="carousel-caption">
                    <h1 class="display-4 mb-4">Emergency Dental Care</h1>
                    <p class="lead mb-4">24/7 emergency services available</p>
                    <a href="/about-us/contact-us" class="main-btn mt-2">Get an Appointment <img src="images/main-btn-arrow.svg" alt="Main Button Arrow Icon" class="ms-3" width="10" height="16"></a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- About Section -->
    <section id="about" class="py-50 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <img src="https://images.pexels.com/photos/3845810/pexels-photo-3845810.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="About Us" class="img-fluid rounded-3 shadow">
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0 ps-5" data-aos="fade-left">
                    <h1 class="section-title">About SmileCare</h1>
                    <p class="lead">We combine advanced technology with compassionate care to deliver exceptional dental services.</p>
                    <p>Established in 2010, SmileCare has been providing world-class dental care to our community. Our state-of-the-art facility and experienced team ensure comfortable and effective treatments.</p>
                    <div class="row mt-4 g-4 justify-content-center">
                        <div class="col-md-4 text-center">
                            <div class="doc-box">
                                <h3 class="text-primary">5000+</h3>
                                <p>Happy Patients</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="doc-box">
                                <h3 class="text-primary">15+</h3>
                                <p>Years Experience</p>
                            </div>
                        </div>
                        <div class="col-md-4 text-cente">
                            <div class="doc-box">
                                <h3 class="text-primary">50+</h3>
                                <p>Awards Won</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-50">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Services</h2>
                <p>Comprehensive dental care solutions</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-tooth fa-3x text-primary mb-3"></i>
                            <h5>General Dentistry</h5>
                            <p>Regular checkups, cleanings, and preventive care</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-smile fa-3x text-primary mb-3"></i>
                            <h5>Cosmetic Dentistry</h5>
                            <p>Smile makeovers, veneers, and teeth whitening</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card service-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="fas fa-tooth fa-3x text-primary mb-3"></i>
                            <h5>Orthodontics</h5>
                            <p>Braces and aligners for perfect teeth alignment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-50">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Patient Testimonials</h2>
                <p>What our patients say about us</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
                    <div class="testimonial-card p-4 h-100">
                        <p class="mb-3">"The best dental experience I've ever had! Professional staff and painless treatment."</p>
                        <h5>Sarah Johnson</h5>
                        <p class="text-muted mb-0">Patient</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
                    <div class="testimonial-card p-4 h-100">
                        <p class="mb-3">"Amazing results with my smile makeover. Highly recommended!"</p>
                        <h5>Michael Brown</h5>
                        <p class="text-muted mb-0">Patient</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="flip-left" data-aos-delay="300">
                    <div class="testimonial-card p-4 h-100">
                        <p class="mb-3">"Friendly environment and expert care for my kids. Thank you!"</p>
                        <h5>Emily Davis</h5>
                        <p class="text-muted mb-0">Patient</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-50  why-choose">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Why Choose Us</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a </p>
            </div>
            <div class="row g-4">
                <div class="col-md-3 text-center">
                    <div class="eh" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-certificate fa-3x mb-3"></i>
                        <h5>Certified Experts</h5>
                        <p>Trained professionals</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="eh" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-clock fa-3x mb-3"></i>
                        <h5>24/7 Emergency</h5>
                        <p>Round-the-clock services</p>
                    </div>
                </div>
                <div class="col-md-3 text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="eh" data-aos="fade-up" data-aos-delay="400">
                        <i class="fas fa-star fa-3x mb-3"></i>
                        <h5>5-Star Rated</h5>
                        <p>Trusted by thousands</p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="eh" data-aos="fade-up" data-aos-delay="400">
                        <i class="fas fa-location-dot fa-3x mb-3"></i>
                        <h5>Convenient Location</h5>
                        <p>Central city location</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white text-center">
        <div class="container">
            <h2 class="display-5 fw-bold">Need to See a Doctor?</h2>
            <p class="lead mb-4">Book your appointment in just a few clicks. Quick, easy, and secure!</p>
            <a href="patient/book.php" class="btn btn-light btn-lg px-4 rounded-pill">
                Book an Appointment
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="footer-upper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="text-center text-lg-left">
                            <a href="/" rel="nofollow">
                                <img class="footer-logo mb-4" loading="lazy" src="/images/smile-care-logo.png" alt="Smile Care LOGO" width="338" height="67">
                            </a>
                            <p class="text-white">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage</p>
                            <div class="mt-3">
                                <ul class="social-icon">
                                    <li>
                                        <a href="#" aria-label="Facebook Icon" target="_blank" rel="nofollow noopener"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" aria-label="Linkedin Icon" target="_blank" rel="nofollow noopener"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" aria-label="Youtube Icon" target="_blank" rel="nofollow noopener"><i class="fa fa-youtube-play"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" aria-label="Google Icon" target="_blank" rel="nofollow noopener"><i class="fa fa-google"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row justify-content-center">
                            <div class="col-sm-6 col-lg-3 offset-xl-1 mb-4 mb-md-0">
                                <div class="footer-widget links-widget">
                                    <div class="widget-title text-uppercase d-inline-block">Useful Navigation</div>
                                    <ul>
                                        <li><a href="/about-us">About Us</a></li>
                                        <li><a href="/about-us/contact-us">Contact Us</a></li>
                                        <li><a href="/about-us/faq">FAQ</a></li>
                                        <li><a href="/about-us/terms">Terms & Conditions</a></li>
                                        <li><a href="/about-us/privacy">Privacy Policy</a></li>
                                        <li><a href="/about-us/careers">Careers</a></li>
                                        <li><a href="/sitemap">Sitemap</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-5 mt-4 mt-lg-0 text-center text-lg-left">
                                <div class="footer-widget links-widget">
                                    <div class="widget-title text-uppercase d-inline-block">Chamber Address</div>
                                    <div class="widget-title company"><a href="https://ddcc.com.bd/" target="_blank" rel="nofollow">Dhanmondi Diagnostic &amp; Consultation Center</a></div>
                                    <address>
                                        <a href="https://maps.app.goo.gl/Zf2fWu16uiJAk3HD7" target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-map-marker mr-3"></i>79 Satmasjid Road, Dhaka 1205
                                        </a>
                                    </address>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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

</body>

</html>