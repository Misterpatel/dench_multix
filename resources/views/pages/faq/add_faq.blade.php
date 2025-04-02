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
                                        <h3 class="card-title">Add FAQ</h3>
                                        <a href="{{route('faq')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="faq_form" id="faq_form" name="faq_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($faqData) ? $faqData->id : '' }}">
                                            <!-- Title Field -->
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Title <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Enter Title"
                                                    value="{{ !empty($faqData) ? $faqData->title : '' }}"
                                                    required>
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label class="form-label">FAQ Content</label>
                                                <textarea name="content" class="form-control summernote"
                                                    required rows="6"
                                                    placeholder="Enter FAQ Content">{{ !empty($faqData) ? $faqData->content : '' }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Show Home Page ?</label>
                                                <select name="show_home" class="form-control">
                                                    <option value="1" {{ !empty($faqData) && ($faqData->show_home==1) ? "selected" : '' }}>Yes</option>
                                                    <option value="0" {{ !empty($faqData) && ($faqData->show_home==0) ? "selected" : '' }}>No</option>
                                                </select>
                                            </div>
                                            
                                            <!-- Submit and Cancel Buttons -->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="faq_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('faq') }}"
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
    <script src="{{ asset('/pages/faq.js') }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>
</body>
