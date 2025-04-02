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
                            <h1 class="page-title">{{$page_title}}</h1>
                            <div>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <form novalidate="novalidate" class="update_password_form" name="update_password_form"
                                    id="update_password_form">
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title mb-1">New Password</h4>
                                    </div>
                                    <div class="card-body mt-1">
                                        <div class="mb-1">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="reset-password-new">Old Password</label>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input name="old_password" type="password" class="form-control"
                                                    id="old_password" placeholder="Old Password"
                                                    title="Enter Old Password">
                                            </div>
                                            <label id="old_password-error" class="error" for="old_password"></label>
                                        </div>
                                        <div class="mb-1">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="reset-password-new">New Password</label>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input name="password" type="password" class="form-control"
                                                    id="password" placeholder="New Password" title="Enter New Password">
                                            </div>
                                            <label id="password-error" class="error" for="password"></label>
                                        </div>
                                        <div class="mb-2">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="reset-password-confirm">Confirm
                                                    Password</label>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input name="password_confirmation" type="password" class="form-control"
                                                    id="password_confirmation" placeholder="Confirm New Password"
                                                    title="Enter Confirm Password">
                                            </div>
                                            <label id="password_confirmation-error" class="error"
                                                for="password_confirmation"></label>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <a type="button" class="btn btn-primary" id="submit_password_btn"
                                                onclick="submit_password()">Submit</a>
                                        </div>
                                    </div>
                                </form>

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
    <script src="{{ asset('/public/pages/user.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
