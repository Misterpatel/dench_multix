@php
$setting = App\Models\Setting::where('status', '1')->first();
$news = App\Models\Blog::where('status', '1')->limit(1)->get();
$about = App\Models\About::where('status','1')->first();

@endphp

<section class="section-fulldark sec-padding">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-3 clearfix">
                <div class="item-holder">
                    <h4 class="uppercase footer-title less-mar3 roboto-slab">{{ $setting->footer_col1_title ?? '' }}
                    </h4>
                    <div class="footer-title-bottomstrip"></div>
                    <div class="clearfix"></div>
                    @if(!empty($news))
                    @foreach($news as $row)
                    @php
                    $user = App\Models\User::where('id', $row->created_by)->first();
                    $imagePath = $row->photo ? asset('storage/app/public/files/blog/' . $row->photo) : '';
                    @endphp
                    <div class="image-left"><img src="{{ $imagePath }}" alt="" width="60px" height="60px" /></div>
                    <div class="text-box-right">
                        <h6 class="text-white less-mar3 nopadding roboto-slab nopadding"><a
                                href="#">{{$row->heading}}</a></h6>
                        <div>{!! !empty($row) ? Illuminate\Support\Str::words($row->blog_content, 4, '...') : '' !!}
                        </div>
                        <div class="footer-post-info"><span>By {{$user->first_name}} {{$user->last_name}}</span><span>
                                May 20</span></div>
                    </div>
                    <a href="{{route('blog')}}" class="read-more stone white"><i class="fa fa-angle-double-right"></i>
                        Read more</a>

                    <div class="divider-line solid dark margin"></div>
                    @endforeach
                    @endif

                </div>
            </div> -->
            <div class="col-md-4 clearfix">
                <div class="item-holder">
                    <h4 class="uppercase footer-title less-mar3 roboto-slab">{{ $setting->footer_col3_title ?? '' }}
                    </h4>
                    <div class="clearfix"></div>
                    <div class="footer-title-bottomstrip"></div>
                    <div class="newsletter">
                        <div>{!! !empty($about) ? Illuminate\Support\Str::words($about->about_content, 10, '...') : ''
                            !!}</div>
                        <br />
                        <a href="{{route('contact')}}" class="read-more stone white"><i
                                class="fa fa-angle-double-right"></i> Read more</a>

                        <!-- <form method="get" action="index.html">
                            <input class="email_input dark" name="samplees" id="samplees" value="E-mail Address" onFocus="if(this.value == 'E-mail Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'E-mail Address';}" type="text">
                            <input name="submit" value="Go" class="input_submit dark" type="submit"/>
                        </form> -->
                    </div>

                    <div class="margin-top3"></div>
                    @php
                    $socialMedia = DB::table('social_media')->where('status', '1')->first();
                    @endphp
                    <ul class="social-icons-3 dark-2">
                    @php
                    $icons = [
                    'facebook' => 'fa-facebook',
                    'twitter' => 'fa-twitter',
                    'linkedin' => 'fa-linkedin',
                    'google_plus' => 'fa-google-plus',
                    'pinterest' => 'fa-pinterest',
                    'youtube' => 'fa-youtube',
                    'instagram' => 'fa-instagram',
                    'tumblr' => 'fa-tumblr',
                    'flickr' => 'fa-flickr',
                    'reddit' => 'fa-reddit',
                    'snapchat' => 'fa-snapchat',
                    'whatsapp' => 'fa-whatsapp',
                    'quora' => 'fa-quora'
                    ];
                    @endphp
                    @foreach($icons as $key => $icon)
                    @if(!empty($socialMedia->$key))
                    <li>
                        <a href="{{ $socialMedia->$key }}" target="_blank">
                            <i class="fa {{ $icon }}"></i> {{-- Font Awesome Icon --}}
                        </a>
                    </li>
                    @endif
                    @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 clearfix">
                <h4 class="uppercase footer-title less-mar3 roboto-slab">{{ $setting->footer_col2_title ?? '' }}</h4>
                <div class="clearfix"></div>
                <div class="footer-title-bottomstrip"></div>
                <ul class="usefull-links">
                    @php
                    $services = App\Models\Service::where('status', '1')->get();
                    @endphp
                    @foreach($services as $service)
                    <li><a href="{{ route('getService', Str::slug(strtolower($service->heading))) }}"><i
                                class="fa fa-angle-right"></i> {{ !empty($service) ? $service->heading : '' }}</a></li>
                    @endforeach
                </ul>
            </div>

          
            @php
            $contact = App\Models\Contact::where('status','1')->first();
            @endphp
            <div class="col-md-4 clearfix">
                <div class="item-holder">
                    <h4 class="uppercase footer-title less-mar3 roboto-slab">{{ $setting->footer_col4_title ?? '' }}
                    </h4>
                    <div class="clearfix"></div>
                    <div class="footer-title-bottomstrip"></div>
                    <p> Address: {{!empty($contact) ? $contact->contact_address : ''}}</p>
                    <p> Email: {{!empty($contact) ? $contact->contact_email : ''}}</p>
                    <p>Telephone: {{!empty($contact) ? $contact->contact_phone : ''}}</p>
                    <br />
                    <a href="{{route('contact')}}" class="read-more stone white"><i
                            class="fa fa-angle-double-right"></i> Read more</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Copyright Section -->
<section class="section-copyrights sec-moreless-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>{{ $setting->footer_copyright ?? '' }}</span>
            </div>
        </div>
    </div>
</section>

<a href="#" class="scrollup stone"></a>
