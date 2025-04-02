@if(in_array($default_page->page_name, ['first']))
    <section class="hero-slide-wrapper hero-1">
        <div class="hero-slider-active owl-carousel">
            <div class="single-slide bg-cover">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-xl-8 col-lg-10">
                            <div class="hero-contents">
                                <h5>{{ $home?->home_bannerInformation_title ?? "" }}</h5>
                                <h2>{{ $home?->home_bannerInformation_heading ?? "" }}</h2>
                                <p>{{ $home?->home_bannerInformation_description ?? "" }}</p>
                                <a href="{{ route('services') }}" class="theme-btn">Service we provide <i class="fas fa-arrow-right"></i></a>
                                <a href="{{ route('about') }}" class="theme-btn minimal-btn">learn more <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide-top-img d-none d-lg-block bg-overlay bg-cover" style="background-image: url('{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}')"></div>
                <div class="slide-bottom-img d-none d-xl-block bg-overlay bg-cover" style="background-image: url('{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}')"></div>
            </div>
        </div>
    </section>
 @endif


 
<!----- Banner Section Home Third----->
@if(in_array($default_page->page_name, ['third']))
<section class="hero-slide-wrapper hero-3">
    <div class="hero-slider-3">
        <div class="single-slide bg-cover" style="background-image: url('{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}')">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8 mt-5 mt-lg-0 order-2 order-lg-1 text-center text-lg-left">
                        <div class="hero-contents text-white">
                            <p>{{ $home?->home_bannerInformation_description ?? "" }}</p>
                            <h1>{{ $home?->home_bannerInformation_heading ?? "" }}</h1>
                            
                            <a href="{{ route('services') }}" class="theme-btn">Service we provide <i class="fas fa-arrow-right"></i></a>
                            <a href="{{ route('about') }}" class="theme-btn minimal-btn">learn more <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12 order-1 order-lg-2 text-center text-lg-right">
                        <div class="video-play-btn">
                            <a href="https://www.youtube.com/watch?v=E1xkXZs0cAQ" class="play-video popup-video"><i class="fas fa-play"></i></a>                     
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 @endif
<!----- Banner Section Home Third End ----->

@if(in_array($default_page->page_name, ['fourth']))
<section class="hero-slide-wrapper hero-4">
    <div class="hero-slider">
        <div class="single-slide bg-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="hero-contents">
                            <span>{{ $home?->home_bannerInformation_title ?? "" }}</span>
                                <h1>{{ $home?->home_bannerInformation_heading ?? "" }}</h1>
                                <p>{{ $home?->home_bannerInformation_description ?? "" }}</p>
                                <a href="{{ route('services') }}" class="theme-btn">Service we provide <i class="fas fa-arrow-right"></i></a>
                                <a href="{{ route('about') }}" class="theme-btn minimal-btn">learn more <i class="fas fa-arrow-right"></i></a>
                            </div>
                    </div>
                    <div class="col-lg-6 mt-5 mt-lg-0 col-12 pl-lg-5">
                        <div class="hero-banner">
                            <div class="dot"></div>
                            <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="small-elements"></div>
        </div>
    </div>
</section>
@endif

@if (in_array($default_page->page_name, ['six']))
<section class="hero-wrapper section-padding-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-6">
                <div class="banner-content">
                    <h2 data-aos="fade-up">{{ $home?->home_bannerInformation_heading ?? "" }}</h2>
                    <a data-aos="fade-up" data-aos-delay="100" href="{{ route('contact') }}" class="theme-btn mt-40">Discover More <i class="icon-arrow-right-1"></i></a>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="banner-img">
                    <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" alt>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="dots-element">
        <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" alt>
    </div>
    <div class="banner-element ">
        <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" alt>
    </div>
    <div class="banner-element-2">
        <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" alt>
    </div> --}}
</section>
@endif