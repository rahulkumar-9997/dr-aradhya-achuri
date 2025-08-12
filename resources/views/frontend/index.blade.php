@extends('frontend.layouts.master')
@section('title','Dr. Aradhya Achuri')
@section('description', 'Fertility Specialist')
@section('main-content')
<div class="page-content bg-white">
   <div class="main-banner"
      style="background-image: linear-gradient(rgba(205, 95, 55, 0.1), rgba(205, 95, 55, 0.1)), url({{ asset('fronted/assets/images/main-banner/bg1.jpg') }});">
      <div class="container inner-content">
         <div class="row align-items-center mb-50">
            <div class="col-lg-7 col-md-6 col-sm-7">
               <h6 class="title-ext banner-main-t">We Provide Personalized Fertility Solutions</h6>
               <div class="mb-50">
                  <h1 class="banner-1-title">
                     Plan better, dream closer. We're with you every step—turning hope into reality.
                     <!-- Fertility 
									<span>
										<img class="d-none d-sm-block" src="assets/aradhya/banner-5-img-4.png" alt="">
									</span>
									Care -->
                  </h1>
                  <p>
                     The better you plan, the closer you are to your dream of parenthood. We’ll guide you
                     every step of the way, turning hope into reality.
                  </p>
                  <a href="about-us.html" class="btn btn-secondary btn-lg shadow">Read More</a>
               </div>

            </div>
            <div class="col-lg-5 col-md-6 col-sm-5">
               <div class="banner-img">
                  <img src="{{asset('fronted/assets/aradhya/doctor-bg.png')}}" alt="doctor">
               </div>
            </div>
         </div>
      </div>
   </div>
   <section class="section-sp1 about-area">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-lg-6 mb-30">
               <div class="about-thumb-area">
                  <ul>
                     <li><img class="about-thumb1" src="{{asset('fronted/assets/aradhya/about-241x241.jpg')}}" alt=""></li>
                     <li><img class="about-thumb2" src="{{asset('fronted/assets/aradhya/about-299x299.jpg')}}" alt=""></li>
                     <li><img class="about-thumb3" src="{{asset('fronted/assets/aradhya/about-185x185.jpg')}}" alt=""></li>
                     <li>
                        <div class="exp-bx">10 <span>Year Experience</span></div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-6 mb-30">
               <div class="heading-bx">
                  <!-- <h6 class="title-ext text-secondary">About Us</h6> -->
                  <h2 class="title">Our Goal Is To Empower Parenthood</h2>
                  <p>
                     At Dr. Aradhya Achuri’s Fertility Clinic, we are dedicated to offering advanced
                     reproductive solutions and compassionate care. Our mission is to make parenthood a
                     reality for every hopeful individual or couple. With state-of-the-art treatments and
                     personalized support, we help you navigate the journey to parenthood with
                     confidence.
                  </p>
               </div>
               <div class="row">
                  <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
                     <div class="feature-container feature-bx1 feature1">
                        <div class="icon-md">
                           <span class="icon-cell">
                              <svg enable-background="new 0 0 512 512" height="85"
                                 viewbox="0 0 512 512" width="85" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="m509.82 327.343-21.991-27.599c-1.896-2.381-4.775-3.768-7.82-3.768h-7.712l-74.353-93.385c-1.897-2.383-4.777-3.771-7.823-3.771h-22.862v-22.765c0-19.014-15.43-34.483-34.396-34.483h-97.678v-4.552c0-28.428-23.127-51.555-51.555-51.555s-51.555 23.127-51.555 51.555v4.552h-97.678c-18.966 0-34.397 15.47-34.397 34.484v251.241c0 5.523 4.478 10 10 10h22.279c4.628 22.794 24.758 39.999 48.815 39.999s44.186-17.205 48.814-39.999h250.37c4.628 22.794 24.757 39.999 48.814 39.999s44.187-17.205 48.815-39.999h24.093c5.522 0 10-4.477 10-10v-93.722c0-2.264-.769-4.461-2.18-6.232zm-124.52-108.523 61.432 77.156h-79.474v-77.156zm-233.226-81.799c0-17.399 14.155-31.555 31.555-31.555s31.555 14.156 31.555 31.555v4.552h-63.109v-4.552zm-132.074 39.035c0-7.986 6.459-14.483 14.397-14.483h298.464c7.938 0 14.396 6.497 14.396 14.483v241.241h-217.35c-4.628-22.794-24.757-39.999-48.814-39.999s-44.187 17.205-48.815 39.999h-12.278zm61.094 281.24c-16.44 0-29.816-13.458-29.816-29.999s13.376-29.999 29.816-29.999 29.815 13.458 29.815 29.999-13.375 29.999-29.815 29.999zm347.998 0c-16.44 0-29.815-13.458-29.815-29.999s13.375-29.999 29.815-29.999 29.816 13.458 29.816 29.999-13.376 29.999-29.816 29.999zm62.908-39.999h-14.093c-4.628-22.794-24.758-39.999-48.815-39.999s-44.186 17.205-48.814 39.999h-13.02v-101.321h107.932l16.81 21.096z">
                                 </path>
                                 <path
                                    d="m183.629 66.808c5.522 0 10-4.477 10-10v-12.104c0-5.523-4.478-10-10-10s-10 4.477-10 10v12.104c0 5.523 4.477 10 10 10z">
                                 </path>
                                 <path
                                    d="m236.764 94.969c1.934 1.829 4.404 2.736 6.871 2.736 2.652 0 5.299-1.048 7.266-3.127l10.626-11.229c3.796-4.011 3.621-10.341-.391-14.137s-10.341-3.621-14.137.391l-10.626 11.229c-3.796 4.012-3.621 10.341.391 14.137z">
                                 </path>
                                 <path
                                    d="m116.358 94.579c1.967 2.078 4.613 3.126 7.266 3.126 2.467 0 4.938-.907 6.871-2.737 4.012-3.796 4.187-10.125.391-14.137l-10.627-11.229c-3.796-4.011-10.126-4.187-14.137-.39-4.012 3.796-4.187 10.125-.391 14.137z">
                                 </path>
                                 <path d="m90.896 216.592h184.372v113.287h-184.372z" fill="#b2f0fb">
                                 </path>
                              </svg>
                           </span>
                        </div>
                        <div class="icon-content">
                           <h4 class="ttr-title">Emergency Help</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
                     <div class="feature-container feature-bx1 feature2">
                        <div class="icon-md">
                           <span class="icon-cell">
                              <svg enable-background="new 0 0 512 512" height="85"
                                 viewbox="0 0 512 512" width="85" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="m351.524 124.49h-37.907v-37.907h-44.657v37.907h-37.906v44.657h37.906v37.907h44.657v-37.907h37.907z"
                                    fill="#a4fcc4"></path>
                                 <path
                                    d="m291.289 279.415c73.114 0 132.597-59.482 132.597-132.597s-59.483-132.596-132.597-132.596-132.598 59.482-132.598 132.596 59.484 132.597 132.598 132.597zm0-245.193c62.086 0 112.597 50.511 112.597 112.597s-50.511 112.597-112.597 112.597c-62.087 0-112.598-50.511-112.598-112.597s50.511-112.597 112.598-112.597z">
                                 </path>
                                 <path
                                    d="m502 267.736c-32.668 0-59.245 26.577-59.245 59.245v13.605h-240.266v-19.048c0-23.625-19.221-42.846-42.846-42.846h-90.398v-17.584c0-32.668-26.577-59.245-59.245-59.245-5.522 0-10 4.478-10 10v275.914c0 5.522 4.478 10 10 10h49.245c5.522 0 10-4.478 10-10v-39.327h373.51v39.327c0 5.522 4.478 10 10 10h49.245c5.522 0 10-4.478 10-10v-210.041c0-5.522-4.478-10-10-10zm-342.356 30.957c12.598 0 22.846 10.249 22.846 22.846v19.048h-113.245v-41.894zm-110.399 179.085h-29.245v-254.623c16.812 4.434 29.245 19.77 29.245 37.954zm20-49.327v-67.864h373.51v67.864zm422.755 49.327h-29.245v-150.797c0-18.185 12.434-33.521 29.245-37.954z">
                                 </path>
                              </svg>
                           </span>
                        </div>
                        <div class="icon-content">
                           <h4 class="ttr-title">Qualified Doctors</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
                     <div class="feature-container feature-bx1 feature3">
                        <div class="icon-md">
                           <span class="icon-cell">
                              <svg enable-background="new 0 0 512 512" height="85"
                                 viewbox="0 0 512 512" width="85" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="m397.886 191.161c-3.545-4.235-9.852-4.797-14.087-1.252-4.235 3.544-4.797 9.851-1.253 14.086 26.684 31.893 41.165 72.339 40.775 113.888-.886 94.681-79.215 172.782-174.608 174.1-48.125.666-93.326-17.479-127.401-51.087-33.708-33.246-52.272-77.526-52.272-124.685 0-59.98 30.361-115.236 81.216-147.809 51.27-32.838 79.187-66.186 93.348-111.507l2.581-8.26 2.58 8.257c9.333 29.869 25.53 55.364 49.516 77.939 4.02 3.786 10.35 3.593 14.136-.428 3.785-4.021 3.594-10.351-.429-14.136-21.713-20.438-35.736-42.471-44.133-69.341l-12.125-38.802c-1.305-4.175-5.171-7.018-9.545-7.018s-8.24 2.843-9.545 7.018l-12.126 38.807c-12.639 40.45-38.072 70.545-85.045 100.63-56.624 36.268-90.429 97.819-90.429 164.65 0 52.553 20.679 101.891 58.228 138.924 37.248 36.736 86.47 56.867 138.888 56.865.941 0 1.891-.006 2.833-.02 51.527-.712 100.087-21.236 136.733-57.792 36.664-36.573 57.12-84.914 57.6-136.118.432-46.301-15.704-91.371-45.436-126.909z">
                                 </path>
                                 <path
                                    d="m279.576 280.012v-29.712c0-5.523-4.478-10-10-10h-46.783c-5.522 0-10 4.477-10 10v29.712h-29.711c-5.522 0-10 4.477-10 10v46.783c0 5.523 4.478 10 10 10h29.711v29.711c0 5.523 4.478 10 10 10h46.783c5.522 0 10-4.477 10-10v-29.711h29.712c5.522 0 10-4.477 10-10v-46.783c0-5.523-4.478-10-10-10zm19.712 46.783h-29.712c-5.522 0-10 4.477-10 10v29.711h-26.783v-29.711c0-5.523-4.478-10-10-10h-29.711v-26.783h29.711c5.522 0 10-4.477 10-10v-29.712h26.783v29.712c0 5.523 4.478 10 10 10h29.712z">
                                 </path>
                                 <path
                                    d="m369.497 246.666c51.239-.708 92.983-42.352 93.459-93.223.313-33.486-16.989-62.983-43.266-79.911-21.598-13.914-37.772-29.46-45.4-53.873l-6.143-19.659-6.143 19.661c-7.603 24.331-23.627 39.927-45.19 53.738-26.16 16.756-43.48 45.945-43.48 79.151 0 52.43 43.18 94.848 96.163 94.116z"
                                    fill="#ffbdbc"></path>
                              </svg>
                           </span>
                        </div>
                        <div class="icon-content">
                           <h4 class="ttr-title">Best Professionals</h4>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
                     <div class="feature-container feature-bx1 feature4">
                        <div class="icon-md">
                           <span class="icon-cell">
                              <svg enable-background="new 0 0 512 512" height="85"
                                 viewbox="0 0 512 512" width="85" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="m181.049 229.112-76.87 76.971c-14.045 14.07-14.045 36.883 0 50.953l50.881 50.974c14.045 14.07 36.815 14.07 50.86 0l178.611-178.899h-203.482z"
                                    fill="#e2c4ff"></path>
                                 <path
                                    d="m495.277 81.339c-10.57-10.578-24.625-16.403-39.574-16.403-3.325 0-6.605.288-9.813.853 3.065-17.397-2.103-35.975-15.505-49.387-10.57-10.577-24.624-16.402-39.574-16.402s-29.003 5.825-39.573 16.402c-21.816 21.83-21.816 57.352 0 79.182 2.71 2.712 5.648 5.111 8.772 7.18l-18.689 18.716-52.105-52.184c-3.902-3.907-10.233-3.912-14.142-.012-3.908 3.902-3.914 10.234-.011 14.143l18.64 18.67-196.602 196.922c-17.56 17.593-17.902 46.002-1.029 64.017l-16.422 16.452c-3.896 3.903-3.896 10.226 0 14.129l12.383 12.406-88.75 88.913c-3.901 3.909-3.896 10.24.013 14.142 1.953 1.948 4.509 2.922 7.065 2.922 2.562 0 5.125-.979 7.078-2.936l88.724-88.887 12.357 12.38c1.876 1.88 4.422 2.936 7.078 2.936s5.202-1.056 7.078-2.936l16.396-16.426c8.547 8.028 19.644 12.432 31.418 12.432 12.28 0 23.825-4.79 32.506-13.487l196.588-196.91 18.617 18.648c1.953 1.956 4.515 2.935 7.077 2.935 2.557 0 5.113-.975 7.065-2.923 3.908-3.902 3.914-10.234.011-14.143l-52.155-52.24 18.732-18.758c2.054 3.126 4.453 6.09 7.198 8.836 10.57 10.577 24.624 16.402 39.573 16.402s29.003-5.825 39.574-16.402c21.817-21.831 21.817-57.352.001-79.182zm-129.892-50.8c6.792-6.796 15.822-10.539 25.426-10.539s18.635 3.743 25.427 10.539c13.407 13.416 13.997 34.875 1.773 49.001-.638.583-1.266 1.183-1.881 1.799-.616.617-1.214 1.245-1.795 1.882-6.533 5.671-14.791 8.766-23.524 8.766-9.604 0-18.634-3.743-25.427-10.54-14.025-14.035-14.025-36.873.001-50.908zm-239.787 380.799-24.74-24.786 9.327-9.344 14.287 14.313 10.454 10.473zm73.244-10.392c-4.903 4.912-11.42 7.617-18.352 7.617s-13.449-2.705-18.353-7.617l-50.881-50.975c-10.134-10.152-10.134-26.672-.001-36.823l196.578-196.898 87.616 87.767zm177.227-244.657-20.619-20.654 24.634-24.669c3.498.676 7.086 1.021 10.727 1.021 3.325 0 6.606-.288 9.813-.853-1.189 6.75-1.139 13.678.151 20.413zm105.062-9.905c-6.792 6.796-15.823 10.539-25.427 10.539s-18.635-3.743-25.427-10.539c-13.407-13.416-13.998-34.875-1.773-49.001.638-.583 1.266-1.183 1.881-1.799.617-.617 1.215-1.246 1.797-1.884 6.532-5.67 14.789-8.764 23.521-8.764 9.604 0 18.635 3.743 25.427 10.54 14.026 14.035 14.026 36.873.001 50.908z"
                                    fill="#020288"></path>
                              </svg>
                           </span>
                        </div>
                        <div class="icon-content">
                           <h4 class="ttr-title">Medical Treatment</h4>
                        </div>
                     </div>
                  </div>
               </div>
               <a href="about-us.html" class="btn btn-primary shadow">Learn More About Us</a>
            </div>
         </div>
      </div>
      <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
      <img class="pt-img5 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
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
                        <img src="{{asset('fronted/assets/aradhya/fertility-care.png')}}" alt="Fertility Care">
                     </div>
                  </div>
                  <div class="other-di">
                     <h5 class="ttr-title">Fertility Care</h5>
                     <p>Etiam ante ante, molestie vitae cursus ac, pharetra euismod libero.</p>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-30">
               <div class="feature-container feature-bx3">
                  <div class="some-se-img">
                     <div class="img-dis">
                        <img src="{{asset('fronted/assets/aradhya/IVF-solutions.png')}}" alt="IVF Solutions">
                     </div>
                  </div>
                  <div class="other-di">
                     <h5 class="ttr-title">IVF Solutions</h5>
                     <p>Etiam ante ante, molestie vitae cursus ac, pharetra euismod libero.</p>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-30">
               <div class="feature-container feature-bx3">
                  <div class="some-se-img">
                     <div class="img-dis">
                        <img src="{{asset('fronted/assets/aradhya/ovulation-care.png')}}" alt="Ovulation Care">
                     </div>
                  </div>
                  <div class="other-di">
                     <h5 class="ttr-title">Ovulation Care</h5>
                     <p>Etiam ante ante, molestie vitae cursus ac, pharetra euismod libero.</p>
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
      <img class="pt-img1 animate1" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="">
      <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
      <img class="pt-img3 animate3" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="">
   </section>
   <section class="section-area section-sp1 service-wraper">
      <div class="row align-items-center">
         <div class="col-xl-4 col-lg-7 mb-30">
            <div class="heading-bx">
               <!-- <h6 class="title-ext text-secondary">Services</h6> -->
               <h2 class="title">We Offer a Wide Range of Trusted Medical Care</h2>
               <p>
                  From choosing the right services to receiving world-class treatment, we’re with you every step of the way.
               </p>
            </div>
            <a href="services.html" class="btn btn-secondary btn-lg shadow">All Services</a>
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
      <img class="pt-img1 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
      <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/square-dots-orange.png')}}" alt="">
      <img class="pt-img3 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
      <img class="pt-img4 animate1" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
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
                           <img src="{{ asset('upload/gallery/' . $gallery->image) }}" alt="{{ $gallery->title }}">
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
                        <h3 class="title">Book An Appointment From Our Doctor</h3>
                        @include('frontend.layouts.enquiry-form')
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-6 col-md-6">
                     <div class="appointment-thumb">
                        <img src="{{asset('fronted/assets/images/appointment/mobile.png')}}" alt="">
                        <div class="images-group">
                           <img class="img1" src="{{asset('fronted/assets/images/appointment/women.png')}}" alt="">
                           <img class="img2" src="{{asset('fronted/assets/images/appointment/map-pin.png')}}" alt="">
                           <img class="img3" src="{{asset('fronted/assets/images/appointment/setting.png')}}" alt="">
                           <img class="img4" src="{{asset('fronted/assets/images/appointment/check.png')}}" alt="">
                           <img class="img5" src="{{asset('fronted/assets/images/appointment/chat.png')}}" alt="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <img class="pt-img1 animate1" src="{{asset('fronted/assets/aradhya/shap/trangle-orange.png')}}" alt="">
            <img class="pt-img2 animate-wave" src="{{asset('fronted/assets/aradhya/shap/wave-orange.png')}}" alt="">
            <img class="pt-img3 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png'
            )}}" alt="">
            <img class="pt-img4 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="">
         </div>
      </div>
   </section>
   @if (!empty($data['testimonials']) && $data['testimonials']->count() > 0)
   <section class="section-area section-sp3 testimonial-wraper">
      <div class="container">
         <div class="heading-bx text-center">
            <h6 class="title-ext text-secondary">Testimonial</h6>
            <h2 class="title m-b0">See What Are The Patients <br>Saying About us</h2>
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
                              data-bs-toggle="tooltip"
                              >Read More</a>
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
      <img class="pt-img1 animate1" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
      <img class="pt-img3 animate3" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
      <img class="pt-img4 animate4" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="">
   </section>
   @endif
   @if (!empty($data['blog']) && $data['blog']->count() > 0)
      <section class="section-area section-sp1 blog-area"
         style="background-image: url({{ asset('fronted/assets/images/background/line-bg2.png')}}); background-position: center; background-size: cover;">
         <div class="container">
            <div class="heading-bx text-center">
               <h6 class="title-ext text-secondary">Blos & Articles</h6>
               <h2 class="title">Latest Blog Articles</h2>
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
                        <div class="post-media image-file">
                           <a href="{{ route('blog.details', $blog->slug) }}">
                              <img src="{{ asset('upload/blog/' . $blog->featured_image) }}" alt="{{ $blog->title }}">
                           </a>
                        </div>
                        <div class="post-info">
                           
                           <h5 class="post-title">
                              <a href="{{ route('blog.details', $blog->slug) }}">
                                 {{ $blog->title }}
                              </a>
                           </h5>
                           <a href="{{ route('blog.details', $blog->slug) }}" class="btn btn-outline-primary btn-sm">
                              Read More
                              <i class="btn-icon-bx fas fa-chevron-right"></i>
                           </a>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
         <img class="pt-img1 animate1" src="{{asset('fronted/assets/aradhya/shap/trangle-orange.png')}}" alt="">
         <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/square-dots-orange.png')}}" alt="">
         <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
         <img class="pt-img4 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
      </section>
   @endif
</div>
@endsection
@push('scripts')
@endpush