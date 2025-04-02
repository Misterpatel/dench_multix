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
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="card-title">{{$page_title}}</h3>
                                        <a href="{{route('users')}}" class="btn btn-primary">Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="user_form" id="user_form" name="user_form" novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{!empty($userData) ? $userData->id : ''}}">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="first_name">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control alpha" id="first_name"
                                                        name="first_name" placeholder="First Name" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="last_name">Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control alpha" id="last_name"
                                                        name="last_name" placeholder="Last Name " required>
                                                </div>
                                               
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="mobile_no">Mobile Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numbers" id="mobile_no"
                                                        name="mobile_no" placeholder="Mobile Number" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password">Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Password" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password_confirmation">Confirm Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control"
                                                        id="password_confirmation" name="password_confirmation"
                                                        placeholder="Confirm Password" required>
                                                </div>
                                              
                                             <div class="form-group col-md-12">
												<label for="menu_selection">Menu Show <span class="text-danger">*</span></label>
												@if($menus->isNotEmpty())    
													<div class="d-flex flex-wrap">
														@foreach($menus as $menu)                                                    
															<div class="form-check me-3" style="width: 20%;">
																<input class="form-check-input" type="checkbox" id="menu_{{ $menu->id }}" name="menus[]" value="{{ $menu->id }}">
																<label class="form-check-label" for="menu_{{ $menu->id }}">
																	{{ $menu->name }}
																</label>
															</div>
															@if(($loop->index + 1) % 4 == 0)
																<div class="w-100"></div> 
															@endif
														@endforeach
													</div>
												@endif    
											</div>


                                              
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="user_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{route('users')}}"
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

        @include('elements.sidebar-right')
        @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/public/pages/user.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
