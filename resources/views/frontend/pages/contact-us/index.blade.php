@php
   $metaDesc ="Book an appointment with Dr. Aradhya Achuri, leading fertility doctor in Hyderabad. Call now or visit our IVF clinic for expert care.";
   $meta_description = Illuminate\Support\Str::limit(strip_tags($metaDesc), 160);
@endphp
@extends('frontend.layouts.master')
@section('title','Contact Fertility Clinic Hyderabad | Dr. Aradhya Achuri')
@section('description', $meta_description)
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay" style="background-image:url({{ asset('fronted/assets/aradhya/breadcrumb/contact-us.jpg')}});">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>Contact Us</h1>
                    <!-- <h6>Some content here</h6> -->
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        </div>
    </div>
    <section class="section-area section-sp1 contact-section">
        <div class="container">
            <div class="contact-wraper">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-30">
                        <div class="form-wraper">
                            @include('frontend.layouts.enquiry-form')
                        </div>
                    </div>
                    <div class="col-lg-6 mb-30">
                        <div class="contact-info ovpr-dark" style="background-image: url({{ asset('fronted/assets/aradhya/my-expertise.jpg')}});">
                            <div class="info-inner">
                                <h4 class="title mb-30">Feel Free To Contact Us</h4>
                                <div class="icon-box">
                                    <h6 class="title"><i class="ti-map-alt"></i>Our Clinic</h6>
                                    <p class="mb-0">
                                        <a href="https://goo.gl/maps/dpEkxCsgTW2dDjkk9">
                                            Medics Fertility Clinic Survey No. 55/E, Nanakramguda Circle Nanakramguda, Gachibowli, Telangana 500032
                                        </a>
                                    </p>
                                    <p>
                                        <strong>
                                            Timing: 
                                        </strong>
                                        4PM - 6PM 
                                    </p>

                                    <p class="mb-0">
                                        <a href="https://goo.gl/maps/dpEkxCsgTW2dDjkk9">
                                           Gramakautam, Plot No.1, Plot No.6, Kothaguda Village Serilingampally, M, 2-34/2, Gachibowli - Miyapur Rd, Kondapur, Hyderabad, Telangana 500084
                                        </a>
                                        
                                    </p>
                                    <p>
                                        <strong>
                                            Timing: 
                                        </strong>
                                        10AM - 3PM
                                    </p>
                                </div>
                                <div class="icon-box">
                                    <h6 class="title"><i class="ti-headphone"></i>Call Us</h6>
                                    <p>
                                        <a href="tel:+917093532797">
                                            +91 70935 32797
                                        </a>
                                    </p>
                                </div>
                                <div class="icon-box">
                                    <h6 class="title"><i class="ti-id-badge"></i>Mail Us</h6>
                                    <p>
                                        <a href="mailto:info.draradhyaachuri@gmail.com" class="text-white">
                                            info.draradhyaachuri@gmail.com</a>
                                    </p>

                                </div>
                                <div class="icon-box">
                                    <h6 class="title"><i class="ti-world"></i>Follow Us</h6>
                                    <ul class="social-media">
                                        <li>
                                            <a target="_blank" href="https://www.facebook.com/fertsupport">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.instagram.com/draradhyaachuri/">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://in.linkedin.com/in/aradhya-achuri-8b557380">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <section class="section-area section-sp1 map-section">
        <div class="container">
            <div class="map-wrappwer">
                <div class="row align-items-center">
                   <div class="col-lg-12 mb-30">
                        <div class="w-100 float-left map-con">
                            <div class="container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3806.8623293228397!2d78.3519047!3d17.4183933!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb95514f7777d7%3A0xa8b434db34e10133!2sMedics%20Healthcare!5e0!3m2!1sen!2sin!4v1735297429875!5m2!1sen!2sin" style=" height:360px; width: 100%; border: 0;"></iframe>
                                
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
@endpush