@extends('layouts.default')
@section('content')
@include('elements.top-css')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body class="app sidebar-mini ltr login-img">
    <div class="">
        <div class="page">
            <div class="">
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" class="user_form" name="user_form" id="user_form">
                            <span class="login100-form-title">
                                Registration
                            </span>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control alpha" id="first_name" name="first_name"
                                        placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control alpha" id="last_name" name="last_name"
                                        placeholder="Last Name " required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="organization_name">Organization Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control alpha" id="organization_name"
                                        name="organization_name" placeholder="Organization Name " required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mobile_no">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control numbers" id="mobile_no" name="mobile_no"
                                        placeholder="Mobile Number" required>
                                </div>
                              
                                <div class="form-group col-md-6">
                                    <label for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_confirmation">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="referral_code">Referral Code </label>
                                    <input type="text" class="form-control alpha" id="referral_code"
                                        name="referral_code" placeholder="Referral Code"
                                        value="{{!empty($referral_id) ? $referral_id : ''}}">
                                </div>
                            </div>

                            <div class="container-login100-form-btn">
                                <button class="btn btn-primary me-2" id="user_submit_btn"
                                    type="submit">Register</button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Already have account?<a href="{{route('login')}}"
                                        class="text-primary ms-1">Sign In</a></p>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

    </div>
    <script type="text/javascript">
        var httpPath = "{{ url('/') }}/";

    </script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <!-- BACKGROUND-IMAGE CLOSED -->
    <script src="{{ asset('/public/pages/register.js?v='.time()) }}"></script>
    <!-- JQUERY JS -->
    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/toastr.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{asset('assets/js/show-password.min.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{asset('assets/js/themeColors.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
	<script src="{{asset('assets/js/select2.js')}}"></script>


</body>

</html>
