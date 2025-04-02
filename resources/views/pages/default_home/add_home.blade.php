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
                                        <a href="{{route('defalut_home')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="default_home_form" id="default_home_form" name="default_home_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($defaultHome_datas) ? $defaultHome_datas->id : '' }}">
                                            <!-- Title Field -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Page Name</label>
                                                <select class="form-control" id="page_name" name="page_name" required>
                                                    <option value="first"
                                                        {{ !empty($defaultHome_datas) && $defaultHome_datas->page_name == 'first' ? 'selected' : '' }}>
                                                        First</option>
                                                    <option value="second"
                                                        {{ !empty($defaultHome_datas) && $defaultHome_datas->page_name == 'second' ? 'selected' : '' }}>
                                                        Second</option>
                                                        <option value="third"
                                                        {{ !empty($defaultHome_datas) && $defaultHome_datas->page_name == 'third' ? 'selected' : '' }}>
                                                        Third</option>
                                                        <option value="fourth"
                                                        {{ !empty($defaultHome_datas) && $defaultHome_datas->page_name == 'fourth' ? 'selected' : '' }}>
                                                        Fourth</option>
                                                        <option value="fivth"
                                                        {{ !empty($defaultHome_datas) && $defaultHome_datas->page_name == 'fivth' ? 'selected' : '' }}>
                                                        Fivth</option>
                                                        <option value="six"
                                                        {{ !empty($defaultHome_datas) && $defaultHome_datas->page_name == 'six' ? 'selected' : '' }}>
                                                        Six</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="form-label">Image <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="photo" name="photo"
                                                    accept=".jpg,.jpeg,.png,.gif">
                                                <small class="form-text text-muted">Only jpg, jpeg, gif, and png are
                                                    allowed</small>
                                                @if (!empty($defaultHome_datas->photo))
                                                <img src="{{ asset('/storage/files/default_home/' . $defaultHome_datas->photo) }}"
                                                    alt="Icon" class="mt-2 img-thumbnail" width="100">
                                                @endif
                                            </div>
                                            {{-- <div class="form-group col-md-12">
                                                <label class="form-label">Home Page</label>
                                                <select class="form-control" id="defalut_page" name="defalut_page">
                                                    <option value="show"
                                                        {{ !empty($defaultHome_datas) && $defaultHome_datas->defalut_page == 'show' ? 'selected' : '' }}>
                                                        Show</option>
                                                    <option value="hide"
                                                        {{ !empty($defaultHome_datas) && $defaultHome_datas->defalut_page == 'hide' ? 'selected' : '' }}>
                                                        Hide</option>
                                                </select>
                                            </div> --}}
                                            
                                            <!-- Submit and Cancel Buttons -->
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="default_home_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('defalut_home') }}"
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
    <script src="{{ asset('/pages/default_home.js') }}"></script>
    <script src="{{ asset('/pages/custom.js?v='.time()) }}"></script>
</body>
