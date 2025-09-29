@php
$metaDesc ="Looking for the best fertility doctor in Hyderabad? Dr. Aradhya Achuri’s IVF clinic offers advanced fertility treatments, IVF, IUI, and personalized care. Book your appointment today at one of the top fertility centers in Hyderabad.";
$meta_description = Illuminate\Support\Str::limit(strip_tags($metaDesc), 160);
$metaTitle = Str::limit('Best Fertility Doctor in Hyderabad - Dr. Aradhya Achuri', 57);
@endphp

@extends('frontend.layouts.master')
@section('title', $metaTitle)
@section('description', $meta_description)
@section('main-content')
<div class="page-content bg-white">
   <div class="main-banner"
      style="background-image: linear-gradient(rgba(205, 95, 55, 0.1), rgba(205, 95, 55, 0.1)), url({{ asset('fronted/assets/images/main-banner/bg1.jpg') }});">
      <div class="container inner-content">
         <div class="row align-items-center mb-50">
            <div class="col-lg-7 col-md-6 col-sm-7">
               <div class="mb-50">
                  <h1 class="banner-1-title">
                     Compassionate Fertility Care You Can Trust
                     <!-- Fertility 
									<span>
										<img class="d-none d-sm-block" src="assets/aradhya/banner-5-img-4.png" alt="">
									</span>
									Care -->
                  </h1>
                  <p>
                     From PCOS to challenging fertility concerns, Dr. Aradhya has helped 1000+ families with advanced treatments, surgical precision, and compassionate care at every step.
                  </p>
                  <a href="{{ route('contact-us') }}" class="btn btn-primary banner-enquiry shadow">Contact Us<i class="btn-icon-bx fas fa-chevron-right"></i></a>
               </div>

            </div>
            <div class="col-lg-5 col-md-6 col-sm-5">
               <div class="banner-img">
                  <img src="{{asset('fronted/assets/aradhya/doctor-bg.png')}}" alt="doctor" loading="lazy" decoding="async">
               </div>
            </div>
         </div>
      </div>
      <img class="pt-img1 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img2 animate1" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img5 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
   </div>
   <section class="section-sp1 about-area feature-home">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 mb-30">
               <div class="about-thumb-area">
                  <ul>
                     <li><img class="about-thumb1" src="{{asset('fronted/assets/aradhya/about-241x241.jpg')}}" alt="about" loading="lazy" decoding="async"></li>
                     <li><img class="about-thumb2" src="{{asset('fronted/assets/aradhya/about-299x299.jpg')}}" alt="about" loading="lazy" decoding="async"></li>
                     <li><img class="about-thumb3" src="{{asset('fronted/assets/aradhya/about-185x185.jpg')}}" alt="about" loading="lazy" decoding="async"></li>
                     <li>
                        <div class="exp-bx">14+ <span>Years Experience</span></div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-6 mb-30">
               <div class="heading-bx">
                  <!-- <h6 class="title-ext text-secondary">About Us</h6> -->
                  <h2 class="title">Our Goal Is To Empower Parenthood</h2>
                  <p>
                     At Dr. Aradhya Achuri’s Fertility Clinic, we are led by a trusted fertility specialist who has already <strong>helped 1000+ families achieve their dream of parenthood</strong>. We are dedicated to offering advanced reproductive solutions and compassionate care. Our mission is to make parenthood a reality for every hopeful individual or couple. With <strong>state-of-the-art treatments and personalized support</strong>, we help you navigate the journey to parenthood with confidence.
                  </p>
               </div>
               <div class="row">
                  <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20 col-6">
                     <div class="feature-container feature-bx1 feature1">
                        <div class="icon-md">
                           <span class="icon-cell">
                              <img src="{{asset('fronted/assets/aradhya/about-icon/fertility-support.svg')}}" loading="lazy" decoding="async" alt="support">
                           </span>
                        </div>
                        <div class="icon-content">
                           <h4 class="ttr-title">Fertility Support</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20 col-6">
                     <div class="feature-container feature-bx1 feature2">
                        <div class="icon-md">
                           <span class="icon-cell">
                              <img src="{{asset('fronted/assets/aradhya/about-icon/compassionate-care.svg')}}" alt="Compassionate Care" loading="lazy" decoding="async">
                           </span>
                        </div>
                        <div class="icon-content">
                           <h4 class="ttr-title">Compassionate Care</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20 col-6">
                     <div class="feature-container feature-bx1 feature3">
                        <div class="icon-md">
                           <span class="icon-cell">
                              <img src="{{asset('fronted/assets/aradhya/about-icon/personalized-solutions.svg')}}" alt="Personalized Solutions" loading="lazy" decoding="async">
                           </span>
                        </div>
                        <div class="icon-content">
                           <h4 class="ttr-title">Personalized Solutions</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20 col-6">
                     <div class="feature-container feature-bx1 feature4">
                        <div class="icon-md">
                           <span class="icon-cell">
                              <img src="{{asset('fronted/assets/aradhya/about-icon/trusted-results.svg')}}" alt="Trusted Results" loading="lazy" decoding="async">
                           </span>
                        </div>
                        <div class="icon-content">
                           <h4 class="ttr-title">Trusted Results</h4>
                        </div>
                     </div>
                  </div>
               </div>
               <a href="{{ route('about-us') }}" class="btn btn-primary shadow">Learn More About Us</a>
            </div>
         </div>
      </div>
      <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img5 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
   </section>
   <section class="section-sp1 service-wraper2">
      <div class="container">
         <div class="heading-bx text-center">
            <!-- <h6 class="title-ext text-secondary">Working Process</h6> -->
            <h2 class="title">Your Journey to Parenthood</h2>
         </div>
         <div class="row">
            <div class="col-xl-4 col-sm-6 mb-30">
               <div class="feature-container feature-bx3">
                  <div class="some-se-img">
                     <div class="img-dis">
                        <img src="{{asset('fronted/assets/aradhya/fertility-care.png')}}" alt="Fertility Care" loading="lazy" decoding="async">
                     </div>
                  </div>
                  <div class="other-di">
                     <h5 class="ttr-title">Fertility Care</h5>
                     <p>Personalized support and care for your fertility journey with right tests & treatments to boost your chances of parenthood</p>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-30">
               <div class="feature-container feature-bx3">
                  <div class="some-se-img">
                     <div class="img-dis">
                        <img src="{{asset('fronted/assets/aradhya/IVF-solutions.png')}}" alt="IVF Solutions" loading="lazy" decoding="async">
                     </div>
                  </div>
                  <div class="other-di">
                     <h5 class="ttr-title">IVF Solutions</h5>
                     <p>Safe and advanced IVF treatments designed for you with modern methods & personal care to help you start your family.</p>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-30">
               <div class="feature-container feature-bx3">
                  <div class="some-se-img">
                     <div class="img-dis">
                        <img src="{{asset('fronted/assets/aradhya/ovulation-care.png')}}" alt="Ovulation Care" loading="lazy" decoding="async">
                     </div>
                  </div>
                  <div class="other-di">
                     <h5 class="ttr-title">Ovulation Care</h5>
                     <p>Careful monitoring and treatment for healthy ovulation making the process easier to improve your chances of conceiving.</p>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </section>
   <section class="section-area section-sp1 work-area"
      style="background-image: url({{ asset('fronted/assets/images/background/line-bg1.png')}}); background-repeat: no-repeat; background-position: center; background-size: 100%;">
      <div class="container">
         <div class="heading-bx text-center">
            <!-- <h6 class="title-ext text-secondary">Working Process</h6> -->
            <h2 class="title">Achieve Parenthood With Confidence</h2>
         </div>
         <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6 mb-30">
               <div class="work-bx text-center">
                  <div class="work-num-bx">01</div>
                  <div class="work-content">
                     <h5 class="title text-secondary mb-10">IVF Treatments</h5>
                     <p>
                        Advanced solutions tailored to your fertility journey.
                     </p>
                  </div>
                  <!-- <a href="booking.html" class="btn btn-primary light">View More <i
										class="btn-icon-bx fas fa-chevron-right"></i></a> -->
               </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-30">
               <div class="work-bx text-center active ">
                  <div class="work-num-bx">02</div>
                  <div class="work-content">
                     <h5 class="title text-secondary mb-10">Ovulation Monitoring</h5>
                     <p>
                        Comprehensive care to track and enhance ovulation cycles.
                     </p>
                  </div>
                  <!-- <a href="services.html" class="btn btn-primary light">View More <i
										class="btn-icon-bx fas fa-chevron-right"></i></a> -->
               </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-30">
               <div class="work-bx text-center">
                  <div class="work-num-bx">03</div>
                  <div class="work-content">
                     <h5 class="title text-secondary mb-10">Minimally Invasive Procedures</h5>
                     <p>Effective treatments with minimal downtime.</p>
                  </div>
                  <!-- <a href="contact-us.html" class="btn btn-primary light">View More <i
										class="btn-icon-bx fas fa-chevron-right"></i></a> -->
               </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-30">
               <div class="work-bx text-center active">
                  <div class="work-num-bx">04</div>
                  <div class="work-content">
                     <h5 class="title text-secondary mb-10">Lifestyle Guidance</h5>
                     <p>Holistic support to optimize your reproductive health.</p>
                  </div>
                  <!-- <a href="contact-us.html" class="btn btn-primary light">View More <i
										class="btn-icon-bx fas fa-chevron-right"></i></a> -->
               </div>
            </div>
         </div>
      </div>
      <img class="pt-img1 animate1" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img3 animate3" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
   </section>
   <section class="section-area section-sp1 service-wraper">
      <div class="row align-items-center">
         <div class="col-xl-4 col-lg-7 mb-30">
            <div class="heading-bx">
               <!-- <h6 class="title-ext text-secondary">Services</h6> -->
               <h2 class="title">IVF & Fertility Treatment Process Explained</h2>
               <p>
                  With Dr. Aradhya Achuri, the IVF journey is transparent and guided step by step. We walk with you through every stage.
               </p>
            </div>
            <a href="{{ route('services') }}" class="btn btn-secondary btn-lg shadow">All Services</a>
         </div>
         <div class="col-xl-8 mb-15">
            <div class="swiper-container service-slide">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <div class="feature-container feature-bx2 feature1">
                        <div class="feature-box-xl mb-30">
                           <span class="icon-cell">
                              <svg enable-background="new 0 0 512 512" height="80"
                                 viewbox="0 0 512 512" width="80" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="m218.578 512c-29.085 0-52.748-23.656-52.748-52.734v-102.154c0-5.522 4.477-10 10-10s10 4.478 10 10v102.153c0 18.05 14.69 32.734 32.748 32.734s32.748-14.685 32.748-32.734v-116.18c0-20.084 16.343-36.423 36.432-36.423s36.432 16.339 36.432 36.423v59.66c0 24.042 19.567 43.602 43.619 43.602s43.619-19.56 43.619-43.602v-170.256c0-5.522 4.477-10 10-10s10 4.478 10 10v170.256c0 35.07-28.54 63.602-63.619 63.602s-63.619-28.531-63.619-63.602v-59.66c0-9.056-7.371-16.423-16.432-16.423s-16.432 7.367-16.432 16.423v116.181c0 29.078-23.663 52.734-52.748 52.734z"
                                    fill="#FA9189"></path>
                                 <ellipse cx="175.83" cy="336.898" fill="#FA9189" rx="30.275"
                                    ry="30.265"></ellipse>
                                 <path
                                    d="m317.745 103.718h-10.12v-78.989c0-5.522-4.477-10-10-10h-55.743v-4.729c0-5.522-4.477-10-10-10s-10 4.478-10 10v29.456c0 5.522 4.477 10 10 10s10-4.478 10-10v-4.728h45.743v68.989h-10.119c-5.523 0-10 4.478-10 10v47.531c0 50.532-41.126 91.644-91.677 91.644-50.55 0-91.676-41.111-91.676-91.644v-47.531c0-5.522-4.477-10-10-10h-10.119v-68.988h45.743v4.728c0 5.522 4.477 10 10 10s10-4.478 10-10v-29.457c0-5.522-4.477-10-10-10s-10 4.478-10 10v4.729h-55.743c-5.523 0-10 4.478-10 10v78.989h-10.119c-5.523 0-10 4.478-10 10v47.531c0 83.741 68.149 151.869 151.915 151.869s151.915-68.128 151.915-151.869v-47.531c0-5.523-4.477-10-10-10zm-10 57.531c0 72.713-59.177 131.869-131.915 131.869s-131.915-59.156-131.915-131.869v-37.531h20.238v37.531c0 61.561 50.098 111.644 111.676 111.644s111.677-50.083 111.677-111.644v-37.531h20.239z"
                                    fill="#FA9189"></path>
                                 <ellipse cx="421.426" cy="170.539" fill="#b2f0fb" rx="66.659"
                                    ry="66.637"></ellipse>
                                 <path
                                    d="m421.427 202.534c-17.646 0-32.001-14.353-32.001-31.995s14.356-31.994 32.001-31.994 32.001 14.353 32.001 31.994c0 17.643-14.356 31.995-32.001 31.995zm0-43.989c-6.618 0-12.001 5.381-12.001 11.994 0 6.614 5.384 11.995 12.001 11.995s12.001-5.381 12.001-11.995c0-6.613-5.384-11.994-12.001-11.994z"
                                    fill="#FA9189"></path>
                              </svg>
                           </span>
                        </div>
                        <div class="icon-content">
                           <h3 class="ttr-title">Choose Services</h3>
                           <p>
                              Explore our advanced fertility treatments tailored to meet your unique
                              needs.
                           </p>
                           <!-- <a href="service-detail.html" class="btn btn-primary light">View More</a> -->
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="feature-container feature-bx2 feature2">
                        <div class="feature-box-xl mb-20">
                           <span class="icon-cell">
                              <svg enable-background="new 0 0 512 512" height="80"
                                 viewbox="0 0 512 512" width="80" xmlns="http://www.w3.org/2000/svg">
                                 <g fill="#FA9189">
                                    <path
                                       d="m311.734 208.706h-25.074v-25.083c0-5.522-4.478-10-10-10h-41.32c-5.523 0-10 4.478-10 10v25.083h-25.074c-5.523 0-10 4.478-10 10v41.33c0 5.522 4.477 10 10 10h25.074v25.082c0 5.522 4.477 10 10 10h41.32c5.522 0 10-4.478 10-10v-25.082h25.074c5.522 0 10-4.478 10-10v-41.33c0-5.522-4.477-10-10-10zm-10 41.33h-25.074c-5.522 0-10 4.478-10 10v25.082h-21.32v-25.082c0-5.522-4.477-10-10-10h-25.074v-21.33h25.074c5.523 0 10-4.478 10-10v-25.083h21.32v25.083c0 5.522 4.478 10 10 10h25.074z">
                                    </path>
                                    <path
                                       d="m330.566 120.217v-51.05c0-5.522-4.478-10-10-10h-14.759v-49.167c0-5.522-4.478-10-10-10h-79.616c-5.523 0-10 4.478-10 10v49.167h-14.758c-5.523 0-10 4.478-10 10v51.049c-37.43 23.089-62.429 64.475-62.429 111.589v270.195c0 5.522 4.477 10 10 10h253.992c5.522 0 10-4.478 10-10v-270.194c0-47.115-24.999-88.501-62.43-111.589zm-104.374-100.217h19.808v2.559c0 5.522 4.477 10 10 10 5.522 0 10-4.478 10-10v-2.559h19.808v39.167h-59.616zm-24.759 59.167h109.133v30.965c-15.03-6.023-31.427-9.338-48.583-9.338h-11.967c-17.156 0-33.552 3.315-48.583 9.338zm171.563 412.833h-233.992v-260.194c0-61.212 49.8-111.012 111.012-111.012h11.967c61.213 0 111.013 49.8 111.013 111.012z">
                                    </path>
                                    <path d="m181.465 350.096h149.069v102.32h-149.069z"
                                       fill="#FA9189"></path>
                                 </g>
                              </svg>
                           </span>
                        </div>
                        <div class="icon-content">
                           <h3 class="ttr-title">Appointment</h3>
                           <p>
                              Schedule a consultation with Dr. Aradhya Achuri to begin your journey
                              toward parenthood.
                           </p>
                           <!-- <a href="service-detail.html" class="btn btn-primary light">View More</a> -->
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="feature-container feature-bx2 feature3">
                        <div class="feature-box-xl mb-20">
                           <span class="icon-cell">
                              <svg enable-background="new 0 0 512 512" height="80"
                                 viewbox="0 0 512 512" width="80" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="m318.39 278.299h-39.263v-39.262h-46.254v39.262h-39.263v46.255h39.263v39.263h46.254v-39.263h39.263z"
                                    fill="#FA9189"></path>
                                 <g fill="#FA9189">
                                    <path
                                       d="m256 164.444c-75.533 0-136.983 61.45-136.983 136.982s61.45 136.983 136.983 136.983 136.983-61.45 136.983-136.982-61.45-136.983-136.983-136.983zm0 253.965c-64.504 0-116.983-52.479-116.983-116.982s52.479-116.983 116.983-116.983 116.983 52.479 116.983 116.982-52.479 116.983-116.983 116.983z">
                                    </path>
                                    <path
                                       d="m470.541 112.15h-100.492v-50.962c0-20.205-16.429-36.643-36.623-36.643h-154.853c-20.194 0-36.623 16.438-36.623 36.643v50.963h-100.491c-22.86-.001-41.459 18.598-41.459 41.458v292.387c0 22.86 18.599 41.459 41.459 41.459h429.082c22.86 0 41.459-18.599 41.459-41.459v-292.387c0-22.86-18.599-41.459-41.459-41.459zm-34.541 20v36.68h-50.511v-36.68zm-274.049-70.962c0-9.177 7.457-16.643 16.623-16.643h154.854c9.166 0 16.623 7.466 16.623 16.643v50.963h-24.765v-32.806c0-5.522-4.477-10-10-10h-118.57c-5.523 0-10 4.478-10 10v32.806h-24.765zm44.765 50.962v-22.805h98.568v22.806h-98.568zm-80.205 20v36.68h-50.511v-36.68zm365.489 313.846c0 11.833-9.626 21.459-21.459 21.459h-429.082c-11.833 0-21.459-9.626-21.459-21.459v-292.387c0-11.833 9.626-21.459 21.459-21.459h14.541v46.68c0 5.522 4.477 10 10 10h70.511c5.523 0 10-4.478 10-10v-46.68h218.979v46.68c0 5.522 4.477 10 10 10h70.51c5.523 0 10-4.478 10-10v-46.68h14.541c11.833 0 21.459 9.626 21.459 21.459z">
                                    </path>
                                 </g>
                              </svg>
                           </span>
                        </div>
                        <div class="icon-content">
                           <h3 class="ttr-title">Get Treatment</h3>
                           <p>
                              Receive personalised, world-class fertility care to achieve your dreams
                              of a family.
                           </p>
                           <!-- <a href="service-detail.html" class="btn btn-primary light">View More</a> -->
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <img class="pt-img1 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/square-dots-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img3 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img4 animate1" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
   </section>
   @if (!empty($data['galleryList']) && $data['galleryList']->count() > 0)
   <section class="section-area section-sp1 gallery-area"
      style="background-image: url({{ asset('fronted/assets/images/background/line-bg2.png')}}); background-position: center; background-size: cover;">
      <div class="container">
         <div class="heading-bx text-center">
            <h6 class="title-ext text-secondary">Miracles Happen Here</h6>
            <h2 class="title">Fertility Expert & Happy Babies</h2>
         </div>
         <div class="swiper-container dr-gallery">
            <div class="swiper-wrapper popup-gallery">
               @foreach ($data['galleryList'] as $gallery)
               <div class="swiper-slide">
                  <div class="gallery-item">
                     <div class="gallery-img">
                        <img
                           src="{{ url('/images/gallery/' . $gallery->image . '?w=400&h=300&q=75') }}"
                           srcset="{{ url('/images/gallery/' . $gallery->image . '?w=200&h=150&q=75') }} 200w,
                           {{ url('/images/gallery/' . $gallery->image . '?w=400&h=300&q=75') }} 400w,
                           {{ url('/images/gallery/' . $gallery->image . '?w=800&h=600&q=75') }} 800w"
                           sizes="(max-width: 576px) 100vw, 
                           (max-width: 768px) 50vw, 
                           400px"
                           width="400"
                           height="300"
                           alt="{{ $gallery->title }}"
                           loading="lazy"
                           decoding="async">
                     </div>
                     <div class="gallery-content magnific-image">
                        <a class="popup-img gallery-link" href="{{ asset('upload/gallery/' . $gallery->image) }}">
                           <i class="fas fa-plus"></i>
                        </a>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
            <div class="gallery-next-prev">
               <div class="swiper-button-prev test-btn-prev">

               </div>
               <div class="swiper-button-next test-btn-next">

               </div>
            </div>
         </div>
      </div>
   </section>
   @endif
   <section class="section-area account-wraper1">
      <div class="container-fluid">
         <div class="appointment-inner section-sp2"
            style="background-image: url({{ asset('fronted/assets/images/appointment/line-bg.png')}}); background-repeat: no-repeat; background-position: 20px 140px;">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-5 col-lg-6 col-md-6">
                     <div class="appointment-form form-wraper">
                        <h3 class="title">Book An Appointment with<br>Dr. Aradhya Achuri</h3>
                        @include('frontend.layouts.enquiry-form')
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-6 col-md-6">
                     <div class="appointment-thumb">
                        <img src="{{asset('fronted/assets/images/appointment/mobile.png')}}" alt="mobile" loading="lazy" decoding="async">
                        <div class="images-group">
                           <img class="img1" src="{{asset('fronted/assets/images/appointment/women.png')}}" alt="women" loading="lazy" decoding="async">
                           <img class="img2" src="{{asset('fronted/assets/images/appointment/map-pin.png')}}" alt="mappin" loading="lazy" decoding="async">
                           <img class="img3" src="{{asset('fronted/assets/images/appointment/setting.png')}}" alt="setting" loading="lazy" decoding="async">
                           <img class="img4" src="{{asset('fronted/assets/images/appointment/check.png')}}" alt="check" loading="lazy" decoding="async">
                           <img class="img5" src="{{asset('fronted/assets/images/appointment/chat.png')}}" alt="chat" loading="lazy" decoding="async">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <img class="pt-img1 animate1" src="{{asset('fronted/assets/aradhya/shap/trangle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img2 animate-wave" src="{{asset('fronted/assets/aradhya/shap/wave-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img3 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png'
            )}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img4 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
         </div>
      </div>
   </section>
   @if (!empty($data['testimonials']) && $data['testimonials']->count() > 0)
   <section class="section-area section-sp3 testimonial-wraper">
      <div class="container">
         <div class="heading-bx text-center">
            <h6 class="title-ext text-secondary">Testimonials</h6>
            <h2 class="title m-b0">What our Patients say about us</h2>
         </div>
         <div class="row align-items-center">
            <div class="col-lg-12">
               <div class="swiper-container testimonial-slide">
                  <div class="swiper-wrapper">
                     @foreach($data['testimonials'] as $testimonial)
                     <div class="swiper-slide" data-rel="{{ $testimonial->id }}">
                        <div class="testimonial-bx">
                           <div class="testimonial-content">
                              <p>
                                 {{ \Illuminate\Support\Str::limit(strip_tags($testimonial->content), 180) }}
                              </p>
                           </div>
                           <div class="read_more_test">
                              <a href="javascript: void(0);"
                                 class="btn btn-secondary btn-sm"
                                 data-ajax-testimonials-popup="true"
                                 data-size="lg"
                                 data-title="{{ $testimonial->title }}"
                                 data-url="{{ route('ajax.testimonial', $testimonial->id) }}"
                                 data-bs-toggle="tooltip">Read More</a>
                           </div>
                           <div class="client-info">
                              <h5 class="name">{{ $testimonial->title }}</h5>
                           </div>
                           <div class="quote-icon">
                              <i class="fas fa-quote-left"></i>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <div class="testimonials-nxt-pre">
                     <div class="swiper-button-prev test-btn-prev"><i class="las la-arrow-left"></i>
                     </div>
                     <div class="swiper-button-next test-btn-next"><i class="las la-arrow-right"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <img class="pt-img1 animate1" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img3 animate3" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img4 animate4" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
   </section>
   @endif
   @if (!empty($data['blog']) && $data['blog']->count() > 0)
   <section class="section-area section-sp1 blog-area"
      style="background-image: url({{ asset('fronted/assets/images/background/line-bg2.png')}}); background-position: center; background-size: cover;">
      <div class="container">
         <div class="heading-bx text-center">

            <h2 class="title">Latest Articles about IVF, Parenthood & Fertility</h2>
            <p>
               Stay informed with the latest fertility trends, treatment insights, and expert advice.
               Explore our comprehensive articles on IVF, ovulation monitoring, and reproductive health,
               all designed to support your fertility journey.
            </p>
         </div>
         <div class="row">
            @foreach ($data['blog'] as $blog)
            <div class="col-xl-4 col-md-6 mb-20">
               <div class="blog-card h-100">
                  <a href="{{ route('blog.details', $blog->slug) }}">
                     <div class="post-media image-file">
                        <div class="blog-hom-img">
                           @php
                              $imageUrl = '/images/blog/' . $blog->featured_image;
                              $breakpoints = [200, 400, 800];
                              $aspectRatio = 250 / 400;
                           @endphp
                           <img 
                              src="{{ url($imageUrl . '?w=' . $breakpoints[1] . '&q=75') }}"
                              srcset="@foreach($breakpoints as $width) {{ url($imageUrl . '?w=' . $width . '&q=75') }} {{ $width }}w{{ !$loop->last ? ',' : '' }} @endforeach"
                              sizes="100vw"
                              style="aspect-ratio: {{ $aspectRatio }};"
                              alt="{{ $blog->title }}"
                              loading="lazy"
                              decoding="async"
                           >
                        </div>
                     </div>
                     <div class="post-info">
                        <h5 class="post-title">
                           <div class="blog-hom-title">
                              {{ $blog->title }}
                           </div>
                        </h5>
                        <div class="btn btn-outline-primary btn-sm">
                           Read More
                           <i class="btn-icon-bx fas fa-chevron-right"></i>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
            @endforeach
         </div>
      </div>
      <img class="pt-img1 animate1" src="{{asset('fronted/assets/aradhya/shap/trangle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/square-dots-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
      <img class="pt-img4 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
   </section>
   @endif
</div>
@endsection
@push('scripts')
@endpush