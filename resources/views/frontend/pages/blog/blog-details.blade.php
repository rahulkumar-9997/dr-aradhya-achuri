@php
$metaTitle = Str::limit(
    $blog->meta_title ?? ($blog->title . ' | Dr. Aradhya Achuri'),
    57
);
$metaDesc = $blog->meta_description ?? $blog->short_desc ?? $blog->content;
$metaDescription = \Illuminate\Support\Str::limit(strip_tags($metaDesc), 160);
@endphp
@extends('frontend.layouts.master')
@section('title', $metaTitle)
@section('description', $metaDescription)
@section('meta')
<meta property="og:title" content="{{ $blog->title }}">
<meta property="og:description" content="{{ $blog->short_desc }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="article">
@if($blog->featured_image)
<meta property="og:image" content="{{ asset('upload/blog/' . $blog->featured_image) }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@endif
<meta name="twitter:card" content="summary_large_image">
@endsection
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>{{ $blog->title }}</h1>
                    <!-- <h6></h6> -->
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="shap" loading="lazy" decoding="async">
            <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="shap" loading="lazy" decoding="async">
        </div>
    </div>
    <section class="section-area section-sp1 bg-white other-pages">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-xl-8 mb-30 mb-md-50">
                    <!-- blog start -->
                    <div class="blog-card blog-single blog-details-page">
                        @if($blog->featured_image)
                        <div class="post-media">
                            <img src="{{ asset('upload/blog/' . $blog->featured_image) }}" alt="{{ $blog->title }}" loading="lazy" decoding="async">
                        </div>
                        @endif
                        <div class="info-bx">
                            <div class="ttr-post-title">
                                <h2 class="post-title">
                                    {{ $blog->short_desc ?? $blog->title }}
                                </h2>
                            </div>
                            <div class="ttr-post-text blog-post-data">
                                {!! $blog->content !!}
                            </div>
                            @if($blog->paragraphs && $blog->paragraphs->count() > 0)
                            <div class="blog-paragraph mt-4">
                                <div class="row blog-par-row">
                                    <div class="col-lg-12">
                                        @foreach ($blog->paragraphs as $index => $paragraph)
                                        <div class="blog-paragraphs mb-4">
                                            <div class="row align-items-center">
                                                <div class="{{ $paragraph->image ? 'col-lg-8' : 'col-lg-12' }}">
                                                    <div class="p-title">
                                                        <h5>
                                                            {{ $paragraph->title }}
                                                        </h5>
                                                    </div>
                                                    <div class="paragraphs-text">
                                                        {!! clean_html_content($paragraph->content) !!}
                                                    </div>
                                                </div>
                                                @if($paragraph->image)
                                                <div class="col-lg-4">
                                                    <div class="photo-gallery wow fadeInUp blog-p-img">
                                                        <a href="{{ asset('upload/blog/' . $paragraph->image) }}" data-cursor-text="View">
                                                            <figure class="para-img-se">
                                                                <img src="{{ asset('upload/blog/' . $paragraph->image) }}"
                                                                    alt="{{ $paragraph->alt_text ?? $paragraph->title ?? 'Blog image' }}"
                                                                    class="img-fluid" loading="lazy" decoding="async"> 
                                                            </figure>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($blog->images && $blog->images->count() > 0)
                            <div class="blog-images-section mt-4">
                                <div class="row gallery-items page-gallery-box popup-gallery">
                                    @foreach($blog->images as $index => $image)
                                    <div class="col-lg-6 col-6">
                                        <div class="photo-gallery wow fadeInUp" @if($index> 0) data-wow-delay="{{ 0.2 * $index }}s" @endif>
                                            <a class="popup-img" href="{{ asset('upload/blog/' . $image->image) }}" data-cursor-text="View">
                                                <figure class="image-anime ">
                                                    <img src="{{ asset('upload/blog/' . $image->image) }}" alt="{{ $image->alt_text }}" loading="lazy" decoding="async">
                                                </figure>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @php
                            $shareLinks = social_share_links($blog->title, $blog->short_desc);
                            @endphp
                            <div class="ttr-post-footer">
                                <div class="share-post ml-auto">
                                    <ul class="social-media mb-0">
                                        <li><strong>Share:</strong></li>
                                        @foreach(['facebook', 'twitter', 'linkedin', 'whatsapp'] as $network)
                                        <li>
                                            <a target="_blank" href="{{ $shareLinks[$network] }}">
                                                <i class="fab fa-{{ $network }}"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 col-lg-5 col-xl-4 mb-30">
                    <aside class="side-bar sticky-top aside-bx">
                        <div class="widget recent-posts-entry">
                            <h4 class="widget-title">Recent Posts</h4>
                            <div class="widget-post-bx">
                                @if (!empty($blogList) && $blogList->count() > 0)
                                @foreach ($blogList as $blog)
                                <div class="widget-post clearfix">
                                    <div class="ttr-post-media">
                                        <img src="{{ asset('upload/blog/' . $blog->featured_image) }}" width="200" height="143" alt="{{ $blog->title }}" loading="lazy" decoding="async">
                                    </div>
                                    <div class="ttr-post-info">
                                        <div class="ttr-post-header">
                                            <h6 class="post-title">
                                                <a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                            </h6>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>

                    </aside>
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