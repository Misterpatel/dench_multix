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
                            <h1 class="page-title">{{$page_title}}
                                <a href="{{route('add.service')}}" class=" ms-5 btn btn-primary btn-pill btn-sm"> <i
                                        class="fe fe-plus me-1"></i>Add Service</a> </h1>

                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$page_title}}</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{$page_title}}</h3>
                                    </div>
                                    <div class="card-body">
                                    <form id="social_media_form" method="POST" action="{{ route('update.socialmedia') }}">
                                        @csrf
                                            <p>If you do not want to show a social media link on your front-end page,
                                                just leave the input field blank.</p>

                                            <div class="form-group">
                                                <label for="facebook">Facebook</label>
                                                <input type="url" name="facebook" id="facebook" class="form-control"
                                                    value="{{ !empty($socialMediaData) ? $socialMediaData->facebook : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="twitter">Twitter</label>
                                                <input type="url" name="twitter" id="twitter" class="form-control"
                                                    value="{{ !empty($socialMediaData) ? $socialMediaData->twitter : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="linkedin">LinkedIn</label>
                                                <input type="url" name="linkedin" id="linkedin" class="form-control"
                                                    value="{{ !empty($socialMediaData) ? $socialMediaData->linkedin : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="google_plus">Google Plus</label>
                                                <input type="url" name="google_plus" id="google_plus" class="form-control"
                                                value="{{ !empty($socialMediaData) ? $socialMediaData->google_plus : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="pinterest">Pinterest</label>
                                                <input type="url" name="pinterest" id="pinterest" class="form-control"
                                                    value="{{ !empty($socialMediaData) ? $socialMediaData->pinterest : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="youtube">YouTube</label>
                                                <input type="url" name="youtube" id="youtube" class="form-control"
                                                    value="{{ !empty($socialMediaData) ? $socialMediaData->youtube : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="instagram">Instagram</label>
                                                <input type="url" name="instagram" id="instagram" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->instagram : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="tumblr">Tumblr</label>
                                                <input type="url" name="tumblr" id="tumblr" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->tumblr  : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="flickr">Flickr</label>
                                                <input type="url" name="flickr" id="flickr" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->flickr : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="reddit">Reddit</label>
                                                <input type="url" name="reddit" id="reddit" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->reddit : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="snapchat">Snapchat</label>
                                                <input type="url" name="snapchat" id="snapchat" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->snapchat : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="whatsapp">WhatsApp</label>
                                                <input type="url" name="whatsapp" id="whatsapp" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->whatsapp : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="quora">Quora</label>
                                                <input type="url" name="quora" id="quora" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->quora : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="stumbleupon">StumbleUpon</label>
                                                <input type="url" name="stumbleupon" id="stumbleupon" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->stumbleupon : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="delicious">Delicious</label>
                                                <input type="url" name="delicious" id="delicious" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->delicious : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="digg">Digg</label>
                                                <input type="url" name="digg" id="digg" class="form-control" value="{{ !empty($socialMediaData) ? $socialMediaData->digg : ''}}">
                                            </div>

                                            <button type="submit" id="submitSocialMedia" class="btn btn-primary">Submit</button>
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
    <script src="{{ asset('/public/pages/service.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
