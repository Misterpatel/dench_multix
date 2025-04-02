<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--<![endif]-->
<!--<![endif]-->
<html lang="en">
<head>
<title>{{!empty($meta) ? $meta->meta_title : ''}}</title>
<meta charset="utf-8">
<!-- Meta -->
<link rel="canonical" href="{{ url()->current() }}" />

<meta name="title" content="{{!empty($meta) ? $meta->meta_title : ''}}" />
<meta name="keywords" content="{{!empty($meta) ? $meta->meta_keyword : ''}}" />
<meta name="author" content="">
<meta name="robots" content="" />
<meta name="description" content="{{!empty($meta) ? $meta->meta_description : ''}}" />
<!-- this styles only adds some repairs on idevices  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$setting = App\Models\Setting::where('status','1')->first();
@endphp
<!-- Favicon -->
<link rel="shortcut icon" href="{{ !empty($setting->favicon) ? asset($setting->favicon) : '' }}">

<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Stylesheets -->
<link rel="stylesheet" media="screen" href="{{asset('frontend/js/bootstrap/bootstrap.min.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('frontend/js/mainmenu/menu.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('frontend/css/default.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('frontend/css/layouts.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('frontend/css/shortcodes.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" media="screen" href="{{asset('frontend/css/responsive-leyouts.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('frontend/js/masterslider/style/masterslider.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend/js/cubeportfolio/cubeportfolio.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/Simple-Line-Icons-Webfont/simple-line-icons.css')}}" media="screen" />
<link rel="stylesheet" href="{{asset('frontend/css/et-line-font/et-line-font.css')}}">
<link href="{{asset('frontend/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('frontend/js/tabs/assets/css/responsive-tabs.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('frontend/js/smart-forms/smart-forms.css')}}">

<!-- Remove the below comments to use your color option -->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/lightblue.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/orange.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/green.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/pink.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/red.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/purple.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/bridge.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/yellow.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/violet.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/cyan.css')}}" />-->
<!--<link rel="stylesheet" href="{{asset('frontend/css/colors/mossgreen.css')}}" />-->

</head>
