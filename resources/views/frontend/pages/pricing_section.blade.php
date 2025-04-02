@if(in_array($default_page->page_name, ['first','third']))
<section class="our-pricing-wrapper section-bg section-padding" style="display:{{ $meta->home_ptable_status=='show' ? '' : 'none'}}">
    <div class="container">
        <div class="row mb-35">
            <div class="col-12 col-lg-12">
                <div class="section-title text-white text-center"> 
                    <p>{{ $home->home_ptable_title ?? "Our Pricing plan" }} </p>
                    <h1>{{ $home->home_ptable_subtitle ?? "Awesome Pricing Plan" }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if (!@empty($pricings))
             @foreach ($pricings as $pricing)
            <div class="col-xl-4 col-md-6">
                <div class="single-pricing-plan">
                    <h3>{{ $pricing->title }}</h3>
                    <p>{{ $pricing->subtitle }}</p>
                    <div class="pricing">
                        <span>$</span>
                        <h2>{{ $pricing->price }}</h2>
                        <p>monthly</p>
                    </div>
                    <p>{{ $pricing->text }}</p>
                    <div class="buy-btn">
                        <a href="{{ route('contact') }}" class="theme-btn">{{ $pricing->button_text ?? 'Get started' }} <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
              @endforeach
            @endif
        </div>
    </div>
</section> 
@endif

@if (in_array($default_page->page_name, ['six']))
<section class="price__wrapper section-padding-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 col-md-6 offset-md-3 text-center" >
                <div class="section-title section__title_3 mb-30" data-aos="fade-up" data-aos-delay="100">
                    <h6><img src="./assets/img/home5/bage.svg" alt>Pricing Package</h6>
                    <h2>Choose Your Best Plan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if (!@empty($pricings))
            @foreach ($pricings as $pricing)
            <div class="col-sm-12 col-md-6 col-lg-4 mt-30" data-aos="fade-up">
                <div class="price__element">
                    <div class="price__head">
                        <div class="price__range">
                            <span>$</span>
                            <h3>{{ $pricing->price }}</h3>
                            <p>/Per Month</p>
                        </div>
                    </div>
                    <div class="preice__body">
                        <div class="cetagory__element">
                            <h4>Basic</h4>
                            <p>Plan</p>
                        </div>
                        <a href="{{ route('contact') }}" class="theme-btn mb-30">Get Started</a>
                        <p>{{ $pricing->text }}</p>
                    </div>
                </div>
            </div>
 @endforeach
            @endif
        </div>
        
    </div>
    <div class="dots-top-element">
        <img src="./assets/img/home5/vector_03.svg" alt>
    </div>
    <div class="dots-bottom-element">
        <img src="./assets/img/home5/vector_03.svg" alt>
    </div>
</section>
@endif