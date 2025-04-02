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
                            <h1 class="page-title">{{$page_title}} </h1>

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
                                        <h3 class="card-title">Add Team Member</h3>
                                        <a href="{{route('team.member')}}" class=" ms-5 btn btn-primary btn-sm">
                                            <i class="fa fa-arrow-left me-1"></i>Back</a>
                                    </div>
                                    <div class="card-body">
                                        <form class="team_member_form" id="team_member_form" name="team_member_form"
                                            novalidate>
                                            <input type="hidden" id="edit_id" name="edit_id"
                                                value="{{ !empty($teamMemberData) ? $teamMemberData->id : '' }}">
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Team Member Name"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->name : '' }}"
                                                    required>
                                            </div>

                                            <!-- Designation -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Designation <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="designation"
                                                    name="designation" placeholder="Designation"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->designation : '' }}"
                                                    required>
                                            </div>

                                            <!-- Photo Upload -->
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Photo</label>
                                                <input type="file" class="form-control" id="photo" name="photo"
                                                    accept=".jpg,.jpeg,.png,.gif">
                                                @if (!empty($teamMemberData->photo))
                                                <img src="{{ asset('storage/files/team_member/' . $teamMemberData->photo) }}"
                                                    alt="Banner" class="mt-2 img-thumbnail" width="100">
                                                @endif
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Detail</label>
                                                <textarea class="form-control" id="detail"
                                                    name="detail" rows="3"
                                                    placeholder="Detail">{{ !empty($teamMemberData) ? $teamMemberData->detail : '' }}</textarea>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-label">Facebook</label>
                                                <input type="text" class="form-control" id="facebook" name="facebook"
                                                    placeholder="Facebook Profile Link"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->facebook : '' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Twitter</label>
                                                <input type="text" class="form-control" id="twitter" name="twitter"
                                                    placeholder="Twitter Profile Link"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->twitter : '' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">LinkedIn</label>
                                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                                    placeholder="LinkedIn Profile Link"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->linkedin : '' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Instagram</label>
                                                <input type="text" class="form-control" id="instagram" name="instagram"
                                                    placeholder="Instagram Profile Link"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->instagram : '' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    placeholder="Phone Number"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->phone : '' }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email Address"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->email : '' }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Website</label>
                                                <input type="text" class="form-control" id="website" name="website"
                                                    placeholder="Website Link"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->website : '' }}">
                                            </div>
                                        
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Meta Title</label>
                                                <input type="text" class="form-control" id="meta_title"
                                                    name="meta_title" placeholder="Meta Title"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->meta_title : '' }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Meta Keywords</label>
                                                <input type="text" class="form-control" id="meta_keyword"
                                                    name="meta_keyword" placeholder="Meta Keywords"
                                                    value="{{ !empty($teamMemberData) ? $teamMemberData->meta_keyword : '' }}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Meta Description</label>
                                                <textarea class="form-control" id="meta_description"
                                                    name="meta_description" rows="3"
                                                    placeholder="Meta Description">{{ !empty($teamMemberData) ? $teamMemberData->meta_description : '' }}</textarea>
                                            </div>
                                            <div class="card-footer d-flex justify-content-center">
                                                <button class="btn btn-primary me-2" id="team_member_submit_btn"
                                                    type="submit">Submit</button>
                                                <a type="button" href="{{ route('team.member') }}"
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
    </div>

    @include('elements.sidebar-right')
    @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/public/pages/team_member.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
