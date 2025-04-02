@if(in_array($default_page->page_name, ['first','third']))
<section class="blog-section section-padding bg-contain" style="background-image: url('assets/img/blog_bg.png');display:{{ $meta->home_blog_status=='show' ? 'block' : 'none'}}" >
    <div class="container">
        <div class="row mb-30">
            <div class="col-12 col-lg-12">
                <div class="section-title text-center">
                    <p>Latest News & Blog</p>
                    <h1>Get Every Single Updates</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if (!@empty($blogs))
            @foreach ($blogs as $blog)
            <div class="col-xl-4 col-md-6 col-12">
                <div class="single-blog-card">
                    <div class="blog-featured-thumb bg-cover" style="background-image: url('{{asset('storage/app/public/files/blogs/' . $blog->photo) }}')"></div>
                    <div class="content">
                        <div class="post-author">
                            <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}"><i class="fal fa-user-circle"></i> {{ $blog->heading }}</a>
                        </div>
                        <h3><a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">{!! $blog->blog_content !!}</a></h3>
                        <div class="btn-link-share">
                            <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}" class="theme-btn minimal-btn">read more <i class="fas fa-arrow-right"></i></a>
                            <a href="#"><i class="fal fa-share-alt"></i></a>
                        </div>
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
<section class="blog-section section-padding">
    <div class="container">
        <div class="row mb-30">
            <div class="col-12 col-lg-12">
                <div class="section-title text-center">
                    <p>Latest News & Blog</p>
                    <h1>Get Every Single Updates</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if (!@empty($blogs))
            @foreach ($blogs as $blog)
            <div class="col-xl-4 col-md-6 col-12">
                <div class="single-news-card">
                    <div class="blog-featured-thumb bg-cover" style="background-image: url('{{asset('storage/app/public/files/blogs/' . $blog->photo) }}')">
                        <div class="date">
                            <span>{{ $blog->created_at->format('j') }}</span>{{ $blog->created_at->format('F') }}
                        </div>
                    </div>
                    <div class="content">
                        <div class="post-author">
                            <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}"><i class="fal fa-user-circle"></i> {{ $blog->heading }}</a>
                        </div>
                        <h3><a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">{{ $blog->heading }}</a></h3>
                        <p>{!! $blog->blog_content !!}</p>
                        <div class="btn-link-share">
                            <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}" class="theme-btn off-white">read more <i class="fas fa-arrow-right"></i></a>
                        
                        </div>
                    </div>
                </div>
            </div>
 @endforeach
            @endif
        </div>
    </div>
</section> 
    
@endif


@if (in_array($default_page->page_name, ['fivth']))
<section class="blog-section techex-landing-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <a class="theme-btn-sm mb-15" data-aos="fade-up">ARTICLES & TIPES</a>
                    <h1 data-aos="fade-up" data-aos-delay="100">Get Every Single Updates</h1>
                </div>
            </div>
        </div>

        <div class="row">
            @if (!@empty($blogs))
            @foreach ($blogs as $blog)
            <div class="col-xl-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="100">
                <div class="single-blog-card style-3">
                    <div class="blog-featured-thumb bg-cover" style="background-image: url('{{asset('storage/app/public/files/blogs/' . $blog->photo) }}')"></div>
                    <div class="content">
                        <div class="post-top-meta d-flex flex-wrap align-items-center">
                            <div class="post-date">
                                <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}"><i class="fal fa-calendar-alt"></i>{{ $blog->created_at->format('j M Y') }}</a>
                            </div>
                            <div class="post-comment">
                                <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}"><i class="icon-message"></i>02 Comments</a>
                            </div>
                        </div>
                        <h3><a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">{{ $blog->heading }}</a></h3>
                        <div class="excerpt">
                            <p>{!! $blog->blog_content !!}</p>
                        </div>
                        <div class="btn-link-share d-flex justify-content-between align-items-center">
                            <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">read more <i class="icon-arrow-right-1"></i></a>
                            <a href="#"><i class="fal fa-share-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif

@if (in_array($default_page->page_name, ['six']))
<section class="blog-section blog-wrapper section-padding-3 bg-cover bg-center" style="background-image: url('./assets/img/home5/blog_bg_line.svg');">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-6 col-md-6 offset-md-3 text-center">
                <div class="section-title section__title_3 mb-30" data-aos="fade-up" data-aos-delay="100">
                    <h6><img src="./assets/img/home5/bage.svg" alt>ARTICLES & TIPES</h6>
                    <h2>Get Every Single Updates</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @if (!@empty($blogs))
            @foreach ($blogs as $blog)
            <div class="col-xl-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="100">
                <div class="single-blog-card style-3">
                    <div class="blog-featured-thumb bg-cover" style="background-image: url('{{asset('storage/app/public/files/blogs/' . $blog->photo) }}')"></div>
                    <div class="content">
                        <div class="post-top-meta d-flex flex-wrap align-items-center">
                            <div class="post-date">
                                <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}"><i class="fal fa-calendar-alt"></i>{{ $blog->created_at->format('j M Y') }}</a>
                            </div>
                            {{-- <div class="post-comment">
                                <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}"><i class="icon-message"></i>02 Comments</a>
                            </div> --}}
                        </div>
                        <h3><a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">{{ $blog->heading }}</a></h3>
                        <div class="excerpt">
                            <p>{!! $blog->blog_content !!}</p>
                        </div>
                        <div class="btn-link-share d-flex justify-content-between align-items-center">
                            <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">read more <i class="icon-arrow-right-1"></i></a>
                            <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}"><i class="fal fa-share-alt"></i></a>
                        </div>
                    </div>
                    <div class="future-elem">
                        <p>{{ $blog->heading }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endif