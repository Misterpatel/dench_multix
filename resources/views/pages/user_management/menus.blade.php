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
                        <div class="row row-sm">

                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Add {{$page_title}}</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-control-lg menu_form" id="menu_form" name="menu_form"
                                            novalidate>
                                            <input type="hidden" name="parent_id" id="parent_id"
                                                value="{{ !empty($menuData)?$menuData->id:0; }}" />
                                            <div class="form-group">
                                                <label for="name">Select Module </label>
                                                <br><select class="form-control select2 select2-dropdown" id="module_id"
                                                    name="module_id" data-placeholder="Select Module">
                                                    <option value="" label="Select Module"> </option>
                                                    @foreach($moduleData as $row)
                                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label id="module_id-error" class="error" for="module_id"></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Menu Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control alphanumeric" id="name"
                                                    name="name" placeholder="Menu Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="icon">Icon <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="icon" name="icon"
                                                    placeholder="Icon" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" class="form-control" id="link" name="link"
                                                    placeholder="Link">
                                            </div>
                                            <div class="form-group">
                                                <label for="order_by">Order By <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control numbers" id="order_by"
                                                    name="order_by" placeholder="Order By" required>
                                            </div>
											<div class="form-group">
                                                <label for="name">Show/Hide Menu </label>
                                                <br><select class="form-control" id="status"
                                                    name="status" data-placeholder="Show Hide Menu">
                                                    <option value="0">Hide</option>
                                                    <option value="1">Show</option>
                                                </select>
                                            </div>

                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary" id="menu_submit_btn"
                                                    type="submit">Submit</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="card-title">{{$page_title}}</h3>
                                        <a style="<?= empty($menuData) ? 'display:none' : '' ?>"
                                            href="{{ url('menus') }}"
                                            class="btn btn-primary waves-effect waves-float waves-light">Back</a>

                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table id="file-datatable"
                                                class="table table-bordered text-nowrap key-buttons border-bottom">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0">SR NO.</th>
                                                        <th class="border-bottom-0">ICON</th>
                                                        <th class="border-bottom-0">NAME</th>
                                                        <th class="border-bottom-0">ORDER BY</th>
                                                        <th class="border-bottom-0">ACTION</th>
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

        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" data-bs-backdrop="static"
            aria-labelledby="edit_modal" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Edit {{$page_title}}</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="javascript:;" class="edit_menus_form" name="edit_menus_form" id="edit_menus_form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Select Module </label>
                                <br><select class="form-control select2 select2-dropdown" id="edit_module_id"
                                    name="edit_module_id" data-placeholder="Select Module">
                                    <option value="" label="Select Module"> </option>
                                    @foreach($moduleData as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                <label id="edit_module_id-error" class="error" for="edit_module_id"></label>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="edit_menu_name">Menu Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Menu Name" name="edit_menu_name" title="Enter Menu Name"
                                    id="edit_menu_name" class="form-control alphanumeric" />
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="edit_icon">Menu Icon <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Icon" name="edit_icon" title="Enter Menu Icon"
                                    id="edit_icon" class="form-control" />
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="edit_menu_link">Menu Link</label>
                                <input type="text" placeholder="Menu Link" name="edit_menu_link" title="Enter Menu Link"
                                    id="edit_menu_link" class="form-control" />
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="edit_order_by">Order by <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Order by" name="edit_order_by" title="Enter Order by"
                                    id="edit_order_by" class="form-control numbers" />
                            </div>
							<div class="mb-1">
							 <label class="form-label" for="edit_order_by">Show/Hide Menu <span
                                        class="text-danger">*</span></label>
                                                <br><select class="form-control" id="status"
                                                    name="status" data-placeholder="Show Hide Menu">
                                                    <option value="0">Hide</option>
                                                    <option value="1">Show</option>
                                                </select>
                                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="edit_menu_submit_btn" type="submit">Submit</button>
                            <button type="button" onclick="closeMenuModal()" class="btn btn-secondary">Cancel</button>

                        </div>
                        <input type="hidden" name="edit_id" id="edit_id" />
                        <input type="hidden" name="edit_parent_id" id="edit_parent_id"
                            value="{{ !empty($menuData)?$menuData->id:0; }}" />
                    </form>
                </div>
            </div>
        </div>



        @include('elements.sidebar-right')
        @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/public/pages/menu.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
