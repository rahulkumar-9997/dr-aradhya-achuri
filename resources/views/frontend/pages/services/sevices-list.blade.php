@extends('frontend.layouts.master')
@section('title','Our Services | Dr. Aradhya Achuri')
@section('description', 'Fertility Specialist')
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay" style="background-image:url({{ asset('fronted/assets/aradhya/breadcrumb/services.jpg')}});">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>Services</h1>
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
            <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="">
            <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
        </div>
    </div>
    <section class="section-area section-sp1 team-wraper service-inner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="service4-boxarea">
                        <div class="content-area">
                            <a href="service-single.html" class="title">Cardiology</a>
                            <div class="space16"></div>
                            <p>Specializing in the diagnosis and treatment of heart-related conditions.</p>
                            <div class="space24"></div>
                            <a href="service-single.html" class="readmore">
                                Learn More
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <g clip-path="url(#clip0_5927_10805)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99992 0.833008C4.04188 0.833008 0.833252 4.04163 0.833252 7.99967C0.833252 11.9577 4.04188 15.1663 7.99992 15.1663C11.958 15.1663 15.1666 11.9577 15.1666 7.99967C15.1666 4.04163 11.958 0.833008 7.99992 0.833008ZM7.33325 5.33301C7.06359 5.33301 6.82052 5.49543 6.71732 5.74455C6.61415 5.99367 6.67119 6.28042 6.86185 6.47108L7.72379 7.33301L5.52851 9.52827C5.26817 9.78861 5.26817 10.2107 5.52851 10.4711C5.78887 10.7314 6.21097 10.7314 6.47133 10.4711L8.66659 8.27581L9.52852 9.13774C9.71919 9.32841 10.0059 9.38547 10.2551 9.28227C10.5042 9.17907 10.6666 8.93601 10.6666 8.66634V5.99967C10.6666 5.63149 10.3681 5.33301 9.99992 5.33301H7.33325Z" fill="#4416FF"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_5927_10805">
                                            <rect width="16" height="16" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </div>

                        <div class="img1 image-anime">
                            <img src="{{asset('fronted/assets/aradhya/services/1.jpg')}}" alt="">
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