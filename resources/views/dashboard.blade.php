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

                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 class="card-title">Welcome <span
                                        class="text-success">{{Illuminate\Support\Facades\Auth::user()->first_name}}
                                        {{Illuminate\Support\Facades\Auth::user()->last_name}}</span>
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Total Experts Card -->
                             <!---<div class="col-lg-6 col-md-6 col-sm-12 col-xl-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="mt-2">
                                                <h6 class="">Total</h6>
                                              
                                                <h2 class="mb-0 number-font">2</h2>
                                            </div>
                                            <div class="ms-auto">
                                                <i class="fa fa-user-circle-o text-primary"
                                                    style="font-size: 2rem;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --->

                            <!-- Total Consumers Card -->
							
                        </div>
						
						 <!-- ROW-1 -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <!-----<div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
										<a href="">
                                            <div class="card-body text-dark">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h4 class="fw-bold">Total Contacts</h4>
                                                        <h2 class="mb-0 number-font">{{ $contacts }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="fa fa-user-circle-o text-primary"
                                                    style="font-size: 2rem;"></i>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12">In this year <span class="text-warning">({{ date('Y')}})</span></span>
                                            </div>
											</a>
                                        </div>
                                    </div>----->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
											<a href="{{ route('service') }}">
                                            <div class="card-body text-dark">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h5 class="fw-bold">Total Service</h5>
                                                        <h2 class="mb-0 number-font">{{ $services }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="fa fa-wrench text-primary"
                                                    style="font-size: 2rem;"></i>   
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12">In this year <span class="text-warning">({{ date('Y')}})</span></span>
                                            </div>
											</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
										<a href="{{ route('feature')}}">
                                            <div class="card-body text-dark">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h5 class="fw-bold">Total Feature Service</h5>
                                                        <h2 class="mb-0 number-font">{{ $features }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="fa fa-cogs text-primary"
                                                    style="font-size: 2rem;"></i>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12">In this year <span class="text-warning">({{ date('Y')}})</span></span>
                                            </div>
											</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden"> 
										<a href="{{ route('blog')}}">
                                            <div class="card-body text-dark">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h5 class="fw-bold">Total Blog</h5>
                                                        <h2 class="mb-0 number-font">{{ $blogs }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="fa fa-newspaper-o text-primary"
                                                    style="font-size: 2rem;"></i>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12">In this year <span class="text-warning">({{ date('Y')}})</span></span>
                                            </div>
											</a>
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
										<a href="{{ route('team.member')}}">
                                            <div class="card-body text-dark">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h5 class="fw-bold">Total Team Member</h5>
                                                        <h2 class="mb-0 number-font">{{ $teamMembers }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <i class="fa fa-user-circle-o text-primary"
                                                    style="font-size: 2rem;"></i>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12">In this year <span class="text-warning">({{ date('Y')}})</span></span>
                                            </div>
											</a>
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
										<a href="{{ route('faq')}}">
                                            <div class="card-body text-dark">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h5 class="fw-bold">Total FAQs</h5>
                                                        <h2 class="mb-0 number-font">{{ $faqs }}</h2>
                                                    </div>
                                                    <div class="ms-auto">
														<i class="fa fa-question-circle text-primary" style="font-size: 2rem;"></i>
                                                    </div>
                                                </div>
                                                <span class="text-muted fs-12">In this year <span class="text-warning">({{ date('Y')}})</span></span>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 END -->
						
                    
                    </div>
                </div>
            </div>
        </div>
        @include('elements.sidebar-right')
        @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/public/pages/dashboard.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
