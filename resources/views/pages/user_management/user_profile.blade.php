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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="panel panel-primary">
                                            <div class="tab-menu-heading tab-menu-heading-boxed">
                                                <div class="tabs-menu-boxed">
                                                    <ul class="nav panel-tabs">
                                                        <li><a href="#tab25" class="active" data-bs-toggle="tab"> <i
                                                                    class="fe fe-user me-2"></i> User Profile</a></li>
                                                        <li><a href="#tab26" data-bs-toggle="tab"><i
                                                                    class="fa fa-address-card-o me-2"></i> My Business
                                                                Card</a></li>
                                                        <li><a href="#tab27" data-bs-toggle="tab"><i
                                                                    class="fa fa-key me-2"></i> Change Password</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab25">
                                                        <form class="update_user_profile" id="update_user_profile"
                                                            name="update_user_profile">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="row border-bottom border-top">
                                                                        <div class="col-md-6 border-right">
                                                                            <label for="card-title"
                                                                                class="heading"><span class="mt-4">Basic
                                                                                    Info</span></label>

                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="first_name">First Name
                                                                                        <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control alpha"
                                                                                        id="first_name"
                                                                                        name="first_name"
                                                                                        placeholder="First Name"
                                                                                        required
                                                                                        value="{{!empty($userData) ? $userData->first_name : ''}}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="last_name">Last Name
                                                                                        <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control alpha"
                                                                                        id="last_name" name="last_name"
                                                                                        placeholder="Last Name" required
                                                                                        value="{{!empty($userData) ? $userData->last_name : ''}}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label
                                                                                        for="organization">Organization
                                                                                        <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="organization"
                                                                                        name="organization"
                                                                                        placeholder="Organization"
                                                                                        value="{{ !empty($userData) && !empty($userData->organizationData) ? $userData->organizationData->organization_name : '' }}">

                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label
                                                                                        for="designation">Designation</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="designation"
                                                                                        name="designation"
                                                                                        placeholder="Designation"
                                                                                        value="{{ !empty($userData) ? $userData->designation : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="website">Website</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="website" name="website"
                                                                                        placeholder="Website"
                                                                                        value="{{ !empty($userData) ? $userData->website : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="card-title"
                                                                                class="heading"><span
                                                                                    class="mt-4">Contact
                                                                                    Info</span></label>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="email">Email <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="email"
                                                                                        class="form-control" id="email"
                                                                                        name="email" placeholder="Email"
                                                                                        required disabled
                                                                                        value="{{ !empty($userData) ? $userData->email : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="mobile_no">Mobile
                                                                                        No <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control numbers"
                                                                                        id="mobile_no" name="mobile_no"
                                                                                        placeholder="Mobile No"
                                                                                        value="{{ !empty($userData) ? $userData->mobile_no : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="telephone_direct">Direct
                                                                                        Telephone</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="telephone_direct"
                                                                                        name="telephone_direct"
                                                                                        placeholder="Direct Telephone"
                                                                                        value="{{ !empty($userData) ? $userData->telephone_direct : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="telephone_office">Office
                                                                                        Telephone</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="telephone_office"
                                                                                        name="telephone_office"
                                                                                        placeholder="Office Telephone"
                                                                                        value="{{ !empty($userData) ? $userData->telephone_office : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6 border-right">
                                                                            <label for="card-title"
                                                                                class="heading"><span
                                                                                    class="mt-4">Address
                                                                                    Info</span></label>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label
                                                                                        for="address_line_one">Address
                                                                                        Line
                                                                                        1</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="address_line_one"
                                                                                        name="address_line_one"
                                                                                        placeholder="Address Line 1"
                                                                                        value="{{ !empty($userData) ? $userData->address_line_one : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label
                                                                                        for="address_line_two">Address
                                                                                        Line
                                                                                        2</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="address_line_two"
                                                                                        name="address_line_two"
                                                                                        placeholder="Address Line 2"
                                                                                        value="{{ !empty($userData) ? $userData->address_line_two : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="city">City</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="city"
                                                                                        name="city" placeholder="City"
                                                                                        value="{{ !empty($userData) ? $userData->city : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="state">State</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="state"
                                                                                        name="state" placeholder="State"
                                                                                        value="{{ !empty($userData) ? $userData->state : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="country">Country <span
                                                                                            class="text-danger">*</span></label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="country" name="country"
                                                                                        placeholder="Country"
                                                                                        value="{{ !empty($userData) ? $userData->country : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="zip">Zip</label>
                                                                                    <input type="text"
                                                                                        class="form-control numbers" id="zip"
                                                                                        name="zip" placeholder="Zip"
                                                                                        value="{{ !empty($userData) ? $userData->zip : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label for="card-title"
                                                                                class="heading"><span
                                                                                    class="mt-4">Social
                                                                                    Info</span></label>
                                                                            <div class="row">
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="facebook_url">Facebook
                                                                                        URL</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="facebook_url"
                                                                                        name="facebook_url"
                                                                                        placeholder="Facebook URL"
                                                                                        value="{{ !empty($userData) ? $userData->facebook_url : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="twitter_url">Twitter
                                                                                        URL</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="twitter_url"
                                                                                        name="twitter_url"
                                                                                        placeholder="Twitter URL"
                                                                                        value="{{ !empty($userData) ? $userData->twitter_url : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="linkedin_url">LinkedIn
                                                                                        URL</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="linkedin_url"
                                                                                        name="linkedin_url"
                                                                                        placeholder="LinkedIn URL"
                                                                                        value="{{ !empty($userData) ? $userData->linkedin_url : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="instagram_url">Instagram
                                                                                        URL</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="instagram_url"
                                                                                        name="instagram_url"
                                                                                        placeholder="Instagram URL"
                                                                                        value="{{ !empty($userData) ? $userData->instagram_url : '' }}">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label for="personal_url">Personal
                                                                                        URL</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="personal_url"
                                                                                        name="personal_url"
                                                                                        placeholder="Personal URL"
                                                                                        value="{{ !empty($userData) ? $userData->personal_url : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               
                                                                <div class="card-footer d-flex justify-content-center">
                                                                    <button class="btn btn-primary me-2"
                                                                        id="update_user_submit_btn"
                                                                        type="submit">Submit</button>
                                                                </div>
                                                                @if($control_type == 1)
                                                                @endif
                                                            </div>

                                                        </form>
                                                        <div class="col-md-6">
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-green-1"
                                                                    id="progress-bar" style="width: 0%;">0%</div>
                                                            </div>
                                                            <label for="card-title" id="profile-progress-label">
                                                                Your Profile is 0% complete.</label>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab26">
                                                        <div class="col-md-8">
                                                            <div class="card border p-0">
                                                                <div class="card-body text-center">
                                                                    <h2 class="h4 mb-0 mt-3">{{$userData->first_name}}
                                                                    </h2>
                                                                    <h4 class="h4 mb-0 mt-3">{{$userData->first_name}}
                                                                        {{$userData->last_name}} </h4>
                                                                    <p class="card-text mt-4">{{$userData->email}} <br>
                                                                        Tel(M) :
                                                                        {{$userData->mobile_no}} <br> Direct :
                                                                        {{$userData->telephone_direct}} | Office :
                                                                        {{$userData->telephone_office}} <br>
                                                                        {{$userData->city}} {{$userData->state}}
                                                                        {{$userData->country}} - {{$userData->zip}}</p>
                                                                    <div class="row text-end">
                                                                        <div class="row user-social-detail">
                                                                            <div
                                                                                class="social-profile me-4 rounded text-center">
                                                                                <a href="{{$userData->facebook_url}}"
                                                                                    target="_blank"><i
                                                                                        class="fa fa-facebook "
                                                                                        style="margin-top: 9px;"></i></a>
                                                                            </div>
                                                                            <div
                                                                                class="social-profile me-4 rounded text-center">
                                                                                <a href="{{$userData->twitter_url}}"
                                                                                    target="_blank"><i
                                                                                        class="fa fa-twitter"
                                                                                        style="margin-top: 9px;"></i></a>
                                                                            </div>
                                                                            <div
                                                                                class="social-profile me-4 rounded text-center">
                                                                                <a href="{{$userData->linkedin_url}}"
                                                                                    target="_blank"><i
                                                                                        class="fa fa-linkedin"
                                                                                        style="margin-top: 9px;"></i></a>
                                                                            </div>
                                                                            <div
                                                                                class="social-profile me-4 rounded text-center">
                                                                                <a href="{{$userData->instagram_url}}"
                                                                                    target="_blank"> <i
                                                                                        class="fa fa-instagram"
                                                                                        style="margin-top: 9px;"></i></a>
                                                                            </div>
                                                                            <div
                                                                                class="social-profile me-4 rounded text-center">
                                                                                <a href="{{$userData->personal_url}}"
                                                                                    target="_blank"><i
                                                                                        class="fa fa-globe"
                                                                                        style="margin-top: 9px;"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer text-center"
                                                                    style="background:lightseagreen;">
                                                                    <h5>{{$userData->website}}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <a href="{{route('user.profile')}}"
                                                                    class="btn btn-success mt-2 mb-4">Edit My Card</a>

                                                                <div class="progress progress-md">
                                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-green-1"
                                                                        id="progress-bar" style="width: 0%;">0%</div>
                                                                </div>
                                                                <label for="card-title"
                                                                    id="profile-business-progress-label">
                                                                    Your Profile is 0% complete.</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="tab27">
                                                        <div class="card">
                                                            <form novalidate="novalidate" class="update_password_form"
                                                                name="update_password_form" id="update_password_form">
                                                                @if($control_type == 1)
                                                                <div class="card mb-0">
                                                                    <div class="card-body mt-1">
                                                                        <div class="mb-1">
                                                                            <div class="d-flex justify-content-between">
                                                                                <label class="form-label"
                                                                                    for="reset-password-new">Old
                                                                                    Password</label>
                                                                            </div>
                                                                            <div
                                                                                class="input-group input-group-merge form-password-toggle">
                                                                                <input name="old_password"
                                                                                    type="password" class="form-control"
                                                                                    id="old_password"
                                                                                    placeholder="Old Password"
                                                                                    title="Enter Old Password">
                                                                            </div>
                                                                            <label id="old_password-error" class="error"
                                                                                for="old_password"></label>
                                                                        </div>
                                                                        <div class="mb-1">
                                                                            <div class="d-flex justify-content-between">
                                                                                <label class="form-label"
                                                                                    for="reset-password-new">New
                                                                                    Password</label>
                                                                            </div>
                                                                            <div
                                                                                class="input-group input-group-merge form-password-toggle">
                                                                                <input name="password" type="password"
                                                                                    class="form-control" id="password"
                                                                                    placeholder="New Password"
                                                                                    title="Enter New Password">
                                                                            </div>
                                                                            <label id="password-error" class="error"
                                                                                for="password"></label>
                                                                            <div class="mb-2">
                                                                                <div
                                                                                    class="d-flex justify-content-between">
                                                                                    <label class="form-label"
                                                                                        for="reset-password-confirm">Confirm
                                                                                        Password</label>
                                                                                </div>
                                                                                <div
                                                                                    class="input-group input-group-merge form-password-toggle">
                                                                                    <input name="password_confirmation"
                                                                                        type="password"
                                                                                        class="form-control"
                                                                                        id="password_confirmation"
                                                                                        placeholder="Confirm New Password"
                                                                                        title="Enter Confirm Password">

                                                                                </div>
                                                                                <label id="password_confirmation-error"
                                                                                    class="error"
                                                                                    for="password_confirmation"></label>
                                                                            </div>

                                                                            <div class="d-flex justify-content-center">
                                                                                <a type="button" class="btn btn-primary"
                                                                                    id="submit_password_btn"
                                                                                    onclick="submit_password()">Submit</a>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                    <div class="row">
                                                                        <p class="text-danger">Sorry, you do not have
                                                                            access to this feature.</p>
                                                                    </div>
                                                                @endif
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
    @php
    echo "<script>
        updateProgressBar();

    </script>";
    @endphp
</body>
