@include('frontend.elements.top_css')

<body>
    @include('frontend.elements.header')
    <div class="clearfix"></div>
        @php
        $settings = App\Models\Setting::where('status','1')->first();
        @endphp
    <section>
        <div class="header-inner two">
            <div class="inner text-center">
                <h4 class="title text-white uppercase roboto-slab">{{!empty($extraPage) ? $extraPage->heading : ''}}</h4>
            </div>
            <div class="overlay bg-opacity-5"></div>
            <img src="{{!empty($settings->banner_service) ? asset($settings->banner_service) : ''}}" alt="" class="img-responsive" />
        </div>
    </section>

    <div class="clearfix"></div>

    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h3 class="uppercase roboto-slab" id="extraPage-title">{{!empty($extraPage) ? $extraPage->heading : ''}}</h3>
                    <div class="title-line-4 stone align-center"></div>
                </div>

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                    <img src="{{!empty($extraPage->photo) ? asset('storage/app/public/files/extra_pages/'.$extraPage->photo) : ''}}" alt="" class="img-responsive" />

                    </div>
                    <div class="col-md-12">
                    <div class="roboto-slab" id="extraPage-content">{!! !empty($extraPage) ? $extraPage->content : '' !!}</div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    @include('frontend.elements.footer')

    </div>
    <!-- end site wraper -->


    <!-- ============ JS FILES ============ -->
    @include('frontend.elements.bottom_js')