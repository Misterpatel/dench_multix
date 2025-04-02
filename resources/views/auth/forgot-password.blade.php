@extends('layouts.default')
@section('content')
@include('elements.top-css')

<body class="app sidebar-mini ltr login-img">
    <div class="page">
        <div class="container-login100">
            <div class="wrap-login100 p-6">
                <form name="resetPasswordForm" id="resetPasswordForm">
                    <span class="login100-form-title pb-5">Forgot Password</span>
                    <p class="text-muted">Enter the email address registered on your account</p>
                    <div class="wrap-input100 validate-input input-group"
                        data-bs-validate="Valid email is required: ex@abc.xyz">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-email" aria-hidden="true"></i>
                        </a>
                        <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email"
                            name="email" id="email">
                    </div>
                    <label id="email-error" class="error" for="email"></label>
                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-primary w-100" type="submit">Email Password Reset Link</button>
                    </div>
                    <div class="text-center mt-4">
                        <p class="text-dark mb-0">Forgot It?<a class="text-primary ms-1" href="{{route('login')}}">Send
                                me Back</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/public/pages/user.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
