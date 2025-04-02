@if (in_array($default_page->page_name, ['second']))
    <section class="features-wrapper features-2 section-padding"
        style="display:{{ $home->home_storyAspire_status == 'show' ? '' : 'none' }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-xl-6">
                    <div class="row mtm-30">
                        @if ($services->isNotEmpty())
                            @foreach ($services as $serviceItems)
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="icon-box">
                                        <div class="icon">
                                            <i class="flaticon flaticon-monitor"></i>
                                        </div>
                                        <h4><a
                                                href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($serviceItems->service_category_id)), 'slug' => Str::slug($serviceItems->heading, '-')]) }}">{{ $serviceItems->heading }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-12 col-xl-5 offset-xl-1 mt-5 mt-xl-0">
                    <div class="section-title">
                        <p>How can help you</p>
                        <h1>{{ $home->home_storyAspire_heading }}</h1>
                    </div>
                    <p class="mt-20">{{ $home->home_storyAspire_description }}</p>
                    <a href="{{ route('about') }}" class="theme-btn mt-30">Learn more <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <svg class="feature-bg">
            <path fill-rule="evenodd" opacity="0.039" fill="rgb(8, 106, 215)"
                d="M-0.000,232.999 C-0.000,232.999 239.131,-52.566 575.000,47.000 C910.869,146.565 1087.000,55.653 1231.000,19.999 C1375.000,-15.654 1800.820,-31.520 1915.000,232.999 C1445.000,232.999 -0.000,232.999 -0.000,232.999 Z" />
        </svg>
    </section>
@endif

@if (in_array($default_page->page_name, ['fourth']))
    <section class="our-service-provide section-bg text-white section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12 text-center">
                    <div class="section-title mb-30">
                        <p>How can help you</p>
                        <h1>We Provide Awesome Solutions To <br>
                            Growth Your Business</h1>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="single-our-service">
                        <div class="thumb bg-cover" style="background-image: url('assets/img/home4/s1.jpg')"></div>
                        <div class="content">
                            <div class="icon">
                                <i class="flaticon-monitor"></i>
                            </div>
                            <h3><a href="services-details.html">Web Development</a></h3>
                            <p>Quis autem veleum reprehenderit quin volupta esse quam</p>
                        </div>
                    </div>
                </div>
                @if (!@empty($services))
                    @foreach ($services as $service)
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="single-our-service">
                                <div class="thumb bg-cover"
                                    style="background-image: url('{{ asset('storage/app/public/files/services/' . $service->photo) }}')">
                                </div>
                                <div class="content">
                                    <div class="icon">
                                        <i class="flaticon-pyramid"></i>
                                    </div>
                                    <h3><a
                                            href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($service->service_category_id)), 'slug' => Str::slug($service->heading, '-')]) }}">{{ $service->heading }}</a>
                                    </h3>
                                    <p>{{ \Str::words(strip_tags($service->short_content), 15, '...') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endif


@if (in_array($default_page->page_name, ['fivth']))
<section class="we-provide-solutions">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <a class="theme-btn-sm mb-15" data-aos="fade-up">HOW CAN HELP YOU</a>
                    <h1 data-aos="fade-up" data-aos-delay="100">We Provide Best IT Solutions For Business 25 Years We Provide Solutions</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if ($feature_services->count() > 0)
            @foreach ($feature_services as $feature_service)
            <div class="col-12 col-md-6 col-xl-3" data-aos="fade-up">
                <a href="{{ route('contact') }}" class="single-provide-solutions" style="background-image: url('{{asset('public/storage/files/Feature/' . $feature_service->icon) }}')">
                    <div class="number">
                        {{ $feature_service->id }}
                    </div>
                    <div class="content"> 
                        <h3>{{ $feature_service->name }}</h3>
                        <p>{{ \Str::words(strip_tags($feature_service->content), 15, '...') }}</p>
                        <span class="read-more text-uppercase">read more <i class="icon-arrow-right-1"></i></span>
                    </div>
                </a>
            </div>
 @endforeach
            @endif
        </div>
    </div>
</section>
@endif