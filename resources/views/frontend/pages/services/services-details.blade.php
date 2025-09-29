@php
$metaTitle = $services->title. ' | Dr. Aradhya Achuri';
$metaDesc = $services->short_content ?? $services->content;
$metaDescription = clean_html_content(\Illuminate\Support\Str::limit(strip_tags($metaDesc), 160));
@endphp
@extends('frontend.layouts.master')
@section('title', $metaTitle)
@section('description', $metaDescription)
@section('meta')
<meta property="og:title" content="{{ $services->title }}">
<meta property="og:description" content="{{ $metaDesc }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="article">
@if($services->main_image)
<meta property="og:image" content="{{ asset('upload/services/' . $services->main_image) }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@endif
<meta name="twitter:card" content="summary_large_image">
@php
    if($services->breadcrumb_image) {
        $breadcrumbImage = asset('upload/services/' . $services->breadcrumb_image);
    } else {
        $breadcrumbImage = asset('fronted/assets/aradhya/breadcrumb/services-detail.jpg');
    }
@endphp
@endsection
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>{{ $services->title }}</h1>
                    <!-- <h6></h6> -->
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        </div>
    </div>
    <section class="section-area section-sp1 other-pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <aside class="sticky-top pb-1">
                        <div class="widget">                            
                            @if($servicesList && $servicesList->count() > 0)
                                <div class="service-menu">
                                    <div class="other-services">
                                        <h4>Others Services</h4>
                                    </div>
                                    <ul class="">
                                        @foreach($servicesList as $service)
                                        <li class="{{ $service->id == $service->id ? 'active' : '' }}">
                                            <a href="{{ route('services.details', $service->slug) }}">
                                                <span>
                                                    {{ $service->title }}
                                                </span>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>                        
                    </aside>
                </div>
                <div class="col-lg-8 mb-30 mobile-order">
                    <div class="ttr-media mb-30">
                        @if($services->details_image)
                            <img src="{{ asset('upload/services/' . $services->details_image) }}" alt="{{ $services->title }}" class="rounded" loading="lazy" decoding="async">
                        @else
                            <img src="{{ asset('upload/services/' . $services->main_image) }}" alt="{{ $services->title }}" class="rounded" loading="lazy" decoding="async">
                        @endif                        
                    </div>
                    <div class="clearfix">
                        <div class="head-text mb-20 service-details-section">
                            
                            @if($services->short_content)
                            <h6 class="short-serv">
                                {{ $services->short_content }} 
                            </h6>
                            @endif
                            <div class="services-detail-long">
                                 {!! clean_html_content($services->content) !!} 
                            </div>                            
                        </div>                        
                    </div>                    
                </div>                
            </div>
        </div>
        <img class="pt-img4 animate1" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        <img class="pt-img5 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
    </section>
</div>
@endsection
@push('scripts')
@endpush