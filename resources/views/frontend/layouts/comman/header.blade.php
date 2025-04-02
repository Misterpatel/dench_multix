  <!-- Header Start -->
  @php
  $setting = App\Models\Setting::where('status', '1')->first();
  $services = App\Models\Service::with('service_category')->where('status', '1')->get()->groupBy('service_category.name');
  $blogs = App\Models\Blog::with('blog_category')->where('status', '1')->get()->groupBy('blog_category.name');
  $logo=str_replace("storage/app/public/files/setting/logo/","",$setting->logo);
   
@endphp
  <header class="header-wrap header-6">
    <div class="main-header-wraper">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div class="header-logo">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset($setting->logo) }}" alt="logo">
                        </a>
                    </div>
                    <div class="logo-2">
                        <a href="{{ route('home') }}">
                            <img src="{{asset($setting->logo) }}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="header-menu d-none d-xl-block">
                    <div class="main-menu">
                        <ul>
						    <li><a href="{{route('home')}}">Home</a> </li>
                            <!---<li class="active"><a href="{{ route('home') }}">Home <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('home') }}">home 1</a></li>
                                    <li><a href="{{ route('home') }}">home 2</a></li>
                                    <li><a href="{{ route('home') }}l">home 3</a></li>
                                    <li><a href="{{ route('home') }}">home 4</a></li>
                                    <li><a href="{{ route('home') }}">home 5</a></li>
                                    <li><a href="{{ route('home') }}">home 6</a></li>
                                    <li><a href="{{ route('home') }}">home 7</a></li>
                                </ul>
                            </li>---->
                            <li><a href="{{route('about')}}">About</a> </li>
							@if($services->isNotEmpty())
								@foreach($services as $category => $serviceItems)
									<li>
										<a href="{{ route('services') }}">{{ $category }} <i class="fas fa-angle-down"></i></a>
										<ul class="sub-menu">
											@foreach($serviceItems as $service)
												<li>
													<a href="{{ route('service-details', ['category'=>Str::lower($category),'slug' => Str::slug($service->heading, '-')]) }}">
														{{ $service->heading }}
													</a>
												</li>
											@endforeach
										</ul>
									</li>
								@endforeach
							@endif

							<!----@if($blogs->isNotEmpty())
								@foreach($blogs as $category => $blogItems)
									<li>
										<a href="{{ route('blogs') }}">{{ $category }} <i class="fas fa-angle-down"></i></a>
										<ul class="sub-menu">
											@foreach($blogItems as $blog)
												<li>
													<a href="{{ route('service-details', ['category'=>Str::lower($category),'slug' => Str::slug($blog->heading, '-')]) }}">
														{{ $blog->heading }}
													</a>
												</li>
											@endforeach
										</ul>
									</li>
								@endforeach
							@endif---->

							<li><a href="{{route('blogs')}}">Blog</a></li>
                            <!----<li><a href="{{ route('blogs') }}">Blog <i class="fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('blogs') }}">Blog</a></li>
                                    <li><a href="#">Blog Details</a></li>
                                </ul>
                            </li>--->
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-right d-flex align-items-center">
                    <div class="header-btn-cta">
                        <a href="{{route('contact')}}" class="theme-btn style-1">GET A DEMO<i class="icon-arrow-right-1"></i></a>
                    </div>
                    <div class="mobile-nav-bar d-block ml-3 ml-sm-4 d-xl-none">
                        <div class="mobile-nav-wrap">                    
                            <div id="hamburger">
                                <i class="fal fa-bars"></i>
                            </div>
                            <!-- mobile menu - responsive menu  -->
                            <div class="mobile-nav">
                                <button type="button" class="close-nav">
                                    <i class="fal fa-times-circle"></i>
                                </button>
                                <nav class="sidebar-nav">
                                    <ul class="metismenu" id="mobile-menu">
									<li><a href="{{route('home')}}">Home</a> </li>
                                        <!---<li><a class="has-arrow" href="#">Homes</a>
                                            <ul class="sub-menu">
                                                <li><a href="index.html">home 1</a></li>
                                                <li><a href="index-2.html">home 2</a></li>
                                                <li><a href="index-3.html">home 3</a></li>
                                                <li><a href="index-4.html">home 4</a></li>
                                                <li><a href="index-5.html">home 5</a></li>
                                                <li><a href="index-6.html">home 6</a></li>
                                                <li><a href="index-7.html">home 7</a></li>
                                            </ul>
                                        </li>--->
                                        <li><a href="{{route('about')}}">about</a></li>
									
										@if($services->isNotEmpty())
												@foreach($services as $category => $serviceItems)
													<li>
														<a href="{{ route('services') }}">{{ $category }} <i class="fas fa-angle-down"></i></a>
														<ul class="sub-menu">
															@foreach($serviceItems as $service)
																<li>
																	<a href="{{ route('service-details', ['category'=>Str::lower($category),'slug' => Str::slug($service->heading, '-')]) }}">
																		{{ $service->heading }}
																	</a>
																</li>
															@endforeach
														</ul>
													</li>
												@endforeach
											@endif

							<li><a href="{{route('blogs')}}">Blog</a></li>
                                        <!---<li><a href="{{ route('blogs') }}">Blog <i class="fas fa-angle-down"></i></a>
											<ul class="sub-menu">
												<li><a href="{{ route('blogs') }}">">Blog</a></li>  
												<li><a href="#">Blog Details</a></li>
											</ul>
										</li>---->
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                    </ul> 
                                </nav>
    
                                <div class="action-bar">
                                    <a href="{{route('contact')}}" class="theme-btn style-1">GET A DEMO<i class="icon-arrow-right-1"></i></a>
                                </div>
                            </div>                            
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Header End -->