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
                                        <h3 class="card-title">Add Photo Gallery</h3>
                                        <a href="{{route('photogallery')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="photogallery_form" id="photogallery_form" name="photogallery_form"
                                            novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($photogalleryData) ? $photogalleryData->id : '' }}">
                                            
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Photo</label>
                                                <input type="file" class="form-control" id="photo" name="photo"
                                                    accept=".jpg,.jpeg,.png,.gif">
                                                @if (!empty($photogalleryData->photo))
                                                <img src="{{ asset('storage/app/public/files/photogallery/' . $photogalleryData->photo) }}"
                                                    alt="Banner" class="mt-2 img-thumbnail" width="100">
                                                @endif
                                            </div>
                                            
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="photogallery_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('photogallery') }}"
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
    <script src="{{ asset('/public/pages/photogallery.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
