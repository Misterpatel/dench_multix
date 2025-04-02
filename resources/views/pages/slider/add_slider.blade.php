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
                                        <h3 class="card-title">Add Slider</h3>
                                        <a href="{{route('slider')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="slider_form" id="slider_form" name="slider_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($sliderData) ? $sliderData->id : '' }}">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Photo <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" id="photo" name="photo"
                                                        accept=".jpg,.jpeg,.png,.gif">
                                                    <small class="form-text text-muted">Only jpg, jpeg, gif, and png are
                                                        allowed</small>
                                                    @if (!empty($sliderData->photo))
                                                    <img src="{{ asset('storage/app/public/files/Slider/' . $sliderData->photo) }}"
                                                        alt="Photo" class="mt-2 img-thumbnail" width="100">
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Heading</label>
                                                    <input type="text" class="form-control" id="heading" name="heading"
                                                        placeholder="Heading"
                                                        value="{{ !empty($sliderData) ? $sliderData->heading : '' }}"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Content</label>
                                                    <textarea class="form-control" id="content" name="content"
                                                        placeholder="Content">{{ !empty($sliderData) ? $sliderData->content : '' }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label">Button1 Text</label>
                                                    <input type="text" class="form-control" id="button1_text"
                                                        name="button1_text" placeholder="Button1 Text"
                                                        value="{{ !empty($sliderData) ? $sliderData->button1_text : '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label">Button1 URL</label>
                                                    <input type="url" class="form-control" id="button1_url"
                                                        name="button1_url" placeholder="Button1 URL"
                                                        value="{{ !empty($sliderData) ? $sliderData->button1_url : '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label">Button2 Text</label>
                                                    <input type="text" class="form-control" id="button2_text"
                                                        name="button2_text" placeholder="Button2 Text"
                                                        value="{{ !empty($sliderData) ? $sliderData->button2_text : '' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label">Button2 URL</label>
                                                    <input type="url" class="form-control" id="button2_url"
                                                        name="button2_url" placeholder="Button2 URL"
                                                        value="{{ !empty($sliderData) ? $sliderData->button2_url : '' }}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="form-label">Position</label>
                                                    <select class="form-control" id="position" name="position">
                                                        <option value="Left"
                                                            {{ !empty($sliderData) && $sliderData->position == 'Left' ? 'selected' : '' }}>
                                                            Left</option>
                                                        <option value="Right"
                                                            {{ !empty($sliderData) && $sliderData->position == 'Right' ? 'selected' : '' }}>
                                                            Right</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="slider_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('slider') }}"
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
    <script src="{{ asset('/public/pages/slider.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
