@extends('frontend.layouts.app')
@section('content')
    <!-- hero section start -->
    @php
        $setting = App\Models\Setting::where('status', '1')->first();
        $home = App\Models\Home::where(['status'=>'1','home_bannerInformation_status'=>'show'])->first();
        $about = App\Models\About::where('status','1')->first();
        $about_banner_image = str_replace('storage/app/public/files/setting/banner/about/', '', $setting->banner_about);
        $feature_banner_image = str_replace('storage/app/public/files/setting/banner/service/', '', $setting->banner_service);
    @endphp
    
@if(in_array($default_page->page_name, ['first']))

@include('frontend.pages.banner_section')
@include('frontend.pages.about_section')
@include('frontend.pages.service_section')
@include('frontend.pages.counting_section')
@include('frontend.pages.faq_section')
@include('frontend.pages.team_section')
@include('frontend.pages.pricing_section')
@include('frontend.pages.testimonial_section')
@include('frontend.pages.blog_section')

@endif

@if(in_array($default_page->page_name, ['second']))

@include('frontend.pages.slider_section')
@include('frontend.pages.feature_section')
@include('frontend.pages.about_section')
@include('frontend.pages.counting_section')
@include('frontend.pages.service_section')
@include('frontend.pages.faq_section')
@include('frontend.pages.team_section')
@include('frontend.pages.consultations_section')
@include('frontend.pages.testimonial_section') 

@endif

@if(in_array($default_page->page_name, ['third']))

@include('frontend.pages.banner_section')
@include('frontend.pages.consultations_section')
@include('frontend.pages.service_section')
@include('frontend.pages.team_section')
@include('frontend.pages.counting_section')
@include('frontend.pages.testimonial_section') 
@include('frontend.pages.pricing_section')
@include('frontend.pages.blog_section')

@endif

@if(in_array($default_page->page_name, ['fourth']))

@include('frontend.pages.banner_section')
@include('frontend.pages.service_section')
@include('frontend.pages.about_section')
@include('frontend.pages.feature_section')
@include('frontend.pages.team_section')
@include('frontend.pages.blog_section')

@endif

@if(in_array($default_page->page_name, ['fivth']))

@include('frontend.pages.slider_section')
@include('frontend.pages.feature_section')
@include('frontend.pages.about_section')
@include('frontend.pages.service_section')
@include('frontend.pages.team_section')
@include('frontend.pages.blog_section')

@endif

@if(in_array($default_page->page_name, ['six']))

@include('frontend.pages.banner_section')
@include('frontend.pages.about_section')
@include('frontend.pages.service_section')
@include('frontend.pages.counting_section')
@include('frontend.pages.consultations_section')
@include('frontend.pages.testimonial_section')
@include('frontend.pages.pricing_section')
@include('frontend.pages.blog_section')

@endif


<!--- Cta Banner --->
<section class="cta-banner">
    <div class="container-fluid bg-cover section-bg" style="background-image: url('assets/img/cta_bg1.png')">
        <div class="cta-content">
            <div class="row align-items-center">
                <div class="col-xl-7 text-white col-12 text-center text-xl-left">
                    <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>
                </div>
                <div class="col-xl-5 col-12 text-center text-xl-right">
                    <a href="{{ route('contact') }}" class="theme-btn mt-4 mt-xl-0">Get a quote <i class="fas fa-arrow-right"></i></a>
                    <a href="{{ route('services') }}" class="ml-sm-3 mt-4 mt-xl-0 theme-btn minimal-btn">read more <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section> 
<!--- Cta Banner End --->
@endsection
@section('custom_js')
<script>
    $('#frontendContactForm').on('submit', function (e) {
    e.preventDefault(); // Prevent default form submission
    let formData = $("#frontendContactForm").serialize();

    $.ajax({
        url: "{{ route('contact.submit') }}",
        type: "POST",
        data: formData,
        success: function (response) {
            if (response.status === "success") { 
                toastr.success(response.message);
                window.location.reload();
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    toastr.error(value[0]); // Show validation errors
                });
            } else {
                toastr.error("An unexpected error occurred.");
            }
        }
    });
});
</script>
@endsection