  <!-- ========== Meta Tags ========== -->
  <meta charset="UTF-8')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0')}}">
  <meta name="author" content="modinatheme')}}">
  <meta name="description" content="{{  $meta?->meta_description ?? '' }}">
  <meta name="keywords" content="{{ $meta?->meta_keyword ?? '' }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{!empty($meta) ? $meta->meta_title : ''}}" />
<meta property="og:description" content="{{!empty($meta) ? $meta->meta_description : ''}}" />
<meta property="og:image" content="{{asset($banner)}}" />
<meta property="og:site_name" content="Bizsetu" />
<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Bizsetu">
<meta name="twitter:title" content="{{!empty($meta) ? $meta->meta_title : ''}}">
<meta name="twitter:description" content="{{!empty($meta) ? $meta->meta_description : ''}}">
<meta name="twitter:image" content="https://bizsetu.com/images/site-img36.png">
  <!-- ======== Page title ============ -->
  <title>Techex - Information & Technology HTML Template</title>
  <!-- ========== Favicon Icon ========== --> 
  <link rel="shortcut icon" href="{{asset('front-assets/img/favicon.png')}}">
  <!-- ===========  All Stylesheet ================= -->
  <!--  Icon css plugins -->
  <link rel="stylesheet" href="{{asset('front-assets/css/icons.css')}}">
  <!--  animate css plugins -->
  <link rel="stylesheet" href="{{asset('front-assets/css/animate.css')}}">
  <!--  magnific-popup css plugins --> 
  <link rel="stylesheet" href="{{asset('front-assets/css/magnific-popup.css')}}"> 
  <!--  owl carosuel css plugins -->
  <link rel="stylesheet" href="{{asset('front-assets/css/owl.carousel.min.css')}}">
  <!-- metis menu css file -->
  <link rel="stylesheet" href="{{asset('front-assets/css/metismenu.css')}}">
  <!--  owl theme css plugins -->
  <link rel="stylesheet" href="{{asset('front-assets/css/owl.theme.css')}}">
  <!--  Bootstrap css plugins -->
  <link rel="stylesheet" href="{{asset('front-assets/css/bootstrap.min.css')}}">
  <!--  aos css plugins -->
  <link rel="stylesheet" href="{{asset('front-assets/css/aos.min.css')}}">
   <!--  main style css file -->
  <link rel="stylesheet" href="{{asset('front-assets/style7.css')}}">

 <link rel="stylesheet" href="{{asset('front-assets/css/style.css')}}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- template main style css file -->
