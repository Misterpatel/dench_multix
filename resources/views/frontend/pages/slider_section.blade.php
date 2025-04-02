<!----- Slider Section Home Second----->
@if(in_array($default_page->page_name, ['second']))
<section class="hero-slide-wrapper hero-2">
    <div class="hero-text">Techex</div>
    <div class="hero-slider-2 owl-carousel">
        @if (!empty($sliders))
        @foreach ($sliders as $slider)
        <div class="single-slide bg-cover" style="background-image: url('storage/files/Slider/'.$slider->photo)">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-10 col-xl-8">
                        <div class="hero-contents">
                            <h1>{{ $slider->heading ?? 'IT Solutions For Grow jj Your Business.' }}</h1>
                            <p>{{ $slider->content ?? 'We Have 25 Years Of Experience ff In IT Solutions' }}</p>
                            <a href="{{ route('services') }}" class="theme-btn">{{ $slider->button1_text ?? 'Service we provide' }} <i class="fas fa-arrow-right"></i></a>
                            <a href="{{ route('about') }}" class="theme-btn minimal-btn">{{ $slider->button2_text ?? 'learn more' }} <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>
 @endif
<!----- Slider Section Home Second End ----->

@if (in_array($default_page->page_name, ['fivth']))
<section class="hero-slide-wrapper techex-landing-page">
    <div class="hero-slider-active-2 owl-carousel owl-theme">
        @if (!empty($sliders))
        @foreach ($sliders as $slider)
        <div class="single-slide bg-cover" style="background-image: url('assets/img/techex-landing-page/hero-bg-1.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-contents text-center">
                            <a class="theme-btn-sm" data-animation="fadeInUp" data-delay="0">we are creative it service agency</a>
                            <h1 data-animation="fadeInUp" data-delay="0.4s">{{ $slider->heading }}</h1>
                            <div data-animation="fadeInUp" data-delay="0.6s">
                                <p>{{ $slider->content }}</p>
                            </div>
                            
                            <div class="btn__wrapper d-flex flex-wrap justify-content-center" data-animation="fadeInUp" data-delay="0.8s">
                                <a href="{{ route('services') }}" class="theme-btn">{{ $slider->button1_text ?? 'Service we provide' }} <i class="icon-arrow-right-1"></i></a>
                                <a href="{{ route('about') }}" class="theme-btn">{{ $slider->button2_text ?? 'learn more' }}<i class="icon-arrow-right-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 @endforeach
        @endif
    </div>
</section>
@endif