@extends('layouts.default')
@section('content')
@include('elements.top-css')

<body class="app sidebar-mini ltr login-img">
    <div class="page">
        <div class="container-login100">
            <div class="wrap-login100 p-6">
                <h2 class="card-title fw-bold mb-1">Reset Password 🔒</h2>
                <p class="card-text mb-2">Your new password must be different from previously used
                    passwords</p>
                <form class="auth-reset-password-form mt-2" method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="email" class="form-control form-control-merge"
                                value="{{old('email', $request->email)}}" id="email" name="email"
                                placeholder="john@example.com" aria-describedby="email" tabindex="1" autofocus />

                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password">New Password</label>
                        </div>
                        <input type="password" class="form-control form-control-merge" id="password" name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" tabindex="2" required/>
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                        </div>
                        <input type="password" class="form-control form-control-merge" id="password_confirmation"
                            name="password_confirmation"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password_confirmation" tabindex="2" required/>
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-4" tabindex="3">   {{ __('Reset Password') }}</button>
                </form>
                <p class="text-center mt-2"><a href="{{route('login')}}"><i data-feather="chevron-left"></i> Back to
                        login</a></p>

            </div>
        </div>
    </div>
    @include('elements.bottom-js')

</body>
