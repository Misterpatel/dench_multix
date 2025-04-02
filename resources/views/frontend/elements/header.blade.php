<div class="site_wrapper">
    <div class="topbar light topbar-padding">
        <div class="container">
            <div class="topbar-left-items">
                @php
                $setting = App\Models\Setting::where('status','1')->first();
                $socialMedia = DB::table('social_media')->where('status', '1')->first();
                @endphp
                <ul class="toplist toppadding pull-left paddtop1">
                    <li class="rightl"><i class="fa fa-envelope"
                            style="margin-right: 4px;"></i>{{!empty($setting->top_bar_email) ? $setting->top_bar_email : ''}}</li>

                    <li><i class="fa fa-phone" style="margin-right: 4px;"></i>{{!empty($setting->top_bar_phone) ? $setting->top_bar_phone : ''}}</li>
                </ul>
            </div>
            <!--end left-->

            <div class="topbar-right-items pull-right">
                <ul class="toplist toppadding">
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
                    <li><a href="{{route('login')}}" class="consult-btn">Admin</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div id="header">
        <div class="container">
            <div class="navbar stone navbar-default yamm">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid"
                        class="navbar-toggle two three"><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span></button>
                    <a href="{{route('home')}}" class="navbar-brand"><img src="{{!empty($setting->logo) ? asset($setting->logo) : ''}}" alt="logo"
                            width="150px" height="60px" /></a> </div>
                <div id="navbar-collapse-grid" class="navbar-collapse collapse pull-right">
                    <ul class="nav stone navbar-nav">
                        <li><a href="{{route('home')}}" class="dropdown-toggle active">Home</a></li>
                        <li><a href="{{route('about')}}" class="dropdown-toggle">About</a></li>
                        @php 
                            $extraPage = App\Models\ExtraPage::where('status', '1')->get();
                        @endphp
                        @foreach($extraPage as $row)
                            <li>
                                <a href="{{ route('extraPage', Str::slug(strtolower($row->heading))) }}" class="dropdown-toggle">
                                    {{ $row->heading }}
                                </a>
                            </li>
                        @endforeach

                        @php
                            use Illuminate\Support\Str;
                            $serviceCategory = App\Models\ServiceCategory::where('status', '1')->get();
                        @endphp

                        @foreach($serviceCategory as $row)
                            @php
                                $services = App\Models\Service::where('service_category_id', $row->id)->where('status', '1')->get();
                            @endphp

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle">{{ $row->name }}</a>
                                <ul class="dropdown-menu five" role="menu">
                                    @foreach($services as $service) 
                                        <li>
                                            <a href="{{ route('getService', Str::slug(strtolower($service->heading))) }}" class="service-link">
                                                {{ $service->heading }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                      
                        @php
                            use App\Models\BlogCategory;
                            use App\Models\Blog;

                            $blogCategories = BlogCategory::where('status', '1')->get();
                            $blogsWithoutCategory = Blog::whereNull('blog_category_id')->where('status', '1')->get();
                        @endphp

                        @foreach($blogCategories as $row)
                            @php
                                $blogs = Blog::where('blog_category_id', $row->id)->where('status', '1')->get();
                            @endphp
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle">{{ $row->name }}</a>
                                <ul class="dropdown-menu five" role="menu">
                                    @foreach($blogs as $blog) 
                                        <li>
                                            <a href="{{ route('getBlog', Str::slug(strtolower($blog->heading))) }}" class="blog-link">
                                                {{ $blog->heading }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                        @if($blogsWithoutCategory->isNotEmpty())
                            <li>
                                <a href="{{ route('blogs') }}" class="dropdown-toggle">Blogs</a>
                            </li>
                        @endif

                        <li><a href="{{route('contact')}}" class="dropdown-toggle">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
