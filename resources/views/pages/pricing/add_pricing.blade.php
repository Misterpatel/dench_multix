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
                                        <h3 class="card-title">Add Pricing</h3>
                                        <a href="{{route('pricing')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="pricing_form" id="pricing_form" name="pricing_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($pricingData) ? $pricingData->id : '' }}">

                                            <!-- Icon Field -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Icon <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="icon" name="icon"
                                                    placeholder="Icon"
                                                    value="{{ !empty($pricingData) ? $pricingData->icon : '' }}"
                                                    required>
                                            </div>

                                            <!-- Title Field -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Title <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="Title"
                                                    value="{{ !empty($pricingData) ? $pricingData->title : '' }}"
                                                    required>
                                            </div>

                                            <!-- Price Field -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Price <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="price" name="price"
                                                    placeholder="Price"
                                                    value="{{ !empty($pricingData) ? $pricingData->price : '' }}"
                                                    required>
                                            </div>

                                            <!-- Subtitle Field -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Subtitle <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="subtitle" name="subtitle"
                                                    placeholder="Subtitle"
                                                    value="{{ !empty($pricingData) ? $pricingData->subtitle : '' }}"
                                                    required>
                                            </div>

                                            <!-- Text Field -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Text <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" id="text" name="text" rows="4"
                                                    placeholder="Enter detailed text">{{ !empty($pricingData) ? $pricingData->text : '' }}</textarea>
                                            </div>

                                            <!-- Button Text Field -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Button Text <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="button_text"
                                                    name="button_text" placeholder="Button Text"
                                                    value="{{ !empty($pricingData) ? $pricingData->button_text : '' }}"
                                                    required>
                                            </div>

                                            <!-- Button URL Field -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Button URL <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="button_url"
                                                    name="button_url" placeholder="Button URL"
                                                    value="{{ !empty($pricingData) ? $pricingData->button_url : '' }}"
                                                    required>
                                            </div>

                                            <!-- Submit and Cancel Buttons -->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="pricing_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('pricing') }}"
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
    <script src="{{ asset('/public/pages/pricing.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
