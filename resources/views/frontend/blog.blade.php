@extends('frontend.layouts.app')
@section('content')
 
<section class="page-banner-wrap bg-cover" style="background-image: url('{{asset("public/front-assets//img/page-banner.jpg")}}')">
    <div class="banner-text">{{$blog?->heading}}</div>
    <div class="container">
        <div class="row align-items-center"> 
            <div class="col-md-12 col-12">
                <div class="page-heading text-white">
                    <div class="page-title">
                        <h1>{{$blog?->heading}}</h1>
                    </div>
                </div>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$blog?->heading}}</li>
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
                <div class="blog-post-details border-wrap">
                    <div class="single-blog-post post-details">                            
                        <div class="post-content">
                            <!---<div class="post-cat">
                                <a href="#">business</a>
                                <a href="#">it</a>
                            </div>---->
                            <h2>{{$blog->heading}}</h2>
                            <div class="post-meta">
                                <span><i class="fal fa-calendar-alt"></i>{{ $blog->created_at->format('jS F Y') }}</span>
                            </div>
                            <img src="{{ asset('public/storage/files/blogs/' . $blog->photo) }}" alt="" class="w-100">
                            <p>{!! $blog->blog_content !!}</p>
                            </div>
                    </div>
                    <div class="row tag-share-wrap">
                        <div class="col-lg-6 col-12">
                            <!---<h4>Releted Tags</h4>
                            <div class="tagcloud">                                   
                                <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">Technology</a>
                                <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">it</a>
                                <a href="{{ route('getBlog', \Str::slug($blog->heading)) }}">business</a>
                            </div>---->
                        </div>
                        <div class="col-lg-6 col-12 text-lg-right">
                            <h4>Social Share</h4>
                            <div class="social-share">
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>                                    
                            </div>
                        </div>
                        <hr>
                    </div>

                    <div class="related-post-wrap"> 
                        <h3>Releted Post</h3>

                        <div class="row">
                            
                            @if ($relatedBlogs->count() > 0)
                            @foreach ($relatedBlogs as $related)
                            <div class="col-md-6 col-12">
                                <div class="single-related-post">
                                    <div class="featured-thumb bg-cover" style="background-image: url('{{ asset("public/storage/files/blogs/" . $related->photo) }}')"></div>
                                    <div class="post-content">
                                        <div class="post-date"> 
                                            <span><i class="fal fa-calendar-alt"></i>{{ $related->created_at->format('jS F Y') }}</span>
                                        </div>
                                        <h4><a href="{{ route('getBlog', \Str::slug($related->heading)) }}">{{ $related->heading }}</a></h4>
                                        <p>{!! $related->blog_content !!} </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <p>No Releted Blog found.</p>
                            @endif
                        </div>
                    </div>
                    <!-- comments section wrap start -->
                    {{-- <div class="comments-section-wrap pt-40">
                        <div class="comments-heading">
                            <h3>03 Comments</h3>
                        </div>
                        <ul class="comments-item-list">
                            <li class="single-comment-item">
                                <div class="author-img">
                                    <img src="assets/img/blog/author_img.jpg" alt="">
                                </div>
                                <div class="author-info-comment">
                                    <div class="info">
                                        <h5><a href="#">Rosalina Kelian</a></h5>
                                        <span>19th May 2018</span>
                                        <a href="#" class="theme-btn minimal-btn"><i class="fal fa-reply"></i>Reply</a>
                                    </div>
                                    <div class="comment-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna. Ut enim ad minim veniam, quis nostrud  laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="single-comment-item">
                                <div class="author-img">
                                    <img src="assets/img/blog/author2.jpg" alt="">
                                </div>
                                <div class="author-info-comment">
                                    <div class="info">
                                        <h5><a href="#">Arista Williamson</a></h5>
                                        <span>21th Feb 2020</span>
                                        <a href="#" class="theme-btn minimal-btn"><i class="fal fa-reply"></i>Reply</a>
                                    </div>
                                    <div class="comment-text">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                </div>

                                <ul class="replay-comment">
                                    <li class="single-comment-item">
                                        <div class="author-img">
                                            <img src="assets/img/blog/author3.jpg" alt="">
                                        </div>
                                        <div class="author-info-comment">
                                            <div class="info">
                                                <h5><a href="#">Salman Ahmed</a></h5>
                                                <span>29th Jan 2021</span>
                                                <a href="#" class="theme-btn minimal-btn"><i class="fal fa-reply"></i>Reply</a>
                                            </div>
                                            <div class="comment-text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam..</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="comment-form-wrap mt-40">
                        <h3>Post Comment</h3>

                        <form action="#" class="comment-form">
                            <div class="single-form-input">
                                <textarea placeholder="Type your comments...."></textarea>
                            </div>
                            <div class="single-form-input">
                                <input type="text" placeholder="Type your name....">
                            </div>
                            <div class="single-form-input">
                                <input type="email" placeholder="Type your email....">
                            </div>
                            <div class="single-form-input">
                                <input type="text" placeholder="Type your website....">
                            </div>
                            <button class="submit-btn" type="submit"><i class="fal fa-comments"></i>Post Comment</button>
                        </form>
                    </div> --}}
                    
                </div>
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
                                <div class="thumb bg-cover" style="background-image: url('{{ asset('public/storage/files/blogs/' . $popular->photo) }}')">
                                </div>
                                <div class="post-content">
                                    <h5><a href="{{ route('getBlog',\Str::slug($popular->heading)) }}">{{ $popular->heading }}</a></h5>
                                    <div class="post-date">
                                        <i class="far fa-calendar-alt"></i>{{ $popular->created_at->format('jS F Y') }}
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
                                <li><a href="#" onclick="categoryFilter('{{ $category->name }}')">{{ $category->name }} <span>{{ getCountBlog($category->id) }}</span></a></li>
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
                            <a href="{{asset('public/front-assets/img/blog/ip1.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets//img/blog/ip1.jpg")}}')">                                    
                            </a>
                            <a href="{{asset('public/front-assets/img/blog/ip2.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets//img/blog/ip2.jpg")}}')">                                    
                            </a>
                            <a href="{{asset('public/front-assets/img/blog/ip3.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets//img/blog/ip3.jpg")}}')">                                    
                            </a>
                            <a href="{{asset('public/front-assets/img/blog/ip4.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets//img/blog/ip4.jpg")}}')">                                    
                            </a>
                            <a href="{{asset('public/front-assets/img/blog/ip5.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets//img/blog/ip5.jpg")}}')">                                    
                            </a>
                            <a href="{{asset('public/front-assets/img/blog/ip7.jpg')}}" class="single-photo-item bg-cover popup-gallery" style="background-image: url('{{asset("public/front-assets//img/blog/ip7.jpg")}}')">                                    
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
    <div class="container-fluid bg-cover section-bg" style="background-image: url('{{asset("public/front-assets//img/cta_bg1.png")}}')">
        <div class="cta-content">
            <div class="row align-items-center">
                <div class="col-xl-7 text-white col-12 text-center text-xl-left">
                    <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>
                </div>
                <div class="col-xl-5 col-12 text-center text-xl-right">
                    <a href="{{ route('contact') }}" class="theme-btn mt-4 mt-xl-0">Get a quote <i class="fas fa-arrow-right"></i></a>
                    <a href="services-details.html" class="ml-sm-3 mt-4 mt-xl-0 theme-btn minimal-btn">read more <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section> 

@endsection
@section('custom_js')
<script>
  $(".brand-label").change(function(){
        apply_filter();
  });
function categoryFilter(category_name)
{
    var url="{{ route('blogs')}}?";
    //var url="{{ url()->current()}}?";
    url+="&category="+category_name.toString();
    window.location.href=url;

}

  function apply_filter()
  {
   

    var url="{{ url()->current()}}?";

   
   var keyword=$("#search").val();
   if(keyword.length > 0)
   {
     url+="&search="+$("#search").val();
   }
    // Sorting filter
    url+="&sort="+$("#sort").val();

    window.location.href=url;

  }

</script>
@endsection
