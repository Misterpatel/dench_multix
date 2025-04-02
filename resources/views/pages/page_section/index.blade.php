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
                            <h1 class="page-title">{{$page_title}} </h1>

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
                                    <div class="row row-sm">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs" id="settingsTabs">

                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab"
                                                                href="#home">Home</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#about">About</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#contact">Contact</a>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div id="home" class="tab-pane fade show active">

                                                            <div class="row mt-3">
                                                                <!-- Meta Items Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">Meta
                                                                        Items</div>
                                                                    <div class="card-body">
                                                                        <form id="metaHomeForm">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="title" required id="title"
                                                                                    placeholder="Enter the title"
                                                                                    value="{{ !empty($homeData) ? $homeData->title : '' }}">
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label class="form-label">Meta
                                                                                    Keyword</label>
                                                                                <textarea class="form-control"
                                                                                    name="meta_keyword" required
                                                                                    placeholder="Enter meta keywords, separated by commas">{{ !empty($homeData) ? $homeData->meta_keyword : '' }}</textarea>
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label class="form-label">Meta
                                                                                    Description</label>
                                                                                <textarea class="form-control"
                                                                                    name="meta_description" required
                                                                                    placeholder="Enter a brief meta description">{{ !empty($homeData) ? $homeData->meta_description : '' }}</textarea>
                                                                            </div>
                                                                            <div class="mb-3" style="display:none">
                                                                                <label for="home_meta_slug" class="form-label">Meta Slug</label>
                                                                                <input type="text" class="form-control metaslug"  id="{{ !empty($homeData->meta_slug) ? 'home_slug' : 'home_meta_slug' }}" name="about_meta_slug" 
                                                                                    value="{{ $homeData->meta_slug ?? '' }}" 
                                                                                    placeholder="Enter meta Slug"/>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </form>

                                                                    </div>
                                                                </div>

                                                                <!-- Welcome Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Welcome Section</div>
                                                                    <form id="homeWelcomeForm">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_welcome_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_welcome_title : '' }}"
                                                                                    placeholder="Enter the title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">SubTitle</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_welcome_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_welcome_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Text</label>
                                                                                <textarea
                                                                                    class="form-control summernote"
                                                                                    rows="4" name="home_welcome_text"
                                                                                    placeholder="Enter the text">{{ !empty($homeData) ? $homeData->home_welcome_text : '' }}</textarea>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Video</label>
                                                                                <textarea class="form-control" rows="2"
                                                                                    name="home_welcome_video"
                                                                                    placeholder="Enter the video embed code">{{ !empty($homeData) ? $homeData->home_welcome_video : '' }}</textarea>
                                                                            </div>

                                                                            <!-- Progress Bars -->
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Progress
                                                                                        Bar 1 - Text</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="home_welcome_pbar1_text"
                                                                                        value="{{ !empty($homeData) ? $homeData->home_welcome_pbar1_text : '' }}"
                                                                                        placeholder="Enter Progress Bar 1 text">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Progress
                                                                                        Bar 1 - Value</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="home_welcome_pbar1_value"
                                                                                        value="{{ !empty($homeData) ? $homeData->home_welcome_pbar1_value : '' }}"
                                                                                        placeholder="Enter Progress Bar 1 value">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-2">
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Progress
                                                                                        Bar 2 - Text</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="home_welcome_pbar2_text"
                                                                                        value="{{ !empty($homeData) ? $homeData->home_welcome_pbar2_text : '' }}"
                                                                                        placeholder="Enter Progress Bar 2 text">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Progress
                                                                                        Bar 2 - Value</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="home_welcome_pbar2_value"
                                                                                        value="{{ !empty($homeData) ? $homeData->home_welcome_pbar2_value : '' }}"
                                                                                        placeholder="Enter Progress Bar 2 value">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-2">
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Progress
                                                                                        Bar 3 - Text</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="home_welcome_pbar3_text"
                                                                                        value="{{ !empty($homeData) ? $homeData->home_welcome_pbar3_text : '' }}"
                                                                                        placeholder="Enter Progress Bar 3 text">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label class="form-label">Progress
                                                                                        Bar 3 - Value</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="home_welcome_pbar3_value"
                                                                                        value="{{ !empty($homeData) ? $homeData->home_welcome_pbar3_value : '' }}"
                                                                                        placeholder="Enter Progress Bar 3 value">
                                                                                </div>
                                                                            </div>

                                                                            <div class="mb-3 mt-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_welcome_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_welcome_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_welcome_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>


                                                                </div>
                                                                <!-- Video Section -->
                                                                <div class="card mb-4" style="display:none">
                                                                    <div class="card-header bg-warning text-white">Video
                                                                        Section</div>
                                                                    <form id="updateVideoBgForm">
                                                                        <div class="card-body">
                                                                            <label class="form-label">Existing Video
                                                                                Background</label>
                                                                            @php
                                                                            $home_welcome_video_bg =
                                                                            $homeData->home_welcome_video_bg ??
                                                                            'images/no_image.jpg';
                                                                            @endphp
                                                                            <img src="{{ $home_welcome_video_bg }}"
                                                                                alt="Video Background"
                                                                                class="img-fluid mb-3" width="80px"
                                                                                height="80px">

                                                                            <div class="mb-3">
                                                                                <label class="form-label">New Video
                                                                                    Background</label>
                                                                                <input type="file" class="form-control"
                                                                                    name="home_welcome_video_bg">
                                                                            </div>

                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <!-- Why Choose Us Section -->
                                                                <div class="card mb-4" style="display:none">
                                                                    <div class="card-header bg-warning text-white">Why
                                                                        Choose Us Section</div>
                                                                    <form id="homeWhyChooseForm">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_why_choose_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_why_choose_title : '' }}"
                                                                                    placeholder="Enter the title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">SubTitle</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_why_choose_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_why_choose_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>
                                                                            <div class="mb-3 mt-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_why_choose_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_why_choose_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_why_choose_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                                <!-- Feature Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Feature Section</div>
                                                                    <form id="homeFeatureForm">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_feature_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_feature_title : '' }}"
                                                                                    placeholder="Enter the title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Text</label>
                                                                                <textarea type="text" class="form-control"
                                                                                    name="home_feature_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_feature_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">{{ !empty($homeData) ? $homeData->home_feature_subtitle : '' }}</textarea>
                                                                            </div>
                                                                            <div class="mb-3 mt-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_feature_status">
                                                                                    <option value="show"
                                                                                        {{ isset($homeData) && $homeData->home_feature_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ isset($homeData) && $homeData->home_feature_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
																
																
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Service Section</div>
                                                                    <form id="homeServiceForm">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_service_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_service_title : '' }}"
                                                                                    placeholder="Enter the title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">SubTitle</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_service_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_service_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_service_status">
                                                                                    <option value="show"
                                                                                        {{ isset($homeData) && $homeData->home_service_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ isset($homeData) && $homeData->home_service_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                                <!-- Counter Information Section -->
                                                                <form id="counterInfoForm" >
                                                                    <div class="card mb-4" style="display:none">
                                                                        <div class="card-header bg-warning text-white">
                                                                            Counter Information Section</div>
                                                                        <div class="card-body">
                                                                            <!-- Item 1 -->
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 1 -
                                                                                        Title</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="counter_1_title"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_1_title : '' }}"
                                                                                        placeholder="Enter Item 1 Title">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 1 -
                                                                                        Value</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        name="counter_1_value"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_1_value : '' }}"
                                                                                        placeholder="Enter Item 1 Value">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 1 -
                                                                                        Icon</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="counter_1_icon"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_1_icon : '' }}"
                                                                                        placeholder="Enter Item 1 Icon">
                                                                                </div>
                                                                            </div>

                                                                            <!-- Item 2 -->
                                                                            <div class="row mt-3">
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 2 -
                                                                                        Title</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="counter_2_title"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_2_title : '' }}"
                                                                                        placeholder="Enter Item 2 Title">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 2 -
                                                                                        Value</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        name="counter_2_value"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_2_value : '' }}"
                                                                                        placeholder="Enter Item 2 Value">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 2 -
                                                                                        Icon</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="counter_2_icon"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_2_icon : '' }}"
                                                                                        placeholder="Enter Item 2 Icon">
                                                                                </div>
                                                                            </div>

                                                                            <!-- Item 3 -->
                                                                            <div class="row mt-3">
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 3 -
                                                                                        Title</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="counter_3_title"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_3_title : '' }}"
                                                                                        placeholder="Enter Item 3 Title">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 3 -
                                                                                        Value</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        name="counter_3_value"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_3_value : '' }}"
                                                                                        placeholder="Enter Item 3 Value">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 3 -
                                                                                        Icon</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="counter_3_icon"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_3_icon : '' }}"
                                                                                        placeholder="Enter Item 3 Icon">
                                                                                </div>
                                                                            </div>

                                                                            <!-- Item 4 -->
                                                                            <div class="row mt-3">
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 4 -
                                                                                        Title</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="counter_4_title"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_4_title : '' }}"
                                                                                        placeholder="Enter Item 4 Title">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 4 -
                                                                                        Value</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        name="counter_4_value"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_4_value : '' }}"
                                                                                        placeholder="Enter Item 4 Value">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <label class="form-label">Item 4 -
                                                                                        Icon</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="counter_4_icon"
                                                                                        value="{{ !empty($homeData) ? $homeData->counter_4_icon : '' }}"
                                                                                        placeholder="Enter Item 4 Icon">
                                                                                </div>
                                                                            </div>

                                                                            <!-- Show on Home -->
                                                                            <div class="mb-3 mt-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control"
                                                                                    name="counter_status">
                                                                                    <option value="Show"
                                                                                        {{ !empty($homeData) && $homeData->counter_status == 'Show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="Hide"
                                                                                        {{ !empty($homeData) && $homeData->counter_status == 'Hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Submit Button -->
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </form>


                                                                <!-- Counter Photo Section -->
                                                                <div class="card mb-4" style="display:none">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Counter Photo Section</div>
                                                                    <form id="counterBackgroundForm">
                                                                        <div class="card-body">
                                                                            <label class="form-label">Existing Counter
                                                                                Background</label>
                                                                            @php
                                                                            $counter_photo =
                                                                            $homeData->counter_photo ??
                                                                            'images/no_image.jpg';
                                                                            @endphp
                                                                            <img src="{{ $counter_photo }}"
                                                                                alt="Video Background"
                                                                                class="img-fluid mb-3" width="80px"
                                                                                height="80px">

                                                                            <div class="mb-3">
                                                                                <label class="form-label">New Counter
                                                                                    Background</label>
                                                                                <input type="file" name="counter_photo"
                                                                                    id="counter_photo"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="card mb-4" style="display:none">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Portfolio Section</div>
                                                                    <form id="workPortfolioForm">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_portfolio_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_portfolio_title : '' }}"
                                                                                    placeholder="Enter the title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Subtitle</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_portfolio_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_portfolio_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_portfolio_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_portfolio_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_portfolio_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                                <!-- Booking Section -->
                                                                <div class="card mb-4" style="display:none">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Booking Section</div>
                                                                    <form id="bookingSection">

                                                                        <div class="card-body">
                                                                            <!-- Booking Form Title -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Booking Form
                                                                                    Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_booking_form_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_booking_form_title : '' }}"
                                                                                    placeholder="Enter the booking form title">
                                                                            </div>

                                                                            <!-- Booking FAQ Title -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Booking FAQ
                                                                                    Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_booking_faq_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_booking_faq_title : '' }}"
                                                                                    placeholder="Enter the FAQ title">
                                                                            </div>

                                                                            <!-- Show on Home? -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_booking_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_booking_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_booking_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Submit Button -->
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                                <!-- Booking Photo Section -->
                                                                <div class="card mb-4" style="display:none">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Booking Photo Section</div>
                                                                    <form id="bookingphotosection">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Existing
                                                                                    Booking
                                                                                    Background</label>
                                                                                @php
                                                                                $home_booking_photo =
                                                                                $homeData->home_booking_photo ??
                                                                                'images/no_image.jpg';
                                                                                @endphp
                                                                                <img src="{{ $home_booking_photo }}"
                                                                                    alt="Video Background"
                                                                                    class="img-fluid mb-3" width="80px"
                                                                                    height="80px">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">New Booking
                                                                                    Background</label>
                                                                                <input type="file"
                                                                                    name="home_booking_photo"
                                                                                    id="home_booking_photo"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                                <!-- Team Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">Team
                                                                        Section</div>
                                                                    <form id="teamsection">
                                                                        <div class="card-body">
                                                                            <!-- Team Title -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_team_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_team_title : '' }}"
                                                                                    placeholder="Enter the team section title">
                                                                            </div>

                                                                            <!-- Team Subtitle -->
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Subtitle</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_team_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_team_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>

                                                                            <!-- Show on Home? -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_team_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_team_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_team_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Submit Button -->
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <div class="card mb-4" style="">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Pricing Table Section</div>
                                                                    <form id="pricingtable">

                                                                        <div class="card-body">
                                                                            <!-- Pricing Table Title -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_ptable_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_ptable_title : '' }}"
                                                                                    placeholder="Enter the pricing table title">
                                                                            </div>

                                                                            <!-- Pricing Table Subtitle -->
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">SubTitle</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_ptable_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_ptable_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>

                                                                            <!-- Show on Home? -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_ptable_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_ptable_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_ptable_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Submit Button -->
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>



																 <!---------------- Our parteners section Start --------------->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">Our parteners</div>
                                                                    <form id="ourPartnersection">
                                                                        <div class="card-body">
                                                                            <!-- Team Title -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_our_partner_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_our_partner_title : '' }}"
                                                                                    placeholder="Enter the Our Parteners section title">
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Subtitle</label>
                                                                                <textarea type="text" class="form-control"
                                                                                    name="home_our_partner_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_our_partner_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">{{ !empty($homeData) ? $homeData->home_our_partner_subtitle : '' }}</textarea>
                                                                            </div>
 
                                                                            <!-- Show on Home? -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_our_partner_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_our_partner_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_our_partner_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Submit Button -->
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
																
																<!---------------- Our parteners section End --------------->

                                                                <!-- Testimonial Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Testimonial Section</div>
                                                                    <form id="testimonialSection">
                                                                        <div class="card-body">
                                                                            <!-- Testimonial Title -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_testimonial_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_testimonial_title : '' }}"
                                                                                    placeholder="Enter the testimonial title">
                                                                            </div>

                                                                            <!-- Testimonial Subtitle -->
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">SubTitle</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_testimonial_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_testimonial_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>

                                                                            <!-- Show on Home? -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_testimonial_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_testimonial_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_testimonial_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Submit Button -->
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                                <!-- Testimonial Photo Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Testimonial Photo Section</div>
                                                                    <div class="card-body">
                                                                        <form id="testimonialPhoto">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Existing
                                                                                    Photo</label>
                                                                                @php
                                                                                $home_testimonial_photo =
                                                                                $homeData->home_testimonial_photo ??
                                                                                'images/no_image.jpg';
                                                                                @endphp
                                                                                <img src="{{ $home_testimonial_photo }}"
                                                                                    alt="Video Background"
                                                                                    class="img-fluid mb-3" width="80px"
                                                                                    height="80px">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">New
                                                                                    Photo</label>
                                                                                <input type="file"
                                                                                    name="home_testimonial_photo"
                                                                                    id="home_testimonial_photo"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                                <!-- Blog Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">Blog
                                                                        Section</div>
                                                                    <form id="blogSection">

                                                                        <div class="card-body">
                                                                            <!-- Blog Title -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_blog_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_blog_title : '' }}"
                                                                                    placeholder="Enter the blog title">
                                                                            </div>

                                                                            <!-- Blog Subtitle -->
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Subtitle</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_blog_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_blog_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>

                                                                            <!-- Number of Blog Items -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">How many blog
                                                                                    items to show?</label>
                                                                                <input type="number"
                                                                                    class="form-control"
                                                                                    name="home_blog_item"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_blog_item : 10 }}"
                                                                                    placeholder="Enter number of blog items to show">
                                                                            </div>

                                                                            <!-- Show on Home? -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_blog_status">
                                                                                    <option value="show"
                                                                                        {{ !empty($homeData) && $homeData->home_blog_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ !empty($homeData) && $homeData->home_blog_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>

                                                                            <!-- Submit Button -->
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>


                                                                <!-- home banner information Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Home Banner Information</div>
                                                                    <form id="homeBannerInformationForm">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_bannerInformation_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_bannerInformation_title : '' }}"
                                                                                    placeholder="Enter the title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Heading</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_bannerInformation_heading"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_bannerInformation_heading : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Description</label>
                                                                                <textarea type="text" class="form-control"
                                                                                    name="home_bannerInformation_description"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_bannerInformation_description : '' }}"
                                                                                    placeholder="Enter Description">{{ !empty($homeData) ? $homeData->home_bannerInformation_description : '' }}</textarea>
                                                                            </div>
                                                                            <div class="mb-3 mt-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_bannerInformation_status">
                                                                                    <option value="show"
                                                                                        {{ isset($homeData) && $homeData->home_bannerInformation_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ isset($homeData) && $homeData->home_bannerInformation_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>
                                                                            <button type="submit" id="homeBannerInformationSubmit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <!-- Home banner information Section End -->
																
																
																 <!-- Story of Aspire Automation Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Story of Aspire Automation Information</div>
                                                                    <form id="homeStoryAspireForm">
                                                                        <div class="card-body"> 
                                                                           <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Heading</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_storyAspire_heading"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_storyAspire_heading : '' }}"
                                                                                    placeholder="Enter the subtitle">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Text</label>
                                                                                <textarea type="text" class="form-control"
                                                                                    name="home_storyAspire_description"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_storyAspire_description : '' }}"
                                                                                    placeholder="Enter Description">{{ !empty($homeData) ? $homeData->home_storyAspire_description : '' }}</textarea>
                                                                            </div>
                                                                            <div class="mb-3 mt-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_storyAspire_status">
                                                                                    <option value="show"
                                                                                        {{ isset($homeData) && $homeData->home_storyAspire_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ isset($homeData) && $homeData->home_storyAspire_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>
                                                                            <button type="submit" id="homeStoryAspireSubmit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <!-- Story of Aspire Automation Section End -->
																
                                                                <!------------- Contact About Section  ------------>
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Contact About Section</div>
                                                                    <form id="homeContactAboutForm">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Phone Number</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_contactAbout_phone"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_contactAbout_phone : '' }}"
                                                                                    placeholder="Enter Phone Number">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Title</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="home_contactAbout_title"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_contactAbout_title : '' }}"
                                                                                    placeholder="Enter the title">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Text</label>
                                                                                <textarea type="text" class="form-control"
                                                                                    name="home_contactAbout_subtitle"
                                                                                    value="{{ !empty($homeData) ? $homeData->home_contactAbout_subtitle : '' }}"
                                                                                    placeholder="Enter the subtitle">{{ !empty($homeData) ? $homeData->home_contactAbout_subtitle : '' }}</textarea>
                                                                            </div>
                                                                            <div class="mb-3 mt-3">
                                                                                <label class="form-label">Show on
                                                                                    Home?</label>
                                                                                <select class="form-control select2"
                                                                                    name="home_contactAbout_status">
                                                                                    <option value="show"
                                                                                        {{ isset($homeData) && $homeData->home_contactAbout_status == 'show' ? 'selected' : '' }}>
                                                                                        Show</option>
                                                                                    <option value="hide"
                                                                                        {{ isset($homeData) && $homeData->home_contactAbout_status == 'hide' ? 'selected' : '' }}>
                                                                                        Hide</option>
                                                                                </select>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!------------- Contact About Section End ------------>

                                                            </div>

                                                        </div>
                                                        <div id="About" class="tab-pane fade">
                                                            <form id="aboutForm">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label">About Heading</label>
                                                                    <input type="text" name="about_heading"
                                                                        class="form-control" required
                                                                        placeholder="Enter about heading"
                                                                        value="{{ !empty($aboutData) ? $aboutData->about_heading : '' }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">About Content</label>
                                                                    <textarea name="about_content"
                                                                        class="form-control summernote" required
                                                                        rows="6"
                                                                        placeholder="Enter about content">{{ !empty($aboutData) ? $aboutData->about_content : '' }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Meta Title</label>
                                                                    <input type="text" name="mt_about" id="mt_about"
                                                                        class="form-control" required
                                                                        placeholder="Enter meta title" 
                                                                        value="{{ !empty($aboutData) ? $aboutData->mt_about : '' }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Meta Keyword</label>
                                                                    <textarea name="mk_about" class="form-control"
                                                                        rows="2" 
                                                                        placeholder="Enter meta keywords">{{ !empty($aboutData) ? $aboutData->mk_about : '' }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Meta Description</label>
                                                                    <textarea name="md_about" class="form-control"
                                                                        rows="2"
                                                                        placeholder="Enter meta description">{{ !empty($aboutData) ? $aboutData->md_about : '' }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="about_meta_slug" class="form-label">Meta Slug</label>
                                                                    <input type="text" class="form-control metaslug"  id="{{ !empty($aboutData->meta_slug) ? 'about_slug' : 'about_meta_slug' }}" name="about_meta_slug" 
                                                                        value="{{ $aboutData->meta_slug ?? '' }}" 
                                                                        placeholder="Enter meta Slug"/>
                                                                </div>
                                                                <button type="submit" id="submitAbout"
                                                                    class="btn btn-primary">Update</button>
                                                            </form>
															
															<br/>
															
															<!-- About Faq Photo Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        FAQ Photo Section</div>
                                                                    <div class="card-body">
                                                                        <form id="aboutFaqPhoto">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Existing
                                                                                    Photo</label>
                                                                                @php
                                                                                $faq_image =
                                                                                $aboutData->faq_image ??
                                                                                'images/no_image.jpg';
                                                                                @endphp
                                                                                <img src="{{ $faq_image }}"
                                                                                    alt="Video Background"
                                                                                    class="img-fluid mb-3" width="80px"
                                                                                    height="80px">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">New
                                                                                    Photo</label>
                                                                                <input type="file"
                                                                                    name="faq_image"
                                                                                    id="faq_image"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
																<!-- About Faq Photo Section End -->
															
															<!-- About Testimonial Photo Section -->
                                                                <div class="card mb-4">
                                                                    <div class="card-header bg-warning text-white">
                                                                        Testimonial Photo Section</div>
                                                                    <div class="card-body">
                                                                        <form id="aboutTestimonialPhoto">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Existing
                                                                                    Photo</label>
                                                                                @php
                                                                                $testimonial_image =
                                                                                $aboutData->testimonial_image ??
                                                                                'images/no_image.jpg';
                                                                                @endphp
                                                                                <img src="{{ $testimonial_image }}"
                                                                                    alt="Video Background"
                                                                                    class="img-fluid mb-3" width="80px"
                                                                                    height="80px">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label">New
                                                                                    Photo</label>
                                                                                <input type="file"
                                                                                    name="testimonial_image"
                                                                                    id="testimonial_image"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
																<!-- Testimonial Photo Section End -->

                                                        </div>
                                                        <div id="contact" class="tab-pane fade">
                                                            <form id="contactForm">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Contact Heading</label>
                                                                    <input type="text" name="contact_heading"
                                                                        class="form-control" required
                                                                        placeholder="Enter contact heading"
                                                                        value="{{ !empty($contactData) ? $contactData->contact_heading : '' }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Contact Address</label>
                                                                    <textarea name="contact_address"
                                                                        class="form-control" required
                                                                        placeholder="Enter contact address"
                                                                        rows="3">{{ !empty($contactData) ? $contactData->contact_address : '' }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Contact Email</label>
                                                                    <textarea name="contact_email" class="form-control"
                                                                        required placeholder="Enter contact email"
                                                                        rows="2">{{ !empty($contactData) ? $contactData->contact_email : '' }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Contact Phone</label>
                                                                    <textarea name="contact_phone" class="form-control"
                                                                        required placeholder="Enter contact phone"
                                                                        rows="2">{{ !empty($contactData) ? $contactData->contact_phone : '' }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Contact Map (iframe
                                                                        Code)</label>
                                                                    <textarea name="contact_map" class="form-control"
                                                                        required rows="4"
                                                                        placeholder="Enter Google Maps iframe code">{{ !empty($contactData) ? $contactData->contact_map : '' }}</textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Meta Title</label>
                                                                    <input type="text" name="mt_contact" class="form-control" 
                                                                        placeholder="Enter meta title" id="mt_contact"
                                                                        value="{{ !empty($contactData) ? $contactData->mt_contact : '' }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Meta Keyword</label>
                                                                    <textarea name="mk_contact" class="form-control" rows="2" 
                                                                        placeholder="Enter meta keywords">
                                                                        {{ !empty($contactData) ? $contactData->mk_contact : '' }}
                                                                    </textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Meta Description</label>
                                                                    <textarea name="md_contact" class="form-control" rows="2" 
                                                                        placeholder="Enter meta description">
                                                                        {{ !empty($contactData) ? $contactData->md_contact : '' }}
                                                                    </textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="contact_meta_slug" class="form-label">Meta Slug</label>
                                                                    <input type="text" class="form-control metaslug" id="{{ !empty($contactData->meta_slug) ? 'contact_slug' : 'contact_meta_slug' }}" name="contact_meta_slug" 
                                                                        value="{{ $contactData->meta_slug ?? '' }}" 
                                                                        placeholder="Enter meta Slug"/>
                                                                </div>
                                                                <button type="submit" id="submitContact"
                                                                    class="btn btn-primary">Update</button>
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
                    </div>
                </div>
            </div>
        </div>

        @include('elements.sidebar-right')
        @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/pages/page_section.js?v='.time()) }}"></script>
    <script src="{{ asset('/pages/custom.js?v='.time()) }}"></script>
    <script>
        $(document).ready(function () {
            $("#title").on("keyup", function () {
                let slug = $(this).val()
                    .toLowerCase()           // Lowercase karega
                    .replace(/[^a-z0-9\s]/g, "")  // Special characters hatayega
                    .replace(/\s+/g, "-");    // Spaces ko hyphen me convert karega
                
                $("#home_meta_slug").val(slug);
            });
            $("#mt_about").on("keyup", function () {
                let slug = $(this).val()
                    .toLowerCase()           // Lowercase karega
                    .replace(/[^a-z0-9\s]/g, "")  // Special characters hatayega
                    .replace(/\s+/g, "-");    // Spaces ko hyphen me convert karega
                
                $("#about_meta_slug").val(slug);
            });
            $("#mt_contact").on("keyup", function () {
                let slug = $(this).val()
                    .toLowerCase()           // Lowercase karega
                    .replace(/[^a-z0-9\s]/g, "")  // Special characters hatayega
                    .replace(/\s+/g, "-");    // Spaces ko hyphen me convert karega
                
                $("#contact_meta_slug").val(slug);
            });
        });
    </script>
</body> 
