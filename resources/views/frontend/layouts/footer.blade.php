<!-- Footer ==== -->
<footer class="footer" style="background-image: linear-gradient(rgba(250, 145, 137, 0.5), rgba(250, 145, 137, 0.5)), url({{ asset('fronted/assets/images/background/footer.jpg') }});">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="widget widget_info">
                        <div class="footer-logo">
                            <a href="{{ url('/') }}">
                                <h2 class="footer-logo-h">
                                    Dr. Aradhya Achuri
                                </h2>
                            </a>
                        </div>
                        <div class="ft-contact">
                            <p>
                                Dr. Aradhya Achuri is a highly experienced IVF specialist providing expert care in
                                the fields of reproductive health and infertility. Her Fertility Clinic offers a range of services aimed at supporting individuals and families on their journey to parenthood.
                            </p>
                            <div class="contact-bx">
                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="contact-number">
                                    <span>Contact Us</span>
                                    <h4 class="number">
                                        <a href="tel:+91 7093532797">
                                            +91 70935 32797
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="footer-social-link mt-3">
                                <ul>
                                    <li>
                                        <a target="_blank" href="https://www.facebook.com/fertsupport">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <!-- <li>
												<a target="_blank" href="https://twitter.com/">
													<i class="fab fa-twitter"></i> 
												</a>
											</li> -->
                                    <li>
                                        <a target="_blank" href="https://www.instagram.com/draradhyaachuri">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://in.linkedin.com/in/aradhya-achuri-8b557380">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-6">
                    <div class="widget footer_widget ml-50">
                        <h3 class="footer-title">Quick Links</h3>
                        <ul>
                            <li><a href="{{ url('/') }}"><span>Home</span></a></li>
                            <li><a href="{{ route('about-us') }}"><span>About Us</span></a></li>
                            <li><a href="{{ route('services') }}"><span>Services</span></a></li>
                            <!--li><a href="{{ route('faq') }}"><span>FAQs</span></a></li-->
                            <li><a href="{{ route('blog') }}"><span>Blogs</span></a></li>
                            <li><a href="{{ route('contact-us') }}"><span>Contact Us</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-1 col-6 mobile-dnone-col">

                </div>
                <div class="col-xl-3 col-lg-3 col-6">
                    <div class="widget footer_widget">
                        <h3 class="footer-title">Our Services</h3>
                        @if(isset($footerServices))
                            <ul>
                                @foreach ($footerServices as $footerService)
                                    <li>
                                        <a href="{{ route('services.details', $footerService->slug) }}">
                                            <span>{{ $footerService->title }}</span>
                                        </a>
                                    </li>
                                @endforeach                                
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom -->
    <div class="container">
        <div class="footer-bottom">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="copyright-text">Copyright © 2025 Dr.Aradhya Achuri |
                        Design & Developed by
                        <a href="https://wizards.co.in/" target="_blank" class="text-secondary">wizards.co.in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="position-fixed start-0 end-0" style="z-index: 11; bottom: 50px">
    <div id="liveToast" class="toast align-items-center mx-auto" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<!-- Footer END ==== -->
<button class="back-to-top fa fa-chevron-up"></button>