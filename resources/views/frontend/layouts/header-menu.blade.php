<header class="header {{ request()->is('/') ? 'header-transparent' : '' }} rs-nav">
    <!-- main header -->
    <div class="sticky-header navbar-expand-lg">
        <div class="menu-bar clearfix">
            <div class="container-fluid clearfix">
                <div class="menu-logo logo-dark">
                    <a href="{{ url('/') }}">
                        <h3>
                            Dr Aradhya Achuri
                        </h3>
                    </a>
                </div>
                <button class="navbar-toggler collapsed menuicon justify-content-end" type="button"
                    data-bs-toggle="collapse" data-bs-target="#menuDropdown" aria-controls="menuDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <!-- extra nav -->
                <div class="secondary-menu">
                    <ul>
                        <li class="num-bx"><a href="tel:+91 70935 32797"><i class="fas fa-phone-alt"></i> +91 70935 32797</a></li>
                        <li class="btn-area"><a href="{{ route('contact-us') }}" class="btn btn-primary shadow">CONTACT US <i class="btn-icon-bx fas fa-chevron-right"></i></a></li>
                    </ul>
                </div>
                <div class="menu-links navbar-collapse collapse justify-content-center" id="menuDropdown">
                    <div class="menu-logo">
                        <a href="{{ url('/') }}">
                            <h3>
                                Dr Aradhya Achuri
                            </h3>
                        </a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                        @if(isset($menuServices))
                        <li>
                            <a href="javascript:;">Services <i class="fas fa-plus"></i></a>
                            <ul class="sub-menu">
                                <li class="add-menu-left">
                                    <ul>
                                        @foreach ($menuServices as $menuService)
                                        <li>
                                            <a href="{{ route('services.details', $menuService->slug) }}">
                                                <span>{{ $menuService->title }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    </ul>
                    <ul class="social-media">
                        <li><a target="_blank" href="https://www.facebook.com/" class="btn btn-primary"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="https://www.google.com/" class="btn btn-primary"><i
                                    class="fab fa-google"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/" class="btn btn-primary"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/" class="btn btn-primary"><i
                                    class="fab fa-twitter"></i></a></li>
                    </ul>
                    <div class="menu-close">
                        <i class="ti-close"></i>
                    </div>
                </div>
                <!-- Navigation Menu END ==== -->
            </div>
        </div>
    </div>
    <!-- main header END -->
</header>