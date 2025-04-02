@extends('frontend.layouts.app')
@section('content')

    <section class="page-banner-wrap bg-cover" style="background-image: url('{{asset("public/front-assets/img/page-banner.jpg")}}')">
        <div class="banner-text">Blog</div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <div class="page-heading text-white">
                        <div class="page-title">
                            <h1>Blogs</h1>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">blog</li>
                        </ol>
                    </nav> 
                </div>
            </div>
        </div>
    </section>

    <section class="blog-wrapper news-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="blog-posts">
                        @if ($blogs->count() > 0)
                            @foreach ($blogs as $blog)
                                @php
                                    $user = App\Models\User::where('id', $blog->created_by)->first();
                                @endphp
                                <div class="single-blog-post">
                                    <div class="post-featured-thumb bg-cover"
                                        style="background-image: url('{{ asset('public/storage/files/blogs/' . $blog->photo) }}')">
                                    </div>
                                    <div class="post-content">
                                        <h2><a
                                                href="{{ route('getBlog', \Str::slug($blog->heading)) }}">{{ $blog->heading }}</a>
                                        </h2>
                                        <div class="post-meta">
                                            <span><i
                                                    class="fal fa-calendar-alt"></i>{{ $blog->created_at->format('jS F Y') }}</span>
                                        </div>
                                        <p>{!! $blog->blog_content !!}</p>
                                        <div class="d-flex justify-content-between align-items-center mt-30">
                                            <div class="author-info">
                                                <div class="author-img"
                                                    style="background-image: url('{{ asset('public/storage/files/blogs/' . $blog->photo) }}')">
                                                </div>
                                                <h5><a href="#">By {{ $user->first_name }} {{ $user->last_name }}</a>
                                                </h5>
                                            </div>
                                            <div class="post-link">
                                                <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}"><i
                                                        class="fal fa-arrow-right"></i> Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No blogs found.</p>
                        @endif
                        {{-- <div class="single-blog-post format-video video-post">
                        <div class="post-featured-thumb bg-cover" style="background-image: url('{{asset("public/front-assets/img/blog/b3.jpg")}}')">
                            <div class="video-play-btn">
                                <a href="https://www.youtube.com/watch?v=E1xkXZs0cAQ" class="play-video popup-video"><i class="fas fa-play"></i></a>                     
                            </div>
                        </div>
                        <div class="post-content">
                            <h2><a href="news-details.html">Beyond Tools How Building A Design System 
                                Can Improve How You Work</a></h2>
                            <div class="post-meta">
                                <span><i class="fal fa-eye"></i>232 Views</span>
                                <span><i class="fal fa-comments"></i>35 Comments</span>
                                <span><i class="fal fa-calendar-alt"></i>12th May 2020</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid unt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh enderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <div class="d-flex justify-content-between align-items-center mt-30">
                                <div class="author-info">
                                    <div class="author-img" style="background-image: url('{{asset("public/front-assets/img/blog/author_img.jpg")}}')"></div>
                                    <h5><a href="#">by Hetmayar</a></h5>
                                </div>
                                <div class="post-link">
                                    <a href="news-details.html"><i class="fal fa-arrow-right"></i> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                        {{-- <div class="single-blog-post quote-post format-quote">
                        <div class="post-content text-white bg-cover">
                            <div class="quote-content">
                                <div class="icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="quote-text">
                                    <h2>Excepteur sint occaecat cupida tat non proident, sunt in.</h2>
                                    <div class="post-meta">
                                        <span><i class="fal fa-eye"></i>232 Views</span>
                                        <span><i class="fal fa-comments"></i>35 Comments</span>
                                        <span><i class="fal fa-calendar-alt"></i>24th March 2019</span>
                                    </div>
                                </div>
                            </div>                                                                
                        </div>
                    </div> --}}
                    </div>
                    <div class="page-nav-wrap mt-60 ">
                        {{ $blogs->links() }}
                    </div> <!-- /.col-12 col-lg-12 -->
                </div>
                <div class="col-12 col-lg-4">
                    <div class="main-sidebar">
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h3>Popular Blog</h3>
                            </div>
                            <div class="popular-posts">

                                @if ($popularBlogs->count() > 0)
                                    @foreach ($popularBlogs as $popular)
                                        <div class="single-post-item">
                                            <div class="thumb bg-cover"
                                                style="background-image: url('{{ asset('public/storage/files/blogs/' . $popular->photo) }}')">
                                            </div>
                                            <div class="post-content">
                                                <h5><a
                                                        href="{{ route('getBlog', \Str::slug($popular->heading)) }}">{{ $popular->heading }}</a>
                                                </h5>
                                                <div class="post-date">
                                                    <i
                                                        class="far fa-calendar-alt"></i>{{ $popular->created_at->format('jS F Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No blogs found.</p>
                                @endif
                            </div>
                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widget_categories">
                                <ul>
                                    @if ($blogCategory->count() > 0)
                                        @foreach ($blogCategory as $category)
                                            <li><a href="#" onclick="categoryFilter('{{ $category->name }}')">{{ $category->name }}
                                                    <span>{{ getCountBlog($category->id) }}</span></a></li>
                                        @endforeach
                                    @else
                                        <p>No blog categries found.</p>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="single-sidebar-widget">
                            <div class="wid-title"> 
                                <h3>Never Miss News</h3>
                            </div>
                            <div class="social-link">
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        {{-- <div class="single-sidebar-widget instagram-widget">
                            <div class="wid-title">
                                <h3>Instagram Feeds</h3>
                            </div>
                            <div class="instagram-gallery">
                                <a href="assets/img/blog/ip1.jpg" class="single-photo-item bg-cover popup-gallery"
                                    style="background-image: url('{{asset("public/front-assets/img/blog/ip1.jpg")}}')">
                                </a>
                                <a href="assets/img/blog/ip2.jpg" class="single-photo-item bg-cover popup-gallery"
                                    style="background-image: url('{{asset("public/front-assets/img/blog/ip2.jpg")}}')">
                                </a>
                                <a href="assets/img/blog/ip3.jpg" class="single-photo-item bg-cover popup-gallery"
                                    style="background-image: url('{{asset("public/front-assets/img/blog/ip3.jpg")}}')">
                                </a>
                                <a href="assets/img/blog/ip4.jpg" class="single-photo-item bg-cover popup-gallery"
                                    style="background-image: url('{{asset("public/front-assets/img/blog/ip4.jpg")}}')">
                                </a>
                                <a href="assets/img/blog/ip5.jpg" class="single-photo-item bg-cover popup-gallery"
                                    style="background-image: url('{{asset("public/front-assets/img/blog/ip5.jpg")}}')">
                                </a>
                                <a href="assets/img/blog/ip7.jpg" class="single-photo-item bg-cover popup-gallery"
                                    style="background-image: url('{{asset("public/front-assets/img/blog/ip7.jpg")}}')">
                                </a>
                            </div>
                        </div> 
                        <div class="single-sidebar-widget">
                            <div class="wid-title">
                                <h3>Popular Tags</h3>
                            </div>
                            <div class="tagcloud">
                                <a href="#">event</a>
                                <a href="#">help</a>
                                <a href="#">ux</a>
                                <a href="#">food</a>
                                <a href="#">ui</a>
                                <a href="#">water</a>
                                <a href="#">charity</a>
                                <a href="#">donate</a>
                            </div>
                        </div>--}}
                        <div class="sidebar-ad-widget">
                            <div class="ad-wraper">
                                <a href="#" target="_blank">
                                    <img src="assets/img/blog/blog-ad.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cta-banner">
        <div class="container-fluid bg-cover section-bg" style="background-image: url('{{asset("public/front-assets/img/cta_bg1.png")}}')">
            <div class="cta-content">
                <div class="row align-items-center">
                    <div class="col-xl-7 text-white col-12 text-center text-xl-left">
                        <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>
                    </div>
                    <div class="col-xl-5 col-12 text-center text-xl-right">
                        <a href="{{ route('contact') }}" class="theme-btn mt-4 mt-xl-0">Get a quote <i
                                class="fas fa-arrow-right"></i></a>
                        <a href="{{ route('services') }}" class="ml-sm-3 mt-4 mt-xl-0 theme-btn minimal-btn">read more <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('custom_js')
    <script>
        function categoryFilter(category_name) {
            var url="{{ url()->current() }}?";
            url += "&category=" + category_name.toString();
            window.location.href = url;

        }
    </script>
@endsection
