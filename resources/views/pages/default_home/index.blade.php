@extends('layouts.default')
@section('content')
    @include('elements.top-css')
    <style>
        i {
            margin-top: 1px;
        }
    </style>

    <body class="app sidebar-mini ltr light-mode">
        <div class="page">
            <div class="page-main">
                @include('elements.header')
                @include('elements.sidebar')
                <div class="main-content app-content mt-0">
                    <div class="side-app">
                        <div class="main-container container-fluid">
                            <div class="page-header">
                                <h1 class="page-title">{{ $page_title }}
                                    <!---<a href="{{ route('add.default_home') }}" class=" ms-5 btn btn-primary btn-pill btn-sm">
                                        <i class="fe fe-plus me-1"></i>Add Home</a>---->
                                </h1>

                                <div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $page_title }}</li>
                                    </ol>
                                </div>
                            </div>

                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ $page_title }}</h3>
                                        </div>
                                        <div class="card-body">
                                            <!-----<div class="table-responsive">
                                                <table class="table table-bordered text-nowrap border-bottom"
                                                    id="file-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p border-bottom-0">S.no</th>
                                                            <th class="wd-15p border-bottom-0">Photo</th>
                                                            <th class="wd-15p border-bottom-0">Default Home Page Show</th>
                                                            <th class="wd-15p border-bottom-0">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>---->
											
											
											<div class="row row-sm">
												@if($default_pages->isNotEmpty())
													@foreach($default_pages as $default_page)
														<div class="col-lg-4">
															<div class="card">
																<div class="card-header d-flex justify-content-between align-items-center">
																	<h3 class="card-title mb-0">{{ \Str::upper($default_page->page_name) }}</h3>
																	<div class="form-check form-switch">
																		<input class="form-check-input default-page-toggle"  
																			type="checkbox" style="font-size:25px" data-id="{{ $default_page->id }}" 
																			{{ $default_page->defalut_page == 'show' ? 'checked' : '' }}>
																	</div>
																</div>
																<div class="card-body">
																	<a href="{{ asset('storage/app/public/files/default_home/' . $default_page->photo) }}" target="__blank">
																		<img src="{{ asset('storage/app/public/files/default_home/' . $default_page->photo) }}" 
																			 class="img-responsive w-100" height="600px"/>
																	</a>
																</div>
															</div>
														</div>
													@endforeach
												@else
													<h2 class="text-center">Default Page Not Found</h2>
												@endif
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
        <script src="{{ asset('/pages/default_home.js?v=' . time()) }}"></script>
        <script src="{{ asset('/pages/custom.js?v=' . time()) }}"></script>
        <script>
            $(document).on("change", ".default-page-toggle", function() {
                var checkbox = $(this);
                var isChecked = checkbox.is(":checked") ? "show" : "hide";
                var id = checkbox.data("id");

                $.ajax({
                    url: "{{ route('change_default_home') }}",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id,
                        status: isChecked
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success("Default Home Page Update Successfully.");
                            setInterval(function () {
                                window.location = httpPath + "defalut_home";
                            }, 1000);
                        } else {
                            alert("Failed to update");
                            checkbox.prop("checked", !checkbox.is(":checked"));
                        }
                    }
                });
            });
        </script>
    </body>
