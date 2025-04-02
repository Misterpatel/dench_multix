@if(in_array($default_page->page_name, ['first','second']))
    <section class="about-us-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 pr-lg-5 order-2 order-lg-1 mt-5 mt-lg-0">
                    <div class="section-title mb-30">
                        <p>About Company</p>
                        <h1>Get’s IT Solutions For <br>
                            Expert Consultants</h1>
                    </div>

                    <p class="pr-5">{{ \Str::words(strip_tags($about?->about_content),100,'......') ?? "" }}</p>
                    
                    {{-- <div class="about-icon-box">
                        <div class="icon">
                            <i class="fal fa-users"></i>
                        </div>
                        <div class="content">
                            <h3>Professinoal Consultants</h3>
                            <p>Quis autem vel eum iure reprehenderit 
                                quin voluptate velit esse quam</p>
                        </div>
                    </div> --}}
                </div>

                <div class="col-lg-6 pl-lg-5 col-12 order-1 order-lg-2">
                    <span class="dot-circle"></span>
                    <div class="about-us-img" style="background-image: url('{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}')">
                    </div>
                    <span class="triangle-bottom-right"></span>
                </div>
            </div>
        </div>
    </section> 
@endif     

@if(in_array($default_page->page_name, ['fourth']))
<section class="about-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-12 text-center text-xl-left">
                <div class="about-img clip-path">
                    <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" alt="">
                </div>
            </div>
            <div class="col-12 text-center text-xl-left col-xl-6 mt-5 mt-xl-0 pl-xl-5">
                <div class="section-title mb-30">
                    <p>About Company</p>
                    <h1>25 Years Of Experience <br> In IT Solutions</h1>
                </div>
                <p>{{ \Str::words(strip_tags($about?->about_content),100,'......') ?? "" }}</p>
                <a href="{{ route('about') }}" class="theme-btn black mt-4">learn more <i class="fas fa-arrow-right"></i></a>

                {{-- <div class="row text-center">
                    <div class="col-sm-6 col-12">
                        <div class="icon-box-item">
                            <div class="icon">
                                <i class="flaticon-speech-bubble"></i>
                            </div>
                            <h4><a href="services-details.html">IT Consultancy</a></h4>
                            <p>Faster Smart Solutions</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="icon-box-item">
                            <div class="icon">
                                <i class="flaticon-unlock"></i>
                            </div>
                            <h4><a href="services-details.html">Cyber Security</a></h4>
                            <p>Faster Smart Solutions</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="circle-shape d-none d-sm-block">
        <img src="{{asset('storage/files/setting/banner/about/' . $about_banner_image) }}" alt="">
    </div>
</section>
@endif


@if (in_array($default_page->page_name, ['fivth']))
<section class="about-wrapper techex-landing-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-img" data-aos="fade-right">
                    <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" class="img-fluid" alt="">

                    <div class="video-play-btn" data-aos="fade-up" data-aos-delay="100">
                        <a href="https://www.youtube.com/watch?v=E1xkXZs0cAQ" class="play-video popup-video"><i class="fas fa-play"></i></a>                     
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="section-title">
                    <a class="theme-btn-sm mb-15" data-aos="fade-left">ABOUT COMPANY</a>
                    <h1 data-aos="fade-left" data-aos-delay="100">25 Years Of Experience In IT Solutions</h1>
                    <div data-aos="fade-left" data-aos-delay="150">
                        <p>{{ \Str::words(strip_tags($about?->about_content),100,'......') ?? "" }}</p>
                    </div>

                    {{-- <div class="rate-content-grid d-flex justify-content-between">
                        <div class="single-rate-item" data-aos="fade-up">
                            <h3>320</h3>
                            <p>Active Status Clients</p>
                        </div>
                        <div class="single-rate-item" data-aos="fade-up" data-aos-delay="100">
                            <h3>850</h3>
                            <p>Successful Projects</p>
                        </div>
                        <div class="single-rate-item" data-aos="fade-up" data-aos-delay="150">
                            <h3>35</h3>
                            <p>In-House Engineers</p>
                        </div> 
                    </div> --}}

                    <a href="#" class="theme-btn black" data-aos="fade-up" data-aos-delay="200">Know us more <i class="icon-arrow-right-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


@if (in_array($default_page->page_name, ['six']))
<section class="about-wrapper">
    <div class="container">
        <div class="row position-relative">
            <div class="col-md-12 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="about-img">
                    <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" alt>
                </div>
                <div class="img-element">
                    <img src="{{asset('storage/app/public/files/setting/banner/about/' . $about_banner_image) }}" alt>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 mt-30" data-aos="fade-up" data-aos-delay="100">
                <div class="section-title section__title_3 mb-30">
                    <h6><img src="./assets/img/home5/bage.svg" alt>What we do</h6>
                    <h2>Digital data consulting for your Business Growth</h2>
                </div>
                <div class="about-content">
                    <p>{{ \Str::words(strip_tags($about?->about_content),100,'......') ?? "" }}</p>
                    {{-- <div class="text">
                        <p>In Database Optimized Algorithms</p>
                    </div>
                    <div class="text">
                        <p>Access any data Flexible and easily</p>
                    </div> --}}
                    <a href="#" class="theme-btn mt-40">Know us more <i class="icon-arrow-right-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="dots-element">
        <img src="./assets/img/home5/dots_02.svg" alt>
    </div>
</section>
@endif