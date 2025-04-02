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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="card-title">{{$page_title}}</h3>

                                        <a href="{{route('add.user')}}" class="btn btn-primary">Add User</a>
                                       
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table id="file-datatable"
                                                class="table table-bordered text-nowrap key-buttons border-bottom">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0">Sr No.</th>
                                                        <th class="border-bottom-0">Name</th>
                                                        <th class="border-bottom-0">Email</th>
                                                        <th class="border-bottom-0">Last Login</th>
                                                        <th class="border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="user_modal" tabindex="-1" role="dialog" data-bs-backdrop="static"
            aria-labelledby="user_modal" aria-hidden="true">
            <div class="modal-dialog modal-lg " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit User</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="javascript:;" class="user_form" name="user_form" id="user_form">
                        <input type="hidden" name="edit_id" id="edit_id" />
                        <input type="hidden" name="edit_role_id" id="edit_role_id" />

                        <div class="modal-body">
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
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mobile_no">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control numbers" id="mobile_no" name="mobile_no"
                                        placeholder="Mobile Number" required>
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
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="user_submit_btn" type="submit">Submit</button>
                            <button type="button" onclick="closeUserModal()" class="btn btn-secondary">Cancel</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @include('elements.sidebar-right')
    @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/pages/user.js?v='.time()) }}"></script>
    <script src="{{ asset('/pages/custom.js?v='.time()) }}"></script>

</body>
