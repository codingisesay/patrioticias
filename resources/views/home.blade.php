
@extends('layout')
@section('content')


    <!-- Header Start -->
 <div class="slideshow-container">

    <div class="mySlide">
        <img src="{{ asset('withoutLogin/img/banner.jpeg') }}">
    </div>

    <div class="mySlide">
        <img src="{{ asset('withoutLogin/img/newcourse1.jpeg') }}">
    </div>

    <div class="mySlide">
        <img src="{{ asset('withoutLogin/img/newbanner3.jpeg') }}">
    </div>

    <div class="mySlide">
        <img src="{{ asset('withoutLogin/img/newbanner4.jpeg') }}">
    </div>

    <!-- Arrows -->
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

    <!-- Dots -->
    <div class="dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
    </div>

</div>

 <section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            {{-- LEFT : Exam Information Updates --}}
            <div class="col-lg-6 col-md-12">
                <div class="info-box h-100">
                    <h3 class="section-title">Exam Information Updates</h3>

                    <ul class="info-list">
                        <li>UPSC Prelims 2025 Notification Released</li>
                        <li>UPPCS Mains Exam Date Announced</li>
                        <li>New Syllabus Update for GS Paper</li>
                        <li>Optional Subject Strategy PDF Available</li>
                    </ul>
                </div>
            </div>

            {{-- RIGHT : Live / Latest Video --}}
           <div class="col-lg-6 col-md-12">
    <div class="video-box h-100">
        <h3 class="section-title">Live & Latest Video</h3>

        @if($video && $video->VideoEmbedCodeEnglish)
            <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                <iframe
                    src="{{ $video->VideoEmbedCodeEnglish }}"
                    style="position:absolute;top:0;left:0;width:100%;height:100%;"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>
        @else
            <div class="no-video">
                <p>No live video available right now</p>
            </div>
        @endif
    </div>
</div>

</section>



<section class="about-section">
    <div class="about-container">

        <!-- Heading -->
        <div class="about-heading">
            <h2>About Us</h2>
            <p>Know Us and Contact Us !</p>
        </div>

        <div class="about-grid">

            <!-- LEFT SIDE -->
            <div class="about-left">
                <div class="about-logo">
                    <img src="{{ asset('withoutLogin/img/logo.png') }}" alt="Logo">
                </div>

                <h3 class="vision-title">Our Vision</h3>

                <p class="vision-text">
                   PatrioticIAS is founded on the principle of providing quality education at an affordable cost, ensuring that candidates from all sections of society have access to top-notch preparation resources. We aim to bridge the gap between aspirants from different socioeconomic backgrounds by offering a holistic curriculum that covers every aspect of the UPSC/State PSC exams.
                </p>
            </div>

            <!-- RIGHT SIDE -->
            <div class="about-right">
                <div class="contact-info">

                    <div class="info-item">
                        <span class="icon">📍</span>
                        <span>Third Floor KV Tower, Padleyganj Road, Gorakhpur</span>
                    </div>

                    <div class="info-item">
                        <span class="icon">📞</span>
                        <span>Phone: +91 9971932488</span>
                    </div>

                    <div class="info-item">
                        <span class="icon">✉️</span>
                        <span>Email: info@patrioticias.in</span>
                    </div>

                </div>

                <!-- MAP -->
                <div class="map-box">
                    <iframe
                        src="https://www.google.com/maps?q=Gorakhpur%20Padleyganj%20KV%20Tower&output=embed"
                        width="100%"
                        height="320"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="career-section">
    <div class="container">
        <div class="row align-items-center">

            {{-- LEFT IMAGE --}}
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="{{ asset('withoutLogin/img/career.png') }}"
                     alt="Career With Us"
                     class="career-img">
            </div>

            {{-- RIGHT CONTENT --}}
            <div class="col-md-6">
                <h2 class="career-title">CAREER WITH US</h2>

                <p class="career-text">
                    We are committed to quality and integrity, and strongly believe
                    the success of our students depend greatly on the competence
                    and attitude of our experts. If you feel that you have the right
                    mindset and also passion and dedication, do contact us.
                    We always welcome fresh talent.
                </p>

                <p class="career-text">
                    To become a part of Patriotic IAS Team, please send your resume to
                </p>

                <p class="career-email">
                    <i class="fa fa-envelope"></i>
                    <a href="mailto: info@patrioticias.in">
                        info@patrioticias.in
                    </a>
                </p>
            </div>

        </div>
    </div>
</section>



<!-- Header End -->




    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Our Location</h4>
                                <p class="m-0">Third Floor KV Tower, Padleyganj Road, Gorakhpur</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Call Us</h4>
                                <p class="m-0"> Phone: +91 9971932488</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Us</h4>
                                <p class="m-0">Email: info@patrioticias.in</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>
                        <h1 class="display-4">Send Us A Message</h1>
                    </div>
                    <div class="contact-form">
                        <form>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection