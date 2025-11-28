<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="index, follow">
<meta name="author" content="Dr. Aradhya Achuri">
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('meta')
<link rel="icon" href="{{asset('fronted/assets/aradhya/fav.png')}}" type="image/x-icon">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('fronted/assets/aradhya/fav.png')}}">
<title>@yield('title')</title>
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" type="text/css" href="{{asset('fronted/assets/vendor/bootstrap-select/css/bootstrap-select.min.css')}}"> -->
<link rel="stylesheet" href="{{asset('fronted/assets/vendor/swiper/swiper.min.css')}}">
<link href="{{asset('fronted/assets/vendor/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('fronted/assets/css/style-reupdates.css')}}">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-R1HDV6BEZD"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-R1HDV6BEZD');
</script>