<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">

        <div class="side-header">
        @php
		   
            $setting = App\Models\Setting::where('status','1')->first();
			
            @endphp 
            @if($setting->logo)
            <a class="header-brand1" href="{{route('dashboard')}}">
                <img src="{{ asset($setting->logo) }}" class="header-brand-img desktop-logo" alt="logo"
                    style="width:100%; height:70px;">
                <img src="{{ asset($setting->logo) }}" class="header-brand-img toggle-logo" alt="logo"
                    style="width:100%; height:70px;">
                <img src="{{ asset($setting->logo) }}" class="header-brand-img light-logo" alt="logo"
                    style="width:100%; height:70px;">
                <img src="{{ asset($setting->logo) }}" class="header-brand-img light-logo1" alt="logo"
                    style="width:100%; height:70px;">
            </a> 
            @else
            <img src="{{asset('/images/no_logo.png')}}" class="header-brand-img desktop-logo" alt="logo"
                    style="width:100%; height:70px;">
                <img src="{{asset('/images/no_logo.png')}}" class="header-brand-img toggle-logo" alt="logo"
                    style="width:100%; height:70px;">
                <img src="{{asset('/images/no_logo.png')}}" class="header-brand-img light-logo" alt="logo"
                    style="width:100%; height:70px;">
                <img src="{{asset('/images/no_logo.png')}}" class="header-brand-img light-logo1" alt="logo"
                    style="width:100%; height:70px;">
            </a>
            @endif
        </div>
		
		@php
		 $menus = App\Models\Menu::where('status', "1")
					->where('parent_id', 0)
					->with(['children' => function ($query) {
						$query->where('status', "1");
					}])
					->get();
		 $user =Auth::user();
		@endphp
		
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                
				
			
			@foreach($menus as $menu)
			@if($user->role==1 || in_array($menu->id,explode(',',$user->menus)))
			@if($menu->children->count() > 0)
				<!-- Parent Menu with Child Menus -->
				<li class="slide">
					<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
						<i class="side-menu__icon fe fe-slack"></i>
						<span class="side-menu__label">{{ $menu->name }}</span>
						<i class="angle fe fe-chevron-right"></i>
					</a>
					<ul class="slide-menu">
						<li class="side-menu-label1"><a href="javascript:void(0)">{{ $menu->name }}</a></li>
						@foreach($menu->children as $child)
							<li><a href="{{ route($child->link) }}" class="slide-item"> {{ $child->name }}</a></li>
						@endforeach
					</ul>
				</li> 
			@else
				<!-- Single Menu Item (No Children) -->
				<li class="slide">
					<a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route($menu->link)}}">
						<i class="side-menu__icon fe fe-aperture"></i>
						<span class="side-menu__label">{{ $menu->name }}</span>
					</a>
				</li>
			@endif
			
			 
			@endif
		@endforeach



				
				
             <!-----   <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('dashboard')}}"><i
                            class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('setting')}}"><i
                            class="side-menu__icon fe fe-aperture"></i><span class="side-menu__label">Settings</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('defalut_home')}}"><i
                            class="side-menu__icon fe fe-aperture"></i><span class="side-menu__label">Default Home page</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Blogs</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Blogs</a></li>
                        <li><a href="{{route('blog.category')}}" class="slide-item"> Category</a></li>
                        <li><a href="{{route('blog')}}" class="slide-item"> Blogs</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Services</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Services</a></li>
                        <li><a href="{{route('service.category')}}" class="slide-item"> Category</a></li>
                        <li><a href="{{route('service')}}" class="slide-item"> Services</a></li>
                    </ul>
                </li>
				
				----->
				
				
				
				
                 <!----<li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('slider')}}"><i
                            class="side-menu__icon fe fe-image"></i><span class="side-menu__label">Slider</span></a>
                </li> 
               <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('faq')}}"><i
                            class="side-menu__icon fe fe-image"></i><span class="side-menu__label">FAQ</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('feature')}}"><i
                            class="side-menu__icon fe fe-image"></i><span class="side-menu__label">Feature Service</span></a>
                </li>----->
                <!----<li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('page.section')}}"><i
                            class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Pages</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('team.member')}}"><i
                            class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Team Members</span></a>
                </li>
              
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('testimonial')}}"><i
                            class="side-menu__icon fe fe-user-plus"></i><span class="side-menu__label">Testimonial</span></a>
                </li>---->
                
				
				
				
				
				
				
				
				
				
				
				
				
              
			  <!---<li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Page Content</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{route('page.section')}}" class="slide-item"> Pages</a></li>
                        <li><a href="{{route('slider')}}" class="slide-item"> Slider</a></li>
                        <li><a href="{{route('faq')}}" class="slide-item"> FAQ</a></li>
                        <li><a href="{{route('feature')}}" class="slide-item"> Feature Service</a></li>
                        <li><a href="{{route('team.member')}}" class="slide-item"> Team Members</a></li>
                       <li><a href="{{route('testimonial')}}" class="slide-item"> Testimonial</a></li>
                        <li><a href="{{route('pricing')}}" class="slide-item"> Pricing Table</a></li>
                        <li><a href="{{route('photogallery')}}" class="slide-item"> Our partners Gallery</a></li>
                    </ul>
                </li>
			  
                
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('socialmedia')}}"><i
                            class="side-menu__icon fe fe-link"></i><span class="side-menu__label">Social Media Links</span></a>
                </li>---->
				
				
				
				
				
				
				
				
				
				
				
				
				
                
                <!----<li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('pricing')}}"><i
                            class="side-menu__icon fa fa-cube"></i><span class="side-menu__label">Pricing Table</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Portfolio</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Portfolio</a></li>
                        <li><a href="{{route('portfolio.category')}}" class="slide-item"> Portfolio Category</a></li>
                        <li><a href="{{route('portfolio')}}" class="slide-item"> Portfolio</a></li>
                    </ul>
                </li>--->
				
				
				
				
				
				@if($user->role==1)
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('menus')}}"><i
                            class="side-menu__icon fe fe-list"></i><span class="side-menu__label">Menus</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('users')}}"><i
                            class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Users</span></a>
                </li>
				@endif
				
				
				
				
				
				 <!---<li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('user.contacts.show')}}"><i
                            class="side-menu__icon fe fe-user"></i><span class="side-menu__label">Contacts</span></a>
                </li>
               <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('extrapage')}}"><i
                            class="side-menu__icon fe fe-list"></i><span class="side-menu__label">Extra Page</span></a>
                </li>---->
				
				
			
				
				
            </ul> 
            
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>


    </div>
</div>
