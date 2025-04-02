@php
$setting = App\Models\Setting::where('status', '1')->first();
$news = App\Models\Blog::where('status', '1')->limit(1)->get();
$about = App\Models\About::where('status','1')->first();
$socialMedia = App\Models\SocialMedia::where('status','1')->first();
@endphp

<footer class="footer-wrap footer-7 overflow-hidden">
    <div class="footer-widgets">             
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-4 col-12 pr-xl-4">
                    @php
                        $logo=str_replace("storage/app/public/files/setting/logo/","",$setting->logo);
                    @endphp
                    <div class="single-footer-wid site_footer_widget">
                        <div class="footer-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset($setting->logo) }}" alt="logo">
                            </a> 
                        </div>
                        <div class="footer-logo-2">
                            <a href="{{ route('home') }}">  
                                <img src="{{ asset($setting->logo) }}" alt="logo">
                            </a>
                        </div>
                        <p class="mt-4">{{ $setting->newsletter_text }}</p> 
						@php
							$iconClass=[
							   'facebook'=>'fab fa-facebook-f',
							   'twitter'=>'fab fa-twitter',
							   'behance'=>'fab fa-behance',
							   'youtube'=>'fab fa-youtube',
							   'linkedin'=>'fab fa-linkedin-in',
							   'whatsapp'=>'fab fa-whatsapp',
							   'instagram'=>'fab fa-instagram'
							];
						@endphp
                        <div class="social-link mt-30">
						@foreach($iconClass as $key => $class)
							@if(!empty($socialMedia->$key))
								<a href="{{ $socialMedia->$key }}"><i class="{{ $class }}"></i></a>
							@endif
						@endforeach
					    </div>
                    </div>
                </div> <!-- /.col-lg-3 - single-footer-wid -->
                <div class="col-md-6 col-xl-4 col-12">                        
                    <div class="single-footer-wid">
                        <div class="wid-title">
                            <h4>Our Address</h4>
                        </div>
                        <ul class="address">
                            <li><strong>Phone:<a href="tel:{{ $setting->footer_phone }}">{{ $setting->footer_phone }}</a></strong></li>
                            <li><strong>Email:<a href="mailto:{{ $setting->footer_email }}">{{ $setting->footer_email }}</a></strong></li>
                            <li><strong>Address:<a>{{ $setting->footer_address }}</a></strong></li>
                        </ul>
                    </div>
                </div> <!-- /.col-lg-3 - single-footer-wid -->
                <div class="col-md-6 col-xl-3 col-12">                        
                    <div class="single-footer-wid">
                        <div class="wid-title">
                            <h4>Quick Links</h4>
                        </div>
                        <ul>
                            <li><a href="{{ route('about') }}">{{ $setting->footer_col3_title }}</a></li>
                            <li><a href="{{ route('services')}}">{{ $setting->footer_col2_title }}</a></li>
                            <li><a href="{{ route('contact') }}">{{ $setting->footer_col4_title }}</a></li>
                            <li><a href="{{ route('blogs') }}">{{ $setting->footer_col1_title }}t</a></li>
                        </ul>
                    </div>
                </div> <!-- /.col-lg-3 - single-footer-wid -->
                <!----<div class="col-md-6 col-xl-3 col-12">
                    <div class="single-footer-wid recent_post_widget">
                        <div class="wid-title">
                            <h4>Instagram</h4>
                        </div>
                        <div class="instagram-gallery">
                            <a href="{{asset('public/front-assets/img/blog/ip1.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets/img/blog/ip1.jpg")}}')"></a>
                            <a href="{{asset('public/front-assets/img/blog/ip2.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets/img/blog/ip2.jpg")}}')"></a>
                            <a href="{{asset('public/front-assets/img/blog/ip3.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets/img/blog/ip3.jpg")}}')"></a>
                            <a href="{{asset('public/front-assets/img/blog/ip4.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets/img/blog/ip4.jpg")}}')"></a>
                            <a href="{{asset('public/front-assets/img/blog/ip5.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets/img/blog/ip5.jpg")}}')"></a>
                            <a href="{{asset('public/front-assets/img/blog/ip4.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets/img/blog/ip4.jpg")}}')"></a>
                        </div>
                    </div>
                </div>----> <!-- /.col-lg-3 - single-footer-wid -->
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <hr>
            <!----<div class="d-flex align-items-center justify-content-between">--->
            <div class="align-items-center justify-content-between">
                <div class="footer-bottom-content text-center">
                     <a href="{{ route('home') }}">{{ $setting->footer_copyright ?? '' }}</a>
                </div>
                <!---<div class="bootom_right">
                   <a href="#">Terms & Conditions</a > 
                   -
                   <a href="#">Privacy & Terms</a >
                </div>--->
            </div>
        </div>
    </div>
    <div class="fotter_element">
        <img src="{{asset('public/front-assets/img/home7/shape_05.svg')}}" alt>
    </div>
    <div class="fotter_element_2">
        <img src="{{asset('public/front-assets/img/home7/shape_07.svg')}}" alt>
    </div>
</footer>