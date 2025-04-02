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
                                        <h3 class="card-title">Add Category</h3>
                                        <a href="{{route('category')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="category_form" id="category_form" name="category_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($categoryData) ? $categoryData->id : '' }}">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Category Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="category_name"
                                                        name="category_name" placeholder="Category Name"
                                                        value="{{ !empty($categoryData) ? $categoryData->category_name : '' }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Banner</label>
                                                    <input type="file" class="form-control" id="category_banner" name="category_banner" accept=".jpg,.jpeg,.png,.gif">
                                                    <small class="form-text text-muted">Only jpg, jpeg, gif, and png are allowed</small>

                                                    @if (!empty($categoryData->category_banner))
                                                        <img src="{{ asset('storage/files/Category/Banners/' . $categoryData->category_banner) }}" 
                                                            alt="Banner" 
                                                            class="mt-2 img-thumbnail" 
                                                            width="100">
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control" id="meta_title"
                                                        name="meta_title" placeholder="Meta Title"
                                                        value="{{ !empty($categoryData) ? $categoryData->meta_title : '' }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Meta Keywords</label>
                                                    <input type="text" class="form-control" id="meta_keyword"
                                                        name="meta_keyword" placeholder="Meta Keywords"
                                                        value="{{ !empty($categoryData) ? $categoryData->meta_keyword : '' }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Meta Description</label>
                                                    <textarea class="form-control" id="meta_description"
                                                        name="meta_description" rows="3"
                                                        placeholder="Meta Description">{{ !empty($categoryData) ? $categoryData->meta_description : '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="category_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('category') }}"
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
    <script src="{{ asset('/public/pages/category.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
