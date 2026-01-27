

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PatrioticIAS - IAS/PCS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    {{-- <link href="css/style.css" rel="stylesheet"> --}}
    <link href="{{ asset('withoutLogin/css/style.css') }}" rel="stylesheet">

    <!-- Home page stylesheet -->
     {{-- <link href="css/style.home.css" rel="stylesheet"> --}}
     <link href="{{ asset('withoutLogin/css/slider.css') }}" rel="stylesheet">

    

</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+91 9971932488</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>info@patrioticias.in</small>
                     <!-- <a class="text-white px-2" href="">
                        <small><i class="fas fa-map-marker-alt">Location</i></small>
                    </a> -->
                      <!-- <a class="text-white px-3" href="">
                        <small><i class="fas fa-map-marker-alt">Patriotic IAS, 3rd Floor, KV Tower, Paidleyganj Road, Gorakhpur</i></small>
                    </a> -->
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="{{ route('home') }}" class="navbar-brand ml-lg-3">
                <h2 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>PatrioticIAS</h2>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Classroom Programmes</a>
                        <div class="dropdown-menu m-0">
                           <a href="{{ route('openclassroom') }}" class="dropdown-item">UPSC</a>
                           <a href="{{ route('uppcsclassroom') }}" class="dropdown-item">UPPCS</a>

                           
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Test Series Programme
                        </a>

                        <div class="dropdown-menu m-0">
                            <a href="{{ route('testseries.upsc') }}" class="dropdown-item">UPSC</a>
                            <a href="{{ route('testseries.uppcs') }}" class="dropdown-item">UPPCS</a>
                            <a href="{{ route('testseries.open') }}" class="dropdown-item">Open Test</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Interview Programme</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('detail') }}" class="dropdown-item">UPSC</a>
                            <a href=" {{ route('feature') }}" class="dropdown-item">UPPCS</a>
                           
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admission</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('detail') }}" class="dropdown-item">Study Material English</a>
                            <a href=" {{ route('feature') }}" class="dropdown-item">Study Material Hindi</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('loginPage') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
            </div>
        </nav>
    </div>


    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    {{-- <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a> --}}
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Download Prospectus</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('detail') }}" class="dropdown-item">UPSC</a>
                            <a href=" {{ route('feature') }}" class="dropdown-item">UPPCS</a>
                           
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            Study Materials
                        </a>

                        <div class="dropdown-menu m-0">

                            
                            <div class="dropdown-submenu">
                                <a href="#" class="dropdown-item dropdown-toggle">
                                    Study Material English
                                </a>

                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Syllabus</a>
                                    <a href="#" class="dropdown-item">NCERTs</a>

                                    <div class="dropdown-submenu">
                                        <a href="#" class="dropdown-item dropdown-toggle">PYQs</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item">UPSC PYQs</a>
                                            <a href="#" class="dropdown-item">UPPCS PYQs</a>
                                        </div>
                                    </div>

                                    <a href="#" class="dropdown-item">Current Affairs</a>
                                </div>
                            </div>

                            
                            <div class="dropdown-submenu">
                                <a href="#" class="dropdown-item dropdown-toggle">
                                    Study Material Hindi
                                </a>

                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Syllabus</a>
                                    <a href="#" class="dropdown-item">NCERTs</a>
                                    <div class="dropdown-submenu">
                                        <a href="#" class="dropdown-item dropdown-toggle">PYQs</a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item">UPSC PYQs</a>
                                            <a href="#" class="dropdown-item">UPPCS PYQs</a>
                                        </div>
                                    </div>
                                    <a href="#" class="dropdown-item">Current Affairs</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Blogs</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('detail') }}" class="dropdown-item">UPSC</a>
                            <a href=" {{ route('feature') }}" class="dropdown-item">UPPCS</a>
                           
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Toppers Guidance</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('detail') }}" class="dropdown-item">Study Material English</a>
                            <a href=" {{ route('feature') }}" class="dropdown-item">Study Material Hindi</a>
                        </div>
                    </div>

                       <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">UPSC/UPPCS Exam Info.</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('detail') }}" class="dropdown-item">UPSC Exam</a>
                            <a href=" {{ route('feature') }}" class="dropdown-item">UPPCS Exam</a>
                        </div>
                    </div>



                 <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                UPSC/UPPCS PYQs
                            </a>

                            <div class="dropdown-menu m-0">

                               
                                <div class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">
                                        Mains
                                    </a>
                                    <!-- <div class="dropdown-menu">
                                        <a href="{{ route('detail') }}" class="dropdown-item">GS Paper I</a>
                                        <a href="{{ route('detail') }}" class="dropdown-item">GS Paper II</a>
                                        <a href="{{ route('detail') }}" class="dropdown-item">GS Paper III</a>
                                        <a href="{{ route('detail') }}" class="dropdown-item">GS Paper IV</a>
                                    </div> -->
                                </div>

                                
                                <div class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">
                                        Prelims
                                    </a>
                                    <!-- <div class="dropdown-menu">
                                        <a href="{{ route('feature') }}" class="dropdown-item">GS Paper I</a>
                                        <a href="{{ route('feature') }}" class="dropdown-item">GS Paper II (CSAT)</a>
                                        <a href="{{ route('feature') }}" class="dropdown-item">Sectional</a>
                                        <a href="{{ route('feature') }}" class="dropdown-item">Subject Wise</a>
                                    </div> -->
                                </div>

                            </div>
                        </div>

                    
                      <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">NCERT</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('detail') }}" class="dropdown-item">History</a>
                            <a href=" {{ route('feature') }}" class="dropdown-item">Society</a>
                            <a href="{{ route('team') }}" class="dropdown-item">Geography</a>
                            <a href="{{ route('testimonial') }}" class="dropdown-item">Polity</a>
                            <a href="{{ route('detail') }}" class="dropdown-item">Economy</a>
                            <a href=" {{ route('feature') }}" class="dropdown-item">Science</a>
                            <a href="{{ route('team') }}" class="dropdown-item">Environment</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>


@yield('content')


<!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>PatrioticIAS</h1>
                    </a>
                    <p class="m-0">PatrioticIAS is founded on the principle of providing quality education at an affordable cost, ensuring that candidates from all sections of society have access to top-notch preparation resources. We aim to bridge the gap between aspirants from different socioeconomic backgrounds by offering a holistic curriculum that covers every aspect of the UPSC/State PSC exams.</p>
                </div>
                <!-- <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Newsletter</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Sign Up</button>
                            </div>
                        </div> -->
                    <!-- </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Third Floor KV Tower, Padleyganj Road, Gorakhpur</p>
                    <p><i class="fa fa-phone-alt mr-2"></i> +91 9971932488</p>
                    <p><i class="fa fa-envelope mr-2"></i> info@patrioticias.in</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-youtube"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
                <!-- <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Our Courses</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Web Design</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Apps Design</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Marketing</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Research</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>SEO</a>
                    </div>
                </div> -->
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Privacy Policy</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Terms & Condition</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Regular FAQs</a>
                        <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Help & Support</a>
                        <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">Patriotic IAS</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0">Designed by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('withoutLogin/lib/easing/easing.min.js') }}"></script>
    <script src=" {{ asset('withoutLogin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src=" {{ asset('withoutLogin/lib/counterup/counterup.min.js') }} "></script>
    <script src=" {{ asset('withoutLogin/lib/owlcarousel/owl.carousel.min.js') }} "></script>

    <!-- Template Javascript -->
    <script src="{{ asset('withoutLogin/js/main.js') }}"></script>

     <!-- Homepage script -->
      <script src="{{ asset('withoutLogin/js/slider.js') }}"></script>

</body>

