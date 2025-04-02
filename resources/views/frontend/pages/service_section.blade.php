@if (in_array($default_page->page_name, ['first']))
    <section class="services-wrapper service-1 section-padding section-bg">
        <div class="container">
            <div class="row mb-4 mb-lg-5">
                <div class="col-12 col-lg-12">
                    <div class="section-title text-white text-center">
                        <p>Popular IT services</p>
                        <h1>Our Professional Solutions <br>
                            For IT Business</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (!@empty($services))
                    @foreach ($services as $service)
                        <div class="col-md-6 col-xl-3 col-12">
                            <div class="single-service-item">
                                <div class="icon">
                                    <img src="{{ asset('storage/app/public/files/services/' . $service->photo) }}"
                                        alt="service">
                                </div>
                                <h4>{{ $service->heading }}</h4>
                                <p>{{ \Str::words(strip_tags($service->short_content), 15, '...') }}</p>
                                <a
                                    href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($service->service_category_id)), 'slug' => Str::slug($service->heading, '-')]) }}">learn
                                    more <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endif


@if (in_array($default_page->page_name, ['second']))
    <section class="services-wrapper service-2 section-padding section-bg bg-contain"
        style="background-image: url('assets/img/circle-bg.png')">
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
                @if (!@empty($services))
                    @foreach ($services as $service)
                        <div class="col-md-6 col-xl-4 col-12">
                            <div class="single-service-box">
                                <div class="icon bg-cover"
                                    style="background-image: url('{{ asset('storage/app/public/files/services/' . $service->photo) }}')">
                                </div>
                                <div class="content-visible">
                                    <h4><a
                                            href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($service->service_category_id)), 'slug' => Str::slug($service->heading, '-')]) }}">{{ $service->heading }}</a>
                                    </h4>
                                    <p>{{ \Str::words(strip_tags($service->short_content), 15, '...') }}</p>
                                </div>
                                <div class="content-overlay">
                                    <h4><a
                                            href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($service->service_category_id)), 'slug' => Str::slug($service->heading, '-')]) }}">{{ $service->heading }}</a>
                                    </h4>
                                    <p>{{ \Str::words(strip_tags($service->short_content), 15, '...') }}</p>
                                    <a href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($service->service_category_id)), 'slug' => Str::slug($service->heading, '-')]) }}"
                                        class="read-link">learn more <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endif

@if (in_array($default_page->page_name, ['third']))
    <section class="services-wrapper service-3 section-padding pt-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 text-center">
                    <div class="section-title style-3 mb-40">
                        <span>services</span>
                        <p>popular it services</p>
                        <h1>Solutions For IT Business</h1>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                @if (!@empty($services))
                    @foreach ($services as $service)
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="single-service-card">
                                <div class="service-thumb bg-cover"
                                    style="background-image: url('{{ asset('storage/app/public/files/services/' . $service->photo) }}')">
                                </div>
                                <div class="content">
                                    <div class="icon">
                                        <i class="flaticon-speech-bubble"></i>
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

@if (in_array($default_page->page_name, ['fourth']))
    <section class="cta-wrapper section-bg-2">
        <div class="container">
            <div class="cta-content-banner-4 bg-cover" style="background-image: url('assets/img/cta-bg4.png')">
                <div class="row align-items-center">
                    <div class="col-lg-7 offset-lg-1 text-white text-center text-lg-left">
                        <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>
                    </div>
                    <div class="col-lg-3 text-center text-lg-right mt-3 mt-lg-0">
                        <a href="{{ route('about') }}" class="theme-btn off-white">Get a quote <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-service-wrapper section-bg-2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12 text-center">
                    <div class="section-title mb-30">
                        <p>How can help you</p>
                        <h1>We Provide Best IT Solutions For Business
                            25 Years We Provide Solutions</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (!@empty($services))
                    @foreach ($services as $service)
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="single-service-vcard">
                                <a href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($service->service_category_id)), 'slug' => Str::slug($service->heading, '-')]) }}"
                                    class="link"><i class="fas fa-arrow-right"></i></a>
                                <div class="icon">
                                    <i class="flaticon-monitor"></i>
                                </div>
                                <div class="content">
                                    <h3>{{ $service->heading }}</h3>
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
@if (in_array($default_page->page_name, ['fivth','six']))
<section class="our-service-provide techex-landing-page">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <a class="theme-btn-sm mb-15" data-aos="fade-up">what we Do</a>
                    <h1 data-aos="fade-up" data-aos-delay="100">We Provide Best Solutions For IT Business</h1>
                </div>
            </div>
        </div>

        <div class="row text-center">
            @if (!@empty($services))
            @foreach ($services as $service)
            <div class="col-xl-4 col-md-6 col-12" data-aos="fade-up">
                <div class="single-our-service style-2">
                    <div class="thumb bg-cover" style="background-image: url('{{ asset('storage/app/public/files/services/' . $service->photo) }}')"></div>
                    <div class="content">
                        <div class="icon">
                            <i class="fal fa-envelope"></i>
                        </div>
                        <h3><a href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($service->service_category_id)), 'slug' => Str::slug($service->heading, '-')]) }}">{{ $service->heading }}</a></h3>
                        <p>{{ \Str::words(strip_tags($service->short_content), 15, '...') }}</p>
                        <a href="{{ route('service-details', ['category' => Str::lower(getServiceCategoryName($service->service_category_id)), 'slug' => Str::slug($service->heading, '-')]) }}" class="read-more text-uppercase">read more <i class="icon-arrow-right-1"></i></a>
                    </div>
                </div>
            </div>
 @endforeach
                @endif
        </div>
    </div>
</section>
@endif
