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
                                        <h3 class="card-title">Add Service Category</h3>
                                        <a href="{{route('service.category')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="service_category_form" id="service_category_form" name="service_category_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($categoryData) ? $categoryData->id : '' }}">
                                            <!-- Title Field -->
                                            <div class="mb-3">
                                                <label class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Name"
                                                    value="{{ !empty($categoryData) ? $categoryData->name : '' }}"
                                                    required>
                                            </div>
                                         
                                            <!-- Submit and Cancel Buttons -->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="service_category_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('service.category') }}"
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
    <script src="{{ asset('/public/pages/service_category.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
