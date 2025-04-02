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
                                        <h3 class="card-title">{{ $page_title }}</h3>
                                        <a href="{{route('feature')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="feature_form" id="feature_form" name="feature_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($featureData) ? $featureData->id : '' }}">
                                            <!-- Title Field -->
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Title"
                                                    value="{{ !empty($featureData) ? $featureData->name : '' }}"
                                                    required>
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label class="form-label">Content</label>
                                                <textarea name="content" class="form-control summernote"
                                                    required rows="6"
                                                    placeholder="Enter Content">{{ !empty($featureData) ? $featureData->content : '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="form-label">Icon <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="icon" name="icon"
                                                    accept=".jpg,.jpeg,.png,.gif">
                                                <small class="form-text text-muted">Only jpg, jpeg, gif, and png are
                                                    allowed</small>
                                                @if (!empty($featureData->icon))
                                                <img src="{{ asset('public/storage/files/Feature/' . $featureData->icon) }}"
                                                    alt="Icon" class="mt-2 img-thumbnail" width="100">
                                                @endif
                                            </div>
                                          
                                            
                                            <!-- Submit and Cancel Buttons -->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="feature_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('feature') }}"
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
    <script src="{{ asset('/pages/feature.js') }}"></script>
    <script src="{{ asset('/pages/custom.js?v='.time()) }}"></script>
</body>
