@extends('layouts.default')
@section('content')
@include('elements.top-css')

<body class="app sidebar-mini ltr light-mode">
    <div class="page">
        <div class="page-main">
            @include('elements.header')
            @include('elements.sidebar')
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">
                        <div class="page-header">
                            <h1 class="page-title">{{$page_title}} </h1>

                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="card-title">Add News</h3>
                                        <a href="{{route('news')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="news_form" id="news_form" name="news_form">
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($newsData) ? $newsData->id : '' }}">

                                            <div class="row">
                                                <!-- News Title -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">News Title <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="news_title"
                                                        name="news_title" placeholder="News Title"
                                                        value="{{ !empty($newsData) ? $newsData->news_title : '' }}"
                                                        required>
                                                </div>

                                                <!-- News Short Content -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">News Short Content <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="news_content_short"
                                                        name="news_content_short" placeholder="Short Content"
                                                        value="{{ !empty($newsData) ? $newsData->news_content_short : '' }}"
                                                        required>
                                                </div>

                                                <!-- News Content -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">News Content <span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control summernote" id="news_content" name="news_content"
                                                        rows="5"
                                                        placeholder="Enter News Content">{{ !empty($newsData) ? $newsData->news_content : '' }}</textarea>
                                                </div>

                                                <!-- News Date -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">News Publish Date <span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="news_date"
                                                        name="news_date"
                                                        value="{{ !empty($newsData) ? $newsData->news_date : '' }}"
                                                        required>
                                                </div>

                                                <!-- Category -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Select Category <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" id="category_id" name="category_id"
                                                        required>
                                                        <option value="">Select a category</option>
                                                        <!-- Add dynamic categories here -->
                                                         @foreach($category as $row)
                                                        <option value="{{$row->id}}"
                                                            {{ !empty($newsData) && $newsData->category_id == 1 ? 'selected' : '' }}>
                                                           {{$row->category_name}}</option>
                                                       @endforeach
                                                    </select>
                                                </div>

                                                <!-- Comment -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Allow Comment</label>
                                                    <select class="form-control" id="comment" name="comment">
                                                        <option value="On"
                                                            {{ !empty($newsData) && $newsData->comment == 'On' ? 'selected' : '' }}>
                                                            On</option>
                                                        <option value="Off"
                                                            {{ !empty($newsData) && $newsData->comment == 'Off' ? 'selected' : '' }}>
                                                            Off</option>
                                                    </select>
                                                </div>

                                                <!-- Featured Photo -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Featured Photo</label>
                                                    <input type="file" class="form-control" id="photo" name="photo">
                                                
                                                    @if (!empty($newsData->photo))
                                                        <img src="{{ asset('storage/files/news/' . $newsData->photo) }}" 
                                                            alt="Banner" 
                                                            class="mt-2 img-thumbnail" 
                                                            width="100">
                                                    @endif
                                                </div>

                                                <!-- Banner -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Banner</label>
                                                    <input type="file" class="form-control" id="banner" name="banner">
                                                
                                                    @if (!empty($newsData->banner))
                                                        <img src="{{ asset('storage/files/news/' . $newsData->banner) }}" 
                                                            alt="Banner" 
                                                            class="mt-2 img-thumbnail" 
                                                            width="100">
                                                    @endif
                                                </div>

                                                <!-- Meta Title -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control" id="meta_title"
                                                        name="meta_title" placeholder="Meta Title"
                                                        value="{{ !empty($newsData) ? $newsData->meta_title : '' }}">
                                                </div>

                                                <!-- Meta Keywords -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Meta Keywords</label>
                                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword"
                                                        rows="3"
                                                        placeholder="Meta Keywords">{{ !empty($newsData) ? $newsData->meta_keyword : '' }}</textarea>
                                                </div>

                                                <!-- Meta Description -->
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Meta Description</label>
                                                    <textarea class="form-control" id="meta_description"
                                                        name="meta_description" rows="3"
                                                        placeholder="Meta Description">{{ !empty($newsData) ? $newsData->meta_description : '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="news_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('news') }}"
                                                    class="btn btn-secondary">Cancel</a>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('elements.sidebar-right')
        @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/public/pages/news.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
