@php
$meta_description = Illuminate\Support\Str::limit(
    strip_tags(
    $bannerService->meta_description ??
    $bannerService->short_detail ??
    $bannerService->long_detail ??
    ''
    ),
    160
);
$meta_title = Illuminate\Support\Str::limit(
    strip_tags(
        $bannerService->meta_title ??
        $bannerService->title ??
        $bannerService->short_detail ??
        ''
    ),
    60
);
@endphp
@extends('frontend.layouts.master')
@section('title', $meta_title)
@section('description', $meta_description)
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>{{ $bannerService->title }}</h1>
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        </div>
    </div>
    <section class="section-area section-sp1 team-wraper service-inner-area other-pages">
        <div class="container">
            @if(!empty($bannerService->short_detail))
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-5">
                        <div class="service-details-content">                        
                            <p> {!! $bannerService->short_detail !!}  </p>                         
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                @if(!empty($bannerService) && $bannerService->serviceLinks->count() > 0)
                    @foreach($bannerService->serviceLinks as $serviceLink)
                        @php $service = $serviceLink->service; @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="service4-boxarea">
                                <a href="{{ route('services.details', $service->slug) }}">
                                    <div class="services-shap-icon">
                                        <span>
                                            @if($service->icon_image)
                                            <img src="{{ asset('upload/services/' . $service->icon_image) }}"
                                                alt="{{ $service->title }}" loading="lazy" decoding="async">
                                            @else
                                            <img src="{{ asset('fronted/assets/aradhya/services/1.png') }}" alt="Default Icon"
                                                loading="lazy" decoding="async">
                                            @endif
                                        </span>
                                    </div>
                                    <div class="content-area">
                                        <div class="services-title">
                                            <div class="title">
                                                {{ $service->title }}
                                            </div>
                                            @if($service->subtitle)
                                            <p>
                                                {{ Str::limit($service->subtitle, 100) }}
                                            </p>
                                            @else
                                            <p>
                                                {!! clean_html_content(Str::limit($service->short_content, 100)) !!}
                                            </p>
                                            @endif
                                        </div>
                                        <div class="readmore">
                                            Learn More
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                                fill="none">
                                                <g clip-path="url(#clip0_5927_10805)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7.99992 0.833008C4.04188 0.833008 0.833252 4.04163 0.833252 7.99967C0.833252 11.9577 4.04188 15.1663 7.99992 15.1663C11.958 15.1663 15.1666 11.9577 15.1666 7.99967C15.1666 4.04163 11.958 0.833008 7.99992 0.833008ZM7.33325 5.33301C7.06359 5.33301 6.82052 5.49543 6.71732 5.74455C6.61415 5.99367 6.67119 6.28042 6.86185 6.47108L7.72379 7.33301L5.52851 9.52827C5.26817 9.78861 5.26817 10.2107 5.52851 10.4711C5.78887 10.7314 6.21097 10.7314 6.47133 10.4711L8.66659 8.27581L9.52852 9.13774C9.71919 9.32841 10.0059 9.38547 10.2551 9.28227C10.5042 9.17907 10.6666 8.93601 10.6666 8.66634V5.99967C10.6666 5.63149 10.3681 5.33301 9.99992 5.33301H7.33325Z"
                                                        fill="#fc6c61"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_5927_10805">
                                                        <rect width="16" height="16" fill="white"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="img1 image-anime services-mask">
                                        @if($service->main_image)
                                        <img src="{{ url('/images/services/' . $service->main_image . '?w=400&h=300&q=75') }}"
                                            srcset="{{ url('/images/services/' . $service->main_image . '?w=200&h=150&q=75') }} 200w,
                                    {{ url('/images/services/' . $service->main_image . '?w=400&h=300&q=75') }} 400w,
                                    {{ url('/images/services/' . $service->main_image . '?w=800&h=600&q=75') }} 800w"
                                            sizes="(max-width: 576px) 100vw, (max-width: 768px) 50vw, 400px" width="400"
                                            height="300" alt="{{ $service->title }}" loading="lazy" decoding="async">
                                        @else
                                        <img src="{{ asset('fronted/assets/aradhya/services/1.jpg') }}"
                                            alt="Default Service Image" loading="lazy" decoding="async">
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            @if(!empty($bannerService->long_detail))
                <div class="head-text mb-10 service-details-section">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="services-detail-long">
                                {!! clean_html_content($bannerService->long_detail) !!} 
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        
    </section>
</div>
@endsection
@push('scripts')
@endpush