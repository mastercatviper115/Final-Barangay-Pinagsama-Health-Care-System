<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LGU Healthcare Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- fontawesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- icon icon -->
    <link rel="stylesheet" href="style.css">

</head>

<body>




    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">

            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">

                <a href="/" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa-solid fa-hospital me-2"></i></i>PINAGSAMA
                        HEALTHCARE</h1>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport" style="visibility: visible !important;">
                    <div class="navbar-nav ms-auto py-0">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#service">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                            <!--
                @if (Route::has('login'))
@auth
        
                    <li class="nav-item">
                      <a class="nav-link"  href="{{ url('myappointment') }}">My Appointment</a>
                    </li>
        
                    <x-app-layout>
                   
                    </x-app-layout>
@else
    <li class="nav-item" style="margin: 20px 0px 0px 10px ;">
                      <a class="btn btn-primary ml-lg-3" style="font-size: 20px;" href="{{ route('login') }}">Login</a>
                    </li>
        
                    <li class="nav-item" style="margin: 20px 0px 0px 10px ;">
                        <a class="btn btn-primary ml-lg-3" style="font-size: 20px;" href="{{ route('register') }}">Register</a>
                      </li>
        
                 @endAuth
@endif
            -->
                        </ul>
                    </div>
                </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
        </nav>
    </div>


    <!-- Navbar End -->


    <!-- Hero Start -->
    @if (session()->has('message'))
        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert"> x </button>
            {{ session()->get('message') }}

        </div>
    @endif




    <div class="container-fluid bg-primary py-5 mb-5 hero-header heroheight" id="home">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-50 text-center text-lg-start">
                    <!--
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To Brgy. 14 Healthcare</h5>
                    <h1 class="display-1 text-white mb-md-4">Best Barangay Healthcare at your Service</h1>-->
                    <div class="pt-2" align="center">

                        <a href="#appointment"
                            class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2 appointmentbtn">Book An
                            Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="../assets/img/Hcbuilding.png"
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h3 class="d-inline-block text-primary text-uppercase border-bottom border-5 ">About Us</h3>
                        <h1 class="display-4">Best Medical Care For Yourself and Your Family</h1>
                    </div>
                    <p>Welcome to PINAGSAMA HEALTH CENTER, your government-owned healthcare hub in the heart of Taguig
                        City, Metro Manila. Committed to serving the community, we take pride in offering quality
                        medical care to the public, with a special emphasis on providing free services for indigent
                        patients. Our highly trained staff is well-versed in the latest developments in medicine,
                        ensuring that you receive the best possible care.</p>
                    <div class="row g-3 pt-3">
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-user-md text-primary mb-3"></i>
                                <h6 class="mb-0">Qualified<small class="d-block text-primary">Doctors</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-procedures text-primary mb-3"></i>
                                <h6 class="mb-0">Emergency<small class="d-block text-primary">Services</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-microscope text-primary mb-3"></i>
                                <h6 class="mb-0">Accurate<small class="d-block text-primary">Testing</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-ambulance text-primary mb-3"></i>
                                <h6 class="mb-0">Free<small class="d-block text-primary">Ambulance</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br></br>
            <br></br>
            <section class="MV ">
                <div class= "mivi">
                    <h3 align=center>MISSION</h3>
                    <p align=center>To deliver accessible telehealth services, redefining healthcare for a healthier
                        lifestyle. We aim to streamline efficient virtual medical care throughout the city, ensuring
                        that quality healthcare is within reach for every resident.</p>
                </div>
                <br></br>
                <div class ="mivi">
                    <h3 align=center> VISION </h3>
                    <p align=center>To establish a seamless healthcare experience that enables quick and effortless
                        access to essential medical services. we aim to create a healthcare ecosystem that is
                        responsive, patient-centric, and enhances the overall well-being of our community.</p>
                </div>
            </section>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid py-5" id="service">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h3 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h3>
                <h1 class="display-4">Excellent Medical Services</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa-solid fa-stethoscope icon text-white"></i>
                        </div>
                        <h4 class="mb-3">Medical Checkup</h4>
                        <p class="m-0">Expert care for your health, including check-ups, diagnostics, and treatment
                            to promote overall well-being.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa-solid fa-lungs icon text-white"></i>
                        </div>
                        <h4 class="mb-3">TB DOTS</h4>
                        <p class="m-0">Treatment for tuberculosis, ensuring patients take their medications under
                            supervision for better results.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa-solid fa-tooth icon text-white"></i>
                        </div>
                        <h4 class="mb-3">Dental</h4>
                        <p class="m-0"> Specialized care for oral health, including check-ups, cleanings, and
                            treatments to maintain healthy teeth and gums.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa-solid fa-paw icon text-white"></i>
                        </div>
                        <h4 class="mb-3">Animal Bite</h4>
                        <p class="m-0"> Prompt and specialized care for bites, preventing infection and addressing
                            potential rabies concerns through thorough evaluation and treatment.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            </i><i class="fa-solid fa-person-breastfeeding icon text-white"></i>
                        </div>
                        <h4 class="mb-3">Pre-natal & Family Planning</h4>
                        <p class="m-0">Care for expectant mothers and individuals seeking family planning, including
                            prenatal check-ups, counseling, and contraception guidance for informed family choices</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa-solid fa-syringe icon text-white"></i>
                        </div>
                        <h4 class="mb-3">Immunization</h4>
                        <p class="m-0"> Vital preventive healthcare, providing vaccines to bolster the immune system
                            against infectious diseases, safeguarding individuals and communities.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-primary my-5 py-5" id="appointment">
        <div class="container py-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-black text-uppercase border-bottom border-5">Appointment</h5>
                        <h1 class="display-4">Make An Appointment For Your Family</h1>

                    </div>
                    <p class="text-black mb-5">Secure your family's well-being with ease by scheduling appointments for
                        all your health needs. Whether it's routine check-ups, vaccinations, or consultations, our
                        convenient appointment booking ensures that your family's health remains a top priority. Embrace
                        proactive healthcare by making appointments that suit your schedule, keeping your loved ones on
                        the path to optimal health.</p>
                    <!-- <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="#doctors">Find Doctor</a>
                    <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="#service">Read More</a>
-->
                </div>
                <div class="col-lg-6">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Book An Appointment</h1>
                        <form action="{{ url('appointment') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;"
                                        name="type" placeholder="Choose Appointment">

                                        <option value="Visit on site">Visit on site</option>
                                        <option value="Online Consulation">Online Consulation</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6" data-wow-delay="300ms">
                                    <select class="form-select bg-light border-0" style="height: 55px;"
                                        name="service" placeholder="Select Services">

                                        <option value="Medical Checkup">Medical Checkup</option>
                                        <option value="TB Dots">TB Dots</option>
                                        <option value="Dental">Dental</option>
                                        <option value="Animal Bites">Animal Bites</option>
                                        <option value="Pre-natal & Family Planning">Pre-natal & Family Planning
                                        </option>
                                        <option value="Immunization">Immunization</option>
                                        <option value="Swab Test">Swab Test</option>
                                        <option value="HIV Test">HIV Test</option>

                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Name"
                                        style="height: 55px" name="name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Email"
                                        style="height: 55px;" name="email">
                                </div>


                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Appointment Date" data-target="#date"
                                            data-toggle="datetimepicker" style="height: 55px;" name="date">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0"
                                        placeholder="Barangay ID Number" style="height: 55px;" name="barangayid">
                                </div>



                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Make An
                                        Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Search Start -->
    <!--
    <div class="container-fluid bg-primary my-5 py-5" id="doctors">
        
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Find A Doctor</h5>
                <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
                <h5 class="text-white fw-normal">Duo ipsum erat stet dolor sea ut nonumy tempor. Tempor duo lorem eos sit sed ipsum takimata ipsum sit est. Ipsum ea voluptua ipsum sit justo</h5>
            </div>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <select class="form-select border-primary w-25" style="height: 60px;">
                        <option selected>Department</option>
                        <option value="1">Department 1</option>
                        <option value="2">Department 2</option>
                        <option value="3">Department 3</option>
                    </select>
                    <input type="text" class="form-control border-primary w-50" placeholder="Keyword">
                    <button class="btn btn-dark border-0 w-25">Search</button>
                </div>
            </div>
        </div>
    </div>
-->

    <!--Footer 1 Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hotlineheader hotlineheight" id="home">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-50 text-center text-lg-start">
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4"
                        id="contact">Get In Touch</h4>
                    <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed
                        dolor</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i> Pampano Street Brgy. 14,
                        Caloocan City, Philippines</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@example.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4
                        class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#about"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#service"><i class="fa fa-angle-right me-2"></i>Our
                            Services</a>
                        <a class="text-light mb-2" href="#team"><i class="fa fa-angle-right me-2"></i>Meet The
                            Team</a>
                        <a class="text-light" href="#"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4
                        class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">
                        Popular Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#about"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#service"><i class="fa fa-angle-right me-2"></i>Our
                            Services</a>
                        <a class="text-light mb-2" href="#team"><i class="fa fa-angle-right me-2"></i>Meet The
                            Team</a>
                        <a class="text-light" href="#"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <!--<div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Newsletter</h4>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-primary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Pinagsama Healthcare Management
                            System</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>




    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>
