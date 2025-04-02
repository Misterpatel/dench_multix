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
                                        <h3 class="card-title">Add Testimonial</h3>
                                        <a href="{{route('testimonial')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="testimonial_form" id="testimonial_form" name="testimonial_form"
                                            novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($testimonialData) ? $testimonialData->id : '' }}">
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Testimonial Name"
                                                    value="{{ !empty($testimonialData) ? $testimonialData->name : '' }}"
                                                    required>
                                            </div>

                                            <!-- Designation -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Designation <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="designation"
                                                    name="designation" placeholder="Designation"
                                                    value="{{ !empty($testimonialData) ? $testimonialData->designation : '' }}"
                                                    required>
                                            </div>

                                            <!-- Photo Upload -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Photo</label>
                                                <input type="file" class="form-control" id="photo" name="photo"
                                                    accept=".jpg,.jpeg,.png,.gif">
                                                @if (!empty($testimonialData->photo))
                                                <img src="{{ asset('storage/files/testimonial/' . $testimonialData->photo) }}"
                                                    alt="Banner" class="mt-2 img-thumbnail" width="100">
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Comment</label>
                                                <textarea class="form-control" id="comment"
                                                    name="comment" rows="3"
                                                    placeholder="Comment">{{ !empty($testimonialData) ? $testimonialData->comment : '' }}</textarea>
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="testimonial_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('team.member') }}"
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
    <script src="{{ asset('/public/pages/testimonial.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
