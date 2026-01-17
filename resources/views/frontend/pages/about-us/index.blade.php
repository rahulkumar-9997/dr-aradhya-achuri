@php
   $metaDesc ="Learn about Dr. Aradhya Achuri, a trusted fertility doctor in Hyderabad offering expert IVF care, compassionate support & 14+ years of experience";
   $meta_description = Illuminate\Support\Str::limit(strip_tags($metaDesc), 160);
   $metaTitle = Str::limit('About Dr. Aradhya Achuri | Fertility Specialist Hyderabad', 57);
@endphp

@extends('frontend.layouts.master')
@section('title', $metaTitle)
@section('description', $meta_description)
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>About Dr. Aradhya Achuri</h1>
                    <!-- <h6>Some content here</h6> -->
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        </div>
    </div>
    <section class="section-sp1 about-area about-page-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-30">
                    <div class="about-thumb-area-section">
                        <div class="about-innter-img">
                            <img src="{{asset('fronted/assets/aradhya/about-inner.png')}}" alt="about" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-30 order-1-inmobile">
                    <div class="heading-bx">
                        <h2 class="title">
                            Our Mission is to Empower Parenthood
                        </h2>
                        <p>
                            Our priority is to help you achieve your dreams of parenthood with compassionate care and effective solutions. Led by Dr. Aradhya Achuri , a distinguished infertility specialist, we are committed to delivering exceptional medical expertise and personalized treatment. With a patient-first approach, we combine advanced reproductive technologies and genuine empathy to make your journey to parenthood as smooth and successful as possible.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
                            <div class="feature-container feature-bx1 feature1 ab-page-feature">
                                <div class="icon-content">
                                    <h4 class="ttr-title">
                                        Trusted specialist with global training in fertility care
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
                            <div class="feature-container feature-bx1 feature2 ab-page-feature">
                                <div class="icon-content">
                                    <h4 class="ttr-title">
                                        Proven expertise in IVF, Hysteroscopy, Laparoscopy & Endometriosis

                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
                            <div class="feature-container feature-bx1 feature3 ab-page-feature">
                                <div class="icon-content">
                                    <h4 class="ttr-title">
                                        Personalized solutions for even the most complex cases

                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 mb-30 mb-sm-20">
                            <div class="feature-container feature-bx1 feature4 ab-page-feature">
                                <div class="icon-content">
                                    <h4 class="ttr-title">
                                        Helping families grow with skill, care, and dedication
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('contact-us') }}" class="btn btn-primary shadow">Contact us</a>
                </div>
            </div>
        </div>
        <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        <img class="pt-img5 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
    </section>
    <section class="growth-history-section">
        <div class="container">
            <div class="heading-bx text-center">
                <h6 class="title-ext text-secondary">Dr. Aradhya Achuri Profile</h6>
            </div>
        </div>
    </section>
    <section class="section-sp1 service-wraper2 qualification-section">
        <div class="container">
            <div class="heading-bx text-center">
                <h2 class="title">Qualification</h2>
                
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5 d-md-flex align-self-center order-xl-0 order-lg-0 order-md-0 order-2 qualification-img">
                    <div class="form-left-con core-vaule-left-con position-relative text-center margin-right">
                        <figure class="mb-0 inner-img-be">
                            <img src="{{asset('fronted/assets/aradhya/dr.aradhya-achuri.jpg')}}" alt="form-left-img" class="mb-0 img-fluid inner-img" loading="lazy" decoding="async">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="core-vaule-right-con">
                        <div class="row ng-star-inserted">
                            <div class="col-lg-12">
                                <div class="main-quali-title">
                                    <h6 class="growth-title">
                                        I believe that my diverse educational qualifications and training equip me to deliver the latest and proven evidence-based therapies to my patient base. A summary of my academic credentials is given below:
                                    </h6>
                                </div>
                            </div>
							<div class="col-lg-6">
                                <div class="media-col mt-6 ng-star-inserted">
                                    <img alt="correct tick" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                       <p>										
                                            Certification Course in Aesthetic Gynecology , Mumbai
										</p>
                                    </div>
                                </div>
                                <div class="media-col mt-6 ng-star-inserted">
                                    <img alt="correct tick" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                       <p>
										Diploma in Reproductive Medicine, Germany (Kiel School of Reproductive Medicine)
										</p>
                                    </div>
                                </div>
								<div class="media-col mt-3 ng-star-inserted">
                                    <img alt="correct" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Fellowship in Minimal Access Surgery (FMAS)
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="correct" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Fellowship in Assisted Reproductive Technology, International Association Of Assisted Reproductive Technology
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="correct" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            ICOG Certification Course in Reproductive Medicine, Chennai
                                        </p>
                                    </div>
                                </div>
							</div>
							<div class="col-lg-6">
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Traditional Indian Food" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Senior Resident - Sri Venkateshwara Medical College, Tirupati, AP
                                        </p>
                                    </div>
                                </div>
                            
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Multiple Source Materials" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            MS OBG –Prathima Institute of Medical Sciences, Telangana
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Satisfied Customer" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Internship - Gandhi Government Hospital, Telangana
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Careful While Travelling" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            MBBS –Kamineni Institute of Medical Sciences, Telangana
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                            <!--second-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="section-sp1 my-expertise-section other-pages">
        <div class="container">
            <div class="heading-bx text-center">
                <h2 class="title">Fields of Expertise</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="core-vaule-right-con">
                        <div class="row ng-star-inserted">
                            <div class="col-lg-12">
                                <div class="main-quali-title">
                                    <h6 class="growth-title">
                                        Proficient in dealing with all aspects of:
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-6 exclDealPoints">
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async" alt="correct">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Reproductive Endocrinology including infertility work-up and treatment
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async" alt="correct">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Ultrasonography (2D/3D)
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Ovulation Induction
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Intrauterine Insemination
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            IVF
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="corret" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Mild stimulation protocols
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <!--second-->
                            <div class="col-md-6 exclDealPoints">
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Transvaginal Oocyte Retrieval
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Transabdominal Oocyte Retrieval
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Embryo Transfer
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Diagnostic Laparoscopy
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Diagnostic Hysteroscopy
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Operative Hysteroscopy
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img  class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" alt="correct" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Ectopic Pregnancy Medical and surgical management
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--second-->
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 col-md-5 d-md-flex align-self-center order-xl-0 order-lg-0 order-md-0 order-2">
                    <div class="form-left-con core-vaule-left-con position-relative text-center margin-left">
                        <figure class="mb-0 inner-img-be">
                            <img src="{{asset('fronted/assets/aradhya/my-expertise.jpg')}}" alt="My Expertise" class="mb-0 img-fluid inner-img" loading="lazy" decoding="async">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        <img class="pt-img5 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
    </section>
    <section class="section-sp1 service-wraper2 research-and-pub-section">
        <div class="container">
            <div class="heading-bx text-center">
                <h2 class="title">Research & Publications</h2>
            </div>
            <div class="row align-items-center">
                <!--div class="col-lg-5 col-md-5 d-md-flex align-self-center order-xl-0 order-lg-0 order-md-0 order-2">
                    <div class="form-left-con core-vaule-left-con position-relative text-center margin-right">
                        <figure class="mb-0 inner-img-be">
                            <img src="{{asset('fronted/assets/aradhya/about.jpg')}}" alt="Research & Publications" class="mb-0 img-fluid inner-img">
                        </figure>
                    </div>
                </div-->
                <div class="col-lg-12 col-md-12">
                    <div class="core-vaule-right-con">
                        <div class="row ng-star-inserted">
                            
                            <div class="col-md-6 exclDealPoints">
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Professional Understanding" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
											Adnexal pathology in adolescents in APCOG 2013
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="24/7 Help" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            A rare case of cervical ectopic pregnancy in RCOG international conference 2014
                                        </p>
                                    </div>
                                </div>
                                
								<div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Traditional Indian Food" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            A Rare Case of Herniation of Gravid Uterus – Annals of Woman and Child Health, AWCH; 1(1): 2015
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                            <!--second-->
                            <div class="col-md-6 exclDealPoints">
								<div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Feel Connected with India" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            A rare case of herniation of gravid uterus – AICOG 2017
                                        </p>
                                    </div>
                                </div>
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Multiple Source Materials" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            FSH receptor polymorphism in an unexpected Poor responder – A Case Report – ISAR 2020
                                        </p>
                                    </div>
                                </div>
							
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Satisfied Customer" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Improvement of reproductive outcome in hypo-responders using genomics evidence based controlled ovarian stimulation (COS) − Demonstration through case presentations, Fertil Sci Res 2023;10:145-50.
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <!--second-->
                            <div class="col-md-12 exclDealPoints">
								<div class="main-quali-title" style='padding:16px 18px;margin:12px 0 8px 0 ' >
                                    <h5 class="growth-title" style='text-align:center;font-size:20px' >
                                        As a panelist &amp; speaker, Dr. Aradhya Achuri has actively participated in discussions addressing the latest challenges and breakthroughs in fertility treatments, contributing to knowledge exchange with leading specialists across India and abroad.
                                    </h5>
                                </div>
							</div>
							<div class="col-md-4 col-xs-6 exclDealPoints">
								<div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/Dr-Aradhya-Achuri-Publication-1.png')}}" loading="lazy" decoding="async" alt="dr" style='width:100%; height:300px; object-fit:cover; object-position:center; border-radius:12px;' />
                                    
                                </div>

                            </div>
                            <div class="col-md-4 col-xs-6 exclDealPoints">
								<div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" loading="lazy" decoding="async" alt="dr aradhya" src="{{asset('fronted/assets/aradhya/Dr-Aradhya-Achuri-Publication-2.png')}}" style='width:100%; height:300px; object-fit:cover; object-position:center; border-radius:12px;' />
                                    
                                </div>

                            </div>
                            <div class="col-md-4 col-xs-6 exclDealPoints">
								<div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" loading="lazy" decoding="async" alt="dr aradhya" src="{{asset('fronted/assets/aradhya/Dr-Aradhya-Achuri-Publication-3.png')}}" style='width:100%; height:300px; object-fit:cover; object-position:center; border-radius:12px;' />
                                    
                                </div>

                            </div>
							<div class="col-md-4 exclDealPoints">
								<div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" alt="dr aradhya" loading="lazy" decoding="async" src="{{asset('fronted/assets/aradhya/Dr-Aradhya-Achuri-Publication-4.png')}}" style='width:100%; height:300px; object-fit:cover; object-position:center; border-radius:12px;' />
                                    
                                </div>

                            </div>
							
                            <div class="col-md-4 exclDealPoints">
								<div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" alt="dr aradhya" loading="lazy" decoding="async" src="{{asset('fronted/assets/aradhya/Dr-Aradhya-Achuri-Publication-5.png')}}" style='width:100%; height:300px; object-fit:cover; object-position:center; border-radius:12px;' />
                                    
                                </div>

                            </div>
                            <div class="col-md-4 exclDealPoints">
								<div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" alt="dr aradhya" loading="lazy" decoding="async" src="{{asset('fronted/assets/aradhya/Dr-Aradhya-Achuri-Publication-6.jpg')}}" style='width:100%; height:300px; object-fit:cover; object-position:center; border-radius:12px;' />
                                    
                                </div>

                            </div>
							<div class="col-md-4 exclDealPoints">
							</div>
                            <div class="col-md-4 exclDealPoints">
								<div class="media-col mt-3 ng-star-inserted">
                                    <img class="me-3 rightIconSize ng-star-inserted" alt="dr aradhya" loading="lazy" decoding="async" src="{{asset('fronted/assets/aradhya/Dr-Aradhya-Achuri-Publication-7.jpg')}}" style='width:100%; height:300px; object-fit:cover; object-position:center; border-radius:12px;' />
                                    
                                </div>

                            </div>
							<div class="col-md-12 exclDealPoints">
								<div class="main-quali-title" style='padding:16px 18px;margin:12px 0 8px 0 ' >
                                    <h5 class="growth-title" style='text-align:center;font-size:20px' >
Through these contributions, Dr. Aradhya not only enhances professional collaboration but also reinforces her mission of providing the most advanced and compassionate fertility solutions to couples.


                                    </h5>
                                </div>
							</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="section-sp1 awards-and-achi-section other-pages">
        <div class="container">
            <div class="heading-bx text-center">
                <h2 class="title">Awards and Achievement</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4">
                    <div class="core-vaule-right-con">
                        <div class="row ng-star-inserted">
                            <div class="col-md-12 exclDealPoints">
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Professional Understanding" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Dr A.P.J Abdul Kalam woman empowerment excellence award by ACT NOW NGO for rendering exemplary services in the field of fertility - 2023
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!--second-->
                            <div class="col-md-12 exclDealPoints">
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Careful While Travelling" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            ISAR YOUNG ACHIEVER AWARD - 2024
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 exclDealPoints">
                                <div class="media-col mt-3 ng-star-inserted">
                                    <img alt="Careful While Travelling" class="me-3 rightIconSize ng-star-inserted" src="{{asset('fronted/assets/aradhya/correctTick.svg')}}" loading="lazy" decoding="async">
                                    <div class="media-body ng-star-inserted">
                                        <p>
                                            Doctors excellence awards - 2025
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--second-->
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 d-md-flex align-self-center order-xl-0 order-lg-0 order-md-0 order-2">
                    <div class="form-left-con core-vaule-left-con position-relative text-center margin-left">
                        <figure class="mb-0 inner-img-be">
                            <img src="{{asset('fronted/assets/aradhya/awards-and-Achievement.jpg')}}" alt="My Awards and Achievement" class="mb-0 img-fluid inner-img" loading="lazy" decoding="async">
                        </figure>
                    </div>
                </div>
               <div class="col-lg-4 col-md-4 d-md-flex align-self-center order-xl-0 order-lg-0 order-md-0 order-2">
                    <div class="form-left-con core-vaule-left-con position-relative text-center margin-left">
                        <figure class="mb-0 inner-img-be">
                            <img src="{{asset('fronted/assets/aradhya/awards-and-Achievement-2.jpg')}}" alt="My Awards and Achievement" class="mb-0 img-fluid inner-img" loading="lazy" decoding="async">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        <img class="pt-img5 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
    </section>
    <section class="section-sp1 service-wraper2 mb-5 why-choose-section">
        <div class="container">
            <div class="heading-bx text-center">
                <h2 class="title">Why Choose Dr. Aradhya Achuri?</h2>
            </div>
            <div class="row align-items-center">                
                <div class="col-lg-5">
                    <div class="form-left-con core-vaule-left-con position-relative text-center margin-right">
                        <figure class="mb-0 inner-img-be">
                            <img src="{{asset('fronted/assets/aradhya/why-choose.jpg')}}" alt="My Awards and Achievement" class="mb-0 img-fluid inner-img" loading="lazy" decoding="async">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="why-choose">
                        <h5 class="why-choose-title">
                            With a strong foundation in reproductive medicine and a passion for helping families grow, Dr. Aradhya combines advanced techniques with personalized care to offer the best possible outcomes.
                        </h5>
                    </div>
                    <div class="accordion ttr-accordion1 why-choose-accoding" id="accordionRow1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Compassionate Patient Care</button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">Dr. Aradhya is committed to understanding your unique needs and providing holistic, ethical, and supportive treatments every step of the way.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Expertise You Can Trust</button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordionRow1">
                                <div class="accordion-body">
                                    <p class="mb-0">With diverse qualifications and extensive experience in infertility treatments, you’ll receive world-class care backed by evidence-based practices.</p>
                                </div>
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