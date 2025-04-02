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
                                        <h3 class="card-title">Add Portfolio Category</h3>
                                        <a href="{{route('portfolio.category')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="portfolio_category_form" id="portfolio_category_form" name="portfolio_category_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($portfolioCategoryData) ? $portfolioCategoryData->id : '' }}">

                                            <div class="form-group col-md-12">
                                                <label class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Name"
                                                    value="{{ !empty($portfolioCategoryData) ? $portfolioCategoryData->name : '' }}"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                                <select class="form-control select2" id="status" name="status" required>
                                                    <option value="1" {{ !empty($portfolioCategoryData) && $portfolioCategoryData->status == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ !empty($portfolioCategoryData) && $portfolioCategoryData->status == '0' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                            <button class="btn btn-primary me-2" id="portfolio_category_submit_btn" type="submit">Submit</button>

                                                <a type="button" href="{{ route('portfolio.category') }}"
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
    </div>

    @include('elements.sidebar-right')
    @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/public/pages/portfolio_category.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
