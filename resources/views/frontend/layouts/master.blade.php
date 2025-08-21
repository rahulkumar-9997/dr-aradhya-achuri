<!doctype html>
<html lang="en-US">
	<head>
		@include('frontend.layouts.headcss')
		@stack('styles')
	</head>
    <body>
		<div class="page-wraper">
			<!-- <div id="loading-icon-bx">
				<div class="loading-inner">
					<div class="load-one"></div>
					<div class="load-two"></div>
					<div class="load-three"></div>
				</div>
			</div>	 -->
			@include('frontend.layouts.header-menu')
			@yield('main-content')
			@include('frontend.layouts.footer')
			@include('frontend.layouts.common-modal')
		</div>
		@include('frontend.layouts.footerjs')
		@stack('scripts')
	</body>
</html>