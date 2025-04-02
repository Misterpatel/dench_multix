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
                                        <h3 class="card-title">Add Service</h3>
                                        <a href="{{route('service')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="service_form" id="service_form" name="service_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($serviceData) ? $serviceData->id : '' }}">
                                            <!-- Title Field -->
                                            <div class="mb-3">
                                                <label for="service_category_id" class="form-label">Select Category</label>
                                                <select class="form-select select2" id="service_category_id" name="service_category_id" required>
                                                    <option value="">Select</option>
                                                    @foreach($categoryData as $row)
                                                    <option value="{{ $row->id }}"
                                                        {{ !empty($serviceData) && is_object($serviceData) && $serviceData->service_category_id == $row->id ? 'selected' : '' }}>
                                                        {{ $row->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <label id="service_category_id-error" class="error" for="service_category_id"></label>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Heading <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="heading" name="heading"
                                                    placeholder="Heading"
                                                    value="{{ !empty($serviceData) ? $serviceData->heading : '' }}"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="photo" class="form-label"> Photo</label>
                                                <input type="file" class="form-control" id="photo" name="photo" />
                                                @if (!empty($serviceData->photo))
                                                <img src="{{ asset('storage/app/public/files/services/' . $serviceData->photo) }}"
                                                    alt="Photo" class="mt-2 img-thumbnail" width="100">
                                                @endif
                                            </div>
											<div class="mb-3">
                                                <label class="form-label">Service Content</label>
                                                <textarea name="short_content" class="form-control"
                                                    required rows="6"
                                                    placeholder="Enter Short Service Content">{{ !empty($serviceData) ? $serviceData->short_content : '' }}</textarea>
                                            </div>
                                            <div class="mb-3">  
                                                <label class="form-label">Service Content</label>
                                                <textarea name="service_content" class="form-control summernote"
                                                    required rows="6"
                                                    placeholder="Enter Service Content">{{ !empty($serviceData) ? $serviceData->service_content : '' }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                    <label for="meta_title" class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control" id="meta_title" name="meta_title" 
                                                        value="{{ $serviceData->meta_title ?? '' }}" 
                                                        placeholder="Enter meta title" />
                                                </div>

                                                <!-- Meta Keyword -->
                                                <div class="mb-3">
                                                    <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword" 
                                                        placeholder="Enter meta keywords">
                                                        {{ $serviceData->meta_keyword ?? '' }}
                                                    </textarea>
                                                </div>

                                                <!-- Meta Description -->
                                                <div class="mb-3">
                                                    <label for="meta_description" class="form-label">Meta Description</label>
                                                    <textarea class="form-control" id="meta_description" name="meta_description" 
                                                        placeholder="Enter meta description">
                                                        {{ $serviceData->meta_description ?? '' }}
                                                    </textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="meta_slug" class="form-label">Meta Slug</label>
                                                    <input type="text" class="form-control metaslug" id="{{ !empty($serviceData->meta_slug) ? 'slug' : 'meta_slug' }}" name="meta_slug" 
                                                        value="{{ $serviceData->meta_slug ?? '' }}" 
                                                        placeholder="Enter meta Slug"/>
                                                </div>
                                          
                                            <!-- Submit and Cancel Buttons -->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="service_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('service') }}"
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
    <script src="{{ asset('/public/pages/service.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>
    <script>
        $(document).ready(function () {
            $("#meta_title").on("keyup", function () {
                let slug = $(this).val()
                    .toLowerCase()           // Lowercase karega
                    .replace(/[^a-z0-9\s]/g, "")  // Special characters hatayega
                    .replace(/\s+/g, "-");    // Spaces ko hyphen me convert karega
                
                $("#meta_slug").val(slug);
            });
        });
    </script>
</body>
