@if(in_array($default_page->page_name, ['second']))

<section class="faq-section section-padding">
    <div class="faq-bg bg-cover d-none d-lg-block" style="background-image: url('assets/img/faq_home_2.jpg')"></div>
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
                                <div class="card-header" id="faq{{ $faq->id }}">
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
@endif