
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

  <!-- <section class="info-video-wrapper">
    <div class="info-video-grid">

        <!LEFT SIDE -->
        <div class="left-info">

            <!-- UPSC -->
            <div class="info-section">
                <h3>UPSC Exam Informations Updates</h3>

             
            </div>

            <!-- UPPCS (JUST BELOW UPSC) -->
            <div class="info-section">
                <h3>UPPCS Exam Informations Updates</h3>

              
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="right-video">

            <!-- OPEN VIDEO -->
            <div class="video-section">
                <h3>Youtube Open Video</h3>

               
            </div>

            <!-- LATEST VIDEOS -->
            <div class="video-section">
                <h3>Live & Latest Videos</h3>

               
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