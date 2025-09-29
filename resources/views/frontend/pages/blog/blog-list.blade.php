@php
$metaDesc ="Explore blogs on IVF, PCOS, male infertility & fertility care in Hyderabad. Expert advice from Dr. Aradhya Achuri’s fertility center.";
$meta_description = Illuminate\Support\Str::limit(strip_tags($metaDesc), 160);
@endphp

@extends('frontend.layouts.master')
@section('title','Fertility & IVF Blog | Insights by Dr. Aradhya Achuri')
@section('description', $meta_description)
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>Latest Articles about IVF, Parenthood & Fertility</h1>
                    <!-- <h6>Some content here</h6> -->
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
                @if (!empty($blogs) && $blogs->count() > 0)
                @foreach ($blogs as $blog)
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
                @endif
            </div>
            <div class="front-pagination">
                {{ $blogs->links('vendor.pagination.front-pagination') }}
            </div>
        </div>

        <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        <img class="pt-img5 animate2" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
    </section>

</div>
@endsection
@push('scripts')
@endpush