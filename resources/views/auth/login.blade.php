@extends('layouts.default')
@section('content')
@include('elements.top-css')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body class="app sidebar-mini ltr login-img">
    <div class="page">
        <div class="">
            <div class="col col-login mx-auto mt-7">
                <!-- <div class="text-center">
                    <a href="index.html"><img src="../assets/images/brand/logo-white.png" class="header-brand-img"
                            alt=""></a>
                </div> -->
            </div>
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                @php
                    $setting = App\Models\Setting::where('status', '1')->first();
                @endphp
                <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                    @if($setting && $setting->logo)
                        <img src="{{ asset($setting->logo) }}" class="header-brand-img desktop-logo" alt="logo"
                            style="width:100%; height:70px;">
                    @else
                        <span class="login100-form-title pb-5">
                            Login
                        </span>
                    @endif
                </div>

                        <div class="panel panel-primary">
                            <div class="panel-body tabs-menu-body p-0 pt-5">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab5">
                                        <form id="login_form" class="login_form" name="login_form">
                                            <div class="wrap-input100 validate-input input-group"
                                                data-bs-validate="Valid email is required: ex@abc.xyz">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="email"
                                                    name="email" id="email" placeholder="Email">
                                                    
                                            </div>
                                            <label id="email-error" class="error" for="email"></label>
                                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                                <a href="javascript:void(0)"
                                                    class="input-group-text bg-white text-muted">
                                                    <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                </a>
                                                <input class="input100 border-start-0 form-control ms-0" type="password"
                                                    name="password" id="password" placeholder="Password">
                                            </div>
                                            <label id="password-error" class="error" for="password"></label>
                                            <!-- <div class="text-end pt-4">
                                                <p class="mb-0"><a href="{{ url('forgot-password') }}" class="text-primary ms-1">Forgot
                                                        Password?</a></p>
                                            </div> -->
                                            <div class="container-login100-form-btn">
                                                <button class="login100-form-btn btn-primary" type="submit"
                                                    id="login_button">
                                                    Login
                                                </button>
                                            </div>
                                        </form>
                                        <!-- <div class="text-center pt-3">
                                            <p class="text-dark mb-0">Not a member?<a href="{{ url('register') }}"
                                                    class="text-primary ms-1">Sign UP</a></p>
                                        </div> -->
                                    </div>

                                </div>
                            </div>
                        </div>

                 
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    var httpPath = "{{ url('/') }}/"; 
</script>

    <script src="{{ asset('public/pages/auth.js?v='.time()) }}"></script>
    <!-- <script src="{{ asset('pages/custom.js?v='.time()) }}"></script> -->
     
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/toastr.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{asset('assets/js/show-password.min.js')}}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{asset('assets/js/generate-otp.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{asset('assets/js/themeColors.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>
