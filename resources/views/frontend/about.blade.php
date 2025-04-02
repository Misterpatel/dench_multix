@extends('frontend.layouts.app')
@section('content')
@php
$about = App\Models\About::where('status','1')->first();
$settings = App\Models\Setting::where('status','1')->first();
$about_banner_image = str_replace('storage/app/public/files/setting/banner/about/', '', $settings->banner_about);
@endphp
<section class="page-banner-wrap bg-cover section-padding section-padding" style="background-image: url('{{asset('public/storage/files/setting/banner/about/' . $about_banner_image) }}')">
    <div class="banner-text">about</div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <div class="page-title">
                        <h1>{{ $about?->about_heading ?? "" }}</h1>
                    </div>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">about</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="about-us-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 pr-5">
                <div class="section-title mb-30">
                    <p>About Company</p>
                    <h3>Get’s IT Solutions For Expert Consultants</h3>
                </div>

                <p class="pr-lg-5">{{ \Str::words(strip_tags($about?->about_content),120,'......') ?? "" }}</p>
                
                <!----<div class="about-icon-box style-2">
                    <div class="icon">
                        <i class="fal fa-users"></i>
                    </div>
                    <div class="content">
                        <h3>Professinoal Consultants</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque</p>
                    </div>
                </div>
                <div class="about-icon-box style-2">
                    <div class="icon">
                        <i class="fal fa-bullseye-arrow"></i>
                    </div>
                    <div class="content">
                        <h3>Managed IT Solutions</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque</p>
                    </div>
                </div>---->

            </div>

            <div class="col-lg-6 pl-lg-5 mt-5 mt-lg-0 col-12">
                <div class="about-right-img">
                    <span class="dot-circle"></span>
                    <div class="about-us-img" style="background-image: url('{{asset('public/storage/files/setting/banner/about/' . $about_banner_image) }}')">
                    </div>
                    <span class="triangle-bottom-right"></span>
                </div>
            </div>
        </div>

        <!----<div class="row mpt-50 pt-100">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-features-item">
                    <div class="icon">
                        <i class="flaticon-speech-bubble"></i>
                    </div>
                    <div class="content">
                        <h3>IT Consultancy</h3>
                        <p>Faster & Smarter Solutions</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-features-item">
                    <div class="icon">
                        <i class="flaticon-unlock"></i>
                    </div>
                    <div class="content">
                        <h3>Cyber Security</h3>
                        <p>Faster & Smarter Solutions</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-features-item">
                    <div class="icon">
                        <i class="flaticon-mobile-app"></i>
                    </div>
                    <div class="content">
                        <h3>Development</h3>
                        <p>Faster & Smarter Solutions</p>
                    </div>
                </div>
            </div>
        </div>---->
    </div>
</section>  

<section class="faq-section section-padding">
    <div class="faq-bg bg-cover d-none d-lg-block" style="background-image: url('{{$about?->faq_image}}')"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7">
                <div class="col-12 col-lg-12 mb-40">
                    <div class="section-title">
                        <p>Why choose us</p>
                        <h1>Innovating Solutions <br> Digital Mindset</h1>
                    </div>
                </div>

                <div class="faq-content">
                    <div class="faq-accordion">
                        <div id="accordion" class="accordion">
                           
                          @if ($faqs->count() > 0)
                              @foreach ($faqs as $faq)
                            <div class="card">
                                <div class="card-header">
                                    <p class="mb-0 text-capitalize">
                                        <a class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" href="#faq-{{ $faq->id }}">
                                            {{ $faq->title }}
                                        </a>
                                    </p>
                                </div>
                                <div id="faq-{{ $faq->id }}" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        {!! $faq->content !!}
                                    </div>
                                </div>
                            </div> <!-- /card -->
                            @endforeach
                           @endif
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-team-wrapper section-padding">
    <div class="container">
        <div class="row align-items-center mb-40">
            <div class="col-12 col-md-6">
                <div class="section-title">
                    <p>Exclusive Members</p>
                    <h1>Meet Our Experience Team Members</h1>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0 text-md-right">
                <a href="team.html" class="theme-btn off-white">View all Member <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="team-members-list row">
            @if(!@empty($teamMembers))
            @foreach ($teamMembers as $teamMember)
            <div class="col-12 col-md-6 col-xl-3">
                <div class="single-team-member">
                    <div class="member-img bg-cover bg-center" style="background-image: url('{{asset("public/storage/files/team_member/".$teamMember->photo) }}')">
                    </div>
                    <div class="member-bio">
                        <h4>{{ $teamMember->name }}</h4>
                        <p>{{ $teamMember->designation }}</p>
                    </div>
                    <div class="social-profile">
                        <a href="{{ $teamMember->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $teamMember->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-behance"></i></a>
                        <a href="{{ $teamMember->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>     

<section class="funfact-wrapper bottom text-white">
    <div class="container">
        <div class="funfact-content-grid bg-cover" style="background-image: url('{{asset("public/front-assets/img/funfact-line.png")}}')">
            <div class="single-funfact-item">
                <div class="icon">
                    <i class="fal fa-gem"></i>
                </div>
                <h3>368</h3>
                <p>Project Completed</p>
            </div>
            <div class="single-funfact-item">
                <div class="icon">
                    <i class="fal fa-drafting-compass"></i>
                </div>
                <h3>785</h3>
                <p>Expert Consultants</p>
            </div>
            <div class="single-funfact-item">
                <div class="icon">
                    <i class="fal fa-stars"></i>
                </div>
                <h3>896</h3>
                <p>5 Stars Rating</p>
            </div>
            <div class="single-funfact-item">
                <div class="icon">
                    <i class="fal fa-trophy-alt"></i>
                </div>
                <h3>125</h3>
                <p>Awards Winning</p>
            </div>
        </div>
    </div>
</section> 

<section class="services-wrapper service-2 section-padding section-bg">
    <div class="container">
        <div class="row mb-50">
            <div class="col-12 col-lg-12">
                <div class="section-title text-white text-center">
                    <p>Popular IT services</p>
                    <h1>Solutions For IT Business</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if(!@empty($services))
            @foreach ($services as $service)
            <div class="col-md-6 col-xl-3 col-12">
                <div class="single-service-item">
                    <div class="icon">
                        <img src="{{asset('public/storage/files/services/'.$service->photo)}}" alt="service">
                    </div> 
                    <h4>{{ $service->heading }}</h4>
                    <p>{{ \Str::words(strip_tags($service->service_content), 10, '...') }}</p>
                    <a href="{{  ('service-details')}}">learn more <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

<section class="testimonial-wrapper section-padding">
    <div class="testimonial-bg bg-cover" style="background-image: url('{{$about?->testimonial_image}}')"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-4 col-xl-5 offset-xl-7">
                <div class="testimonial-carousel-active owl-carousel owl-theme">
				      
				
					 @if ($testimonials->count() > 0)
						@foreach ($testimonials as $testimonial)											
                        <div class="single-testimonial"> 
                        <div class="icon">
                            <i class="flaticon-right-quote"></i>
                        </div>
                        <h2>{{ $testimonial->comment }}</h2>
                        <div class="client-info">
                            <div class="client-img bg-cover" style="background-image: url('{{asset("storage/app/public/files/testimonial/".$testimonial->photo)}}')"></div>
                            <div class="client-bio">
                                <h3>{{ $testimonial->name }}</h3>
                                <p>{{ $testimonial->designation }}</p>
                            </div>
                        </div>
                    </div>
					@endforeach
                   @endif
                  
                </div>
            </div>
        </div>
    </div>
</section>  

<div class="client-brand-logo-wrap">
    <div class="container">
        <div class="brand-carousel-active pt-60 pb-60 d-flex justify-content-between owl-carousel">
            <div class="single-client">
                <img src="{{asset('public/front-assets/img/brand/1.png')}}" alt="">
            </div>
            <div class="single-client">
                <img src="{{asset('public/front-assets/img/brand/2.png')}}" alt="">
            </div>
            <div class="single-client">
                <img src="{{asset('public/front-assets/img/brand/3.png')}}" alt="">
            </div>
            <div class="single-client">
                <img src="{{asset('public/front-assets/img/brand/4.png')}}" alt="">
            </div>
            <div class="single-client">
                <img src="{{asset('public/front-assets/img/brand/b4.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

<section class="cta-banner">
    <div class="container-fluid bg-cover section-bg" style="background-image: url('{{asset("public/front-assets/img/cta_bg1.png")}}')">
        <div class="cta-content">
            <div class="row align-items-center">
                <div class="col-xl-7 text-white col-12 text-center text-xl-left">
                    <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>
                </div>
                <div class="col-xl-5 col-12 text-center text-xl-right">
                    <a href="{{ route('contact') }}" class="theme-btn mt-4 mt-xl-0">Get a quote <i class="fas fa-arrow-right"></i></a>
                    <a href="{{ route('services') }}" class="ml-sm-3 mt-4 mt-xl-0 theme-btn minimal-btn">read more <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section> 

@endsection
