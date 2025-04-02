@extends('frontend.layouts.app')
@section('content')
 
<section class="page-banner-wrap bg-cover" style="background-image: url('{{asset("public/front-assets//img/page-banner.jpg")}}')">
    <div class="banner-text">{{ str_replace('-',' ',$pageHeading) }}</div>
    <div class="container"> 
        <div class="row align-items-center">
            <div class="col-md-12 col-12">   
                <div class="page-heading text-white">
                    <div class="page-title">
                        <h1>{{ str_replace('-',' ',$pageHeading) }}</h1>
                    </div>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ str_replace('-',' ',$pageHeading) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="service-details-post-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-3 mt-5 mt-lg-0 col-12 order-2 order-lg-1">
                <div class="service-sidebar">
				
					<!-----<div class="single-sidebar-widgets">    
                        <img src="{{asset('public/front-assets/img/brand/4.png')}}" alt="">
                    </div>---->
					
                   <div class="single-sidebar-widgets">
                        <div class="services-category-link">
						@if($services->isNotEmpty())
					        @foreach($services as $serviceItems)
                            <a href="{{ route('service-details', ['category'=>Str::lower($category),'slug' => Str::slug($serviceItems->heading, '-')]) }}">{{ $serviceItems->heading }}</a>
							@endforeach
						@endif
                        </div>
                    </div>

                    <!----<div class="single-sidebar-widgets">
                        <div class="wid-title">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="contact-form-widgets">
                            <form action="#">
                                <input type="text" placeholder="Email Address">
                                <textarea placeholder="Message"></textarea>
                                <button type="submit" class="theme-btn">Send  message <i class="fas fa-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>

                     <div class="single-sidebar-widgets">
                        <div class="wid-title">
                            <h3>Brochures</h3>
                        </div>
                        <div class="download-service-doc">
                            <a href="#" class="theme-btn off-white">Download Doc <i class="fal fa-cloud-download"></i></a>
                            <a href="#" class="theme-btn">Download PDF <i class="fal fa-file-pdf"></i></a>
                        </div>
                    </div> ---->
					
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1 col-xl-7 p-lg-0 col-12 order-1 order-lg-2">
                <div class="service-details-content">
				    @if(!empty($serviceDetails->photo))
                    <img src="{{asset('storage/app/public/files/services/'.$serviceDetails->photo)}}" alt="">
				    @endif
                    <!--<h1>Solutions For Development</h1>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                        sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <img src="assets/img/service-details-content2.jpg" alt="">
                    <h2>User’s Flow Strategies</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    
                    <ul>
                        <li>Static Innovations</li>
                        <li>Consulting & Advisory</li>
                        <li>Turnaround Situations</li>
                    </ul>

                    <h4>Our strategy consulting team implements proven methodologies with 
                        life sciences, consumer products, and retail companies that transforms their business, drive growth, and facilitate </h4>---->

                    <p>{!!$serviceDetails->service_content ?? ''!!}</p>
                </div>
            </div>
        </div> 
    </div>
</section>

<section class="cta-banner">
    <div class="container-fluid bg-cover section-bg" style="background-image: url('{{asset("public/front-assets//img/cta_bg1.png")}}')">
        <div class="cta-content">
            <div class="row align-items-center">
                <div class="col-xl-7 text-white col-12 text-center text-xl-left">
                    <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>
                </div>
                <div class="col-xl-5 col-12 text-center text-xl-right">
                    <a href="{{ route('contact') }}" class="theme-btn mt-4 mt-xl-0">Get a quote <i class="fas fa-arrow-right"></i></a>
                    <a href="{{route('services')}}" class="ml-sm-3 mt-4 mt-xl-0 theme-btn minimal-btn">read more <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section> 
@endsection
