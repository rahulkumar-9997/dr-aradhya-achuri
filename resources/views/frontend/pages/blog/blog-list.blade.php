@extends('frontend.layouts.master')
@section('title','Blog | Dr. Aradhya Achuri')
@section('description', 'Fertility Specialist')
@section('main-content')
<div class="page-content bg-white">
    <div class="banner-wraper">
        <div class="page-banner breadcrumb-overlay" style="background-image:url({{ asset('fronted/assets/aradhya/breadcrumb/blog.jpg')}});">
            <div class="container">
                <div class="page-banner-entry text-center">
                    <h1>Blog Grid</h1>
                    <!-- <h6>Some content here</h6> -->
                </div>
            </div>
            <img class="pt-img1 animate-wave" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
            <img class="pt-img2 animate2" src="{{asset('fronted/assets/aradhya/shap/circle-orange.png')}}" alt="">
            <img class="pt-img3 animate-rotate" src="{{asset('fronted/assets/aradhya/shap/plus-orange.png')}}" alt="">
        </div>
    </div>
    <section class="section-area section-sp1">
        <div class="container">
            <div class="row">
                @if (!empty($blogs) && $blogs->count() > 0)
                    @foreach ($blogs as $blog)
                        <div class="col-xl-4 col-md-6 mb-20">
                            <div class="blog-card h-100">
                                <div class="post-media image-file popup-img">
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
                @endif
            </div>
            <div class="front-pagination">
                {{ $blogs->links('vendor.pagination.front-pagination') }}
            </div>  
        </div>
    </section>

</div>
@endsection
@push('scripts')
@endpush