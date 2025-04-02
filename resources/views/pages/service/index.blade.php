@extends('layouts.default')
@section('content')
@include('elements.top-css')
<style>
    i {
        margin-top: 1px;
    }

</style>

<body class="app sidebar-mini ltr light-mode">
    <div class="page">
        <div class="page-main">
            @include('elements.header')
            @include('elements.sidebar')
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">
                        <div class="page-header">
                            <h1 class="page-title">{{$page_title}}   
                                <a href="{{route('add.service')}}" class=" ms-5 btn btn-primary btn-pill btn-sm"> <i
                                class="fe fe-plus me-1"></i>Add Service</a> </h1>
                          
                            <div>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{$page_title}}</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="file-datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">S.no</th>
                                                        <th class="wd-20p border-bottom-0">Photo</th>
                                                        <th class="wd-20p border-bottom-0">Category</th>
                                                        <th class="wd-20p border-bottom-0">Heading</th>
                                                        <!-- <th class="wd-20p border-bottom-0">Content</th>
                                                        <th class="wd-20p border-bottom-0">Meta Title</th>
                                                        <th class="wd-20p border-bottom-0">Meta Keyword</th>
                                                        <th class="wd-20p border-bottom-0">Meta Description</th> -->
                                                        <th class="wd-15p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                </tbody>
                                            </table>
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
    <script src="{{ asset('/public/pages/service.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>
    
</body>
