@if(in_array($default_page->page_name, ['first']))
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
@endif


@if (in_array($default_page->page_name, ['second','third']))
<section class="testimonial-wrapper pt-50 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="testimonial-carousel-2 owl-carousel owl-theme">
                    @if ($testimonials->count() > 0)
                    @foreach ($testimonials as $testimonial)
                    <div class="single-testimonial active">
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
@endif

@if (in_array($default_page->page_name, ['six']))
<section class="agent__wrapper section-padding-3 bg-center bg-cover" style="background-image: url(./assets/img/home5/bg_01.png);">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="section-title section__title_3 mb-30" data-aos="fade-up" data-aos-delay="100">
                    <h6><img src="./assets/img/home5/bage.svg" alt>Testimonials</h6>
                    <h2>What people say About Techex</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="agent-element owl-carousel mt-30">
                    @if ($testimonials->count() > 0)
                    @foreach ($testimonials as $testimonial)
                    <div class="agent-item">
                        <div class="agent-content d-flex align-items-center">
                            <div class="agent-img bg-center bg-cover" style="background-image: url('{{asset("storage/app/public/files/testimonial/".$testimonial->photo)}}');"></div>
                            <div class="agent-content_name">
                                <h4>{{ $testimonial->name }}</h4>
                                <p>{{ $testimonial->designation }}</p>
                            </div>
                        </div>
                        <p>{{ $testimonial->comment }}</p>
                        <div class="quera">
                            <img src="{{ asset('front-assets/img/home5/quote.svg') }}" alt>
                        </div>
                        <div class="agent-logo">
                            <img src="{{ asset('front-assets/img/home5/co_01.svg') }}" alt>
                        </div>
                    </div>
@endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif