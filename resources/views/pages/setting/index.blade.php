@extends('layouts.default')
@section('content')
@include('elements.top-css')
<style>
    i {
        margin-top: 1px;
    }

    #colorPicker {
        width: 100px;
        height: 40px;
        border: none;
        cursor: pointer;
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
                                                                href="#logo">Logo</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#favicon">Favicon</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#topbar">Top
                                                                Bar</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#footer">Footer</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#email">Email</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#banner">Banner</a>
                                                        </li>
                                                      
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#color">Color</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div id="logo" class="tab-pane fade show active">

                                                            <form id="logoForm">
                                                                @php
                                                                $logo = \App\Models\Setting::first()->logo ??
                                                                'images/no_image.jpg';
                                                                @endphp

                                                                <div class="mb-3">
                                                                    <label class="form-label">Existing Photo</label><br>
                                                                    <img id="existingLogo" src="{{ asset($logo) }}"
                                                                        alt="Existing Logo"
                                                                        style="max-width: 100px; height: auto;">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">New Photo</label>
                                                                    <input type="file" name="logo" class="form-control"
                                                                        required>
                                                                </div>

                                                                <button type="submit" class="btn btn-primary">Update
                                                                    Logo</button>
                                                            </form>
                                                        </div>
                                                        <div id="favicon" class="tab-pane fade">
                                                            <form id="faviconForm">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Existing
                                                                        Favicon</label><br>

                                                                    @php
                                                                    $favicon = \App\Models\Setting::first()->favicon ??
                                                                    'images/no_image.jpg';
                                                                    @endphp

                                                                    <img id="existingFavicon"
                                                                        src="{{ asset($favicon) }}"
                                                                        alt="Existing Favicon"
                                                                        style="max-width: 100px; height: auto;">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">New Favicon</label>
                                                                    <input type="file" name="favicon"
                                                                        class="form-control" required>
                                                                </div>

                                                                <button type="submit" class="btn btn-primary">Update
                                                                    Favicon</button>
                                                            </form>

                                                        </div>
                                                        <div id="topbar" class="tab-pane fade">
                                                            <form id="topBarForm">
                                                                <div class="mb-3">
                                                                    <label for="top_bar_email" class="form-label">Top
                                                                        Bar Email</label>
                                                                    <input type="email" class="form-control"
                                                                        name="top_bar_email"
                                                                        value="{{ !empty($setting) ? $setting->top_bar_email : '' }}"
                                                                        placeholder="info@yourwebsite.com">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="top_bar_phone" class="form-label">Top
                                                                        Bar Phone Number</label>
                                                                    <input type="text" class="form-control"
                                                                        name="top_bar_phone"
                                                                        value="{{ !empty($setting) ? $setting->top_bar_phone : '' }}"
                                                                        placeholder="954-648-1802">
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </form>


                                                        </div>
                                                        <div id="footer" class="tab-pane fade">
                                                            <h6 class="text-start"
                                                                style="background-color: #ffe599; padding: 10px; margin-bottom: 20px;">
                                                                Footer Settings</h6>
                                                            <form id="footerSettingsForm">
                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_col1_title"
                                                                        class="form-label d-block text-start">Column 1
                                                                        Title</label>
                                                                    <input type="text" class="form-control"
                                                                        name="footer_col1_title" id="footer_col1_title"
                                                                        placeholder="Column 1 Title"
                                                                        value="{{ !empty($setting) ? $setting->footer_col1_title : '' }}">
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_col2_title"
                                                                        class="form-label d-block text-start">Column 2
                                                                        Title</label>
                                                                    <input type="text" class="form-control"
                                                                        name="footer_col2_title" id="footer_col2_title"
                                                                        placeholder="Column 2 Title"
                                                                        value="{{ !empty($setting) ? $setting->footer_col2_title : '' }}">
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_col3_title"
                                                                        class="form-label d-block text-start">Column 3
                                                                        Title</label>
                                                                    <input type="text" class="form-control"
                                                                        name="footer_col3_title" id="footer_col3_title"
                                                                        placeholder="Column 3 Title"
                                                                        value="{{ !empty($setting) ? $setting->footer_col3_title : '' }}">
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_col4_title"
                                                                        class="form-label d-block text-start">Column 4
                                                                        Title</label>
                                                                    <input type="text" class="form-control"
                                                                        name="footer_col4_title" id="footer_col4_title"
                                                                        placeholder="Column 4 Title"
                                                                        value="{{ !empty($setting) ? $setting->footer_col4_title : '' }}">
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_copyright"
                                                                        class="form-label d-block text-start">Footer -
                                                                        Copyright</label>
                                                                    <textarea class="form-control"
                                                                        name="footer_copyright" id="footer_copyright"
                                                                        placeholder="Footer - Copyright">{{ !empty($setting) ? $setting->footer_copyright : '' }}</textarea>
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_address"
                                                                        class="form-label d-block text-start">Footer
                                                                        Address</label>
                                                                    <textarea class="form-control" name="footer_address"
                                                                        id="footer_address"
                                                                        placeholder="Footer Address">{{ !empty($setting) ? $setting->footer_address : '' }}</textarea>
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_email"
                                                                        class="form-label d-block text-start">Footer
                                                                        Email</label>
                                                                    <textarea class="form-control" name="footer_email"
                                                                        id="footer_email"
                                                                        placeholder="Footer Email">{{ !empty($setting) ? $setting->footer_email : '' }}</textarea>
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_phone"
                                                                        class="form-label d-block text-start">Footer
                                                                        Phone</label>
                                                                    <textarea class="form-control" name="footer_phone"
                                                                        id="footer_phone"
                                                                        placeholder="Footer Phone">{{ !empty($setting) ? $setting->footer_phone : '' }}</textarea>
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_recent_news_item"
                                                                        class="form-label d-block text-start">Number of
                                                                        Recent News</label>
                                                                    <input type="number" class="form-control"
                                                                        name="footer_recent_news_item"
                                                                        id="footer_recent_news_item"
                                                                        placeholder="Number of Recent News"
                                                                        value="{{ !empty($setting) ? $setting->footer_recent_news_item : '' }}">
                                                                </div>

                                                                <div class="mb-3 text-start">
                                                                    <label for="footer_recent_portfolio_item"
                                                                        class="form-label d-block text-start">Number of
                                                                        Recent Portfolios</label>
                                                                    <input type="number" class="form-control"
                                                                        name="footer_recent_portfolio_item"
                                                                        id="footer_recent_portfolio_item"
                                                                        placeholder="Number of Recent Portfolios"
                                                                        value="{{ !empty($setting) ? $setting->footer_recent_portfolio_item : '' }}">
                                                                </div>

                                                                <div class="text-start">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>


															

                                                            <!-- Newsletter Section -->
                                                            <form id="newsletterSettingsForm">
                                                                <div class="mb-3 text-start">
                                                                    <h6 class="text-start mt-4"
                                                                        style="background-color: #ffe599; padding: 10px; margin-bottom: 20px;">
                                                                        Newsletter Section
                                                                    </h6>

                                                                    <strong>Newsletter Text</strong>
                                                                    <textarea class="form-control"
                                                                        name="newsletter_text"
                                                                        id="newsletter_text">{{ !empty($setting) ? $setting->newsletter_text : '' }}</textarea>
                                                                </div>

                                                                <div class="text-start">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>

                                                            <!-- Call To Action Section -->
                                                            <form id="ctaSettingsForm">
                                                                <div class="mb-3 text-start">
                                                                    <h6 class="text-start mt-4"
                                                                        style="background-color: #ffe599; padding: 10px; margin-bottom: 20px;">
                                                                        Call To Action Section
                                                                    </h6>

                                                                    <strong>CTA Text</strong>
                                                                    <textarea class="form-control"
                                                                        name="cta_text">{{ !empty($setting) ? $setting->cta_text : '' }}</textarea>

                                                                    <strong>CTA Button Text</strong>
                                                                    <input class="form-control" type="text"
                                                                        name="cta_button_text"
                                                                        value="{{ !empty($setting) ? $setting->cta_button_text : '' }}">

                                                                    <strong>CTA Button URL</strong>
                                                                    <input class="form-control" type="text"
                                                                        name="cta_button_url"
                                                                        value="{{ !empty($setting) ? $setting->cta_button_url : '' }}">
                                                                </div>

                                                                <div class="text-start">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>



                                                            <form id="ctaBackgroundForm">
                                                                <div class="mb-3 text-start">
                                                                    <h6 class="text-start mt-4"
                                                                        style="background-color: #ffe599; padding: 10px; margin-bottom: 20px;">
                                                                        Call To Action Section Background Photo
                                                                    </h6>

                                                                    <div class="mb-2">
                                                                        <strong>Existing Photo:</strong>
                                                                        <div>
                                                                            @php
                                                                            $existingImagePath =
                                                                            \App\Models\Setting::first()->cta_background
                                                                            ?? 'images/no_image.jpg';
                                                                            @endphp
                                                                            <img src="{{ $existingImagePath }}"
                                                                                alt="Existing Footer Background"
                                                                                class="img-fluid"
                                                                                style="max-width: 80px;">
                                                                        </div>
                                                                    </div>

                                                                    <label for="cta_background"
                                                                        class="form-label d-block text-start">New
                                                                        Photo:</label>
                                                                    <input type="file" class="form-control"
                                                                        name="cta_background" id="cta_background">
                                                                </div>

                                                                <div class="text-start">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>

                                                        </div>

                                                        <div id="email" class="tab-pane fade">
                                                            <form id="emailForm">
                                                                <div class="mb-3">
                                                                    <label for="send_email_from" class="form-label">Send
                                                                        Email From *</label>
                                                                    <input type="email" class="form-control"
                                                                        name="send_email_from" id="send_email_from"
                                                                        placeholder="Send Email From" value="{{!empty($setting) ? $setting->send_email_from : ''}}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="receive_email_to"
                                                                        class="form-label">Receive Email To *</label>
                                                                    <input type="email" class="form-control"
                                                                        name="receive_email_to" id="receive_email_to"
                                                                        placeholder="Receive Email To" value="{{!empty($setting) ? $setting->receive_email_to : ''}}">
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>

                                                        <div id="banner" class="tab-pane fade">
                                                            <h5>Banner Settings</h5>
                                                            <div class="container">
                                                                <div class="row">
                                                                    <!-- About Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="aboutBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>About Page</h6>
                                                                                    @php
                                                                                    $banner_about = $setting->banner_about ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{ asset($banner_about) }}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_about"
                                                                                        name="banner_about">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Testimonial Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="testimonialBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Testimonial Page</h6>
                                                                                    @php
                                                                                    $banner_testimonial = $setting->banner_testimonial ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_testimonial)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_testimonial"
                                                                                        name="banner_testimonial">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- News Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="newsBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>News Page</h6>
                                                                                    @php
                                                                                    $banner_news = $setting->banner_news ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_news)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_news"
                                                                                        name="banner_news">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Event Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="eventBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Event Page</h6>
                                                                                    @php
                                                                                    $banner_event = $setting->banner_event ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_event)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_event"
                                                                                        name="banner_event">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Contact Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="contactBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Contact Page</h6>
                                                                                    @php
                                                                                    $banner_contact = $setting->banner_contact ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset( $banner_contact )}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_contact"
                                                                                        name="banner_contact">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Search Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="searchBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Search Page</h6>
                                                                                    @php
                                                                                    $banner_search = $setting->banner_search ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_search)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_search"
                                                                                        name="banner_search">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Privacy Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="privacyBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Privacy Page</h6>
                                                                                    @php
                                                                                    $banner_privacy = $setting->banner_privacy ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_privacy)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_privacy"
                                                                                        name="banner_privacy">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- FAQ Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="faqBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>FAQ Page</h6>
                                                                                    @php
                                                                                    $banner_faq = $setting->banner_faq ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_faq)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_faq"
                                                                                        name="banner_faq">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Service Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="serviceBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Service Page</h6>
                                                                                    @php
                                                                                    $banner_service = $setting->banner_service ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_service)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_service"
                                                                                        name="banner_service">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Portfolio Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="portfolioBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Portfolio Page</h6>
                                                                                    @php
                                                                                    $banner_portfolio = $setting->banner_portfolio ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_portfolio)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_portfolio"
                                                                                        name="banner_portfolio">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Team Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="teamBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Team Page</h6>
                                                                                    @php
                                                                                    $banner_team = $setting->banner_team ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_team)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_team"
                                                                                        name="banner_team">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Pricing Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="pricingBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Pricing Page</h6>
                                                                                    @php
                                                                                    $banner_pricing = $setting->banner_pricing ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_pricing)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_pricing"
                                                                                        name="banner_pricing">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Photo Gallery Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="photoGalleryBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Photo Gallery Page</h6>
                                                                                    @php
                                                                                    $banner_photo_gallery = $setting->banner_photo_gallery ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_photo_gallery)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_photo_gallery"
                                                                                        name="banner_photo_gallery">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Terms Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="termsBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Terms Page</h6>
                                                                                    @php
                                                                                    $banner_terms = $setting->banner_terms ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset( $banner_terms )}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_terms"
                                                                                        name="banner_terms">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Verify Subscriber Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="verifySubscriberBannerForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Verify Subscriber Page</h6>
                                                                                    @php
                                                                                    $banner_verify_subscriber = $setting->banner_verify_subscriber ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset($banner_verify_subscriber)}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="banner_verify_subscriber"
                                                                                        name="banner_verify_subscriber">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
																	
																	<!-- Story of Techex Home Page -->
                                                                    <div class="col-md-6 mb-4">
                                                                        <div class="card">
                                                                            <form id="storyOfTechexForm"
                                                                                enctype="multipart/form-data">
                                                                                <div class="card-body">
                                                                                    <h6>Story of Techex Home Page</h6>
                                                                                    @php
                                                                                    $stroy_of_techex_image = $setting->stroy_of_techex_image ??
                                                                                    'images/banner.jpg';
                                                                                    @endphp
                                                                                    <img src="{{asset( $stroy_of_techex_image )}}"
                                                                                        alt="Banner"
                                                                                        class="img-fluid mb-2"
                                                                                        style="width: 100%; height: auto;">
                                                                                    <input type="file"
                                                                                        class="form-control mb-2"
                                                                                        id="stroy_of_techex_image"
                                                                                        name="stroy_of_techex_image">
                                                                                    <button
                                                                                        class="btn btn-primary">Change</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
																	
																	
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- News Page - Sidebar Section -->
                                              
                                                        <div id="color" class="tab-pane fade">
                                                            <form id="colorForm">
                                                                <div class="mb-3">
                                                                    <label for="colorPicker" class="form-label">Select
                                                                        Color</label>
                                                                    <input type="color" id="colorPicker" name="color"
                                                                        class="form-control" value="{{ !empty($setting) ? $setting->front_end_color : '' }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="front_end_color"
                                                                        class="form-label">Selected Color Code</label>
                                                                    <input class="form-control" type="text"
                                                                        id="front_end_color" name="front_end_color"
                                                                        placeholder="Color Code" value="{{ !empty($setting) ? $setting->front_end_color : '' }}">
                                                                </div>
                                                                <div class="text-start">
                                                                    <button type="button" id="updateBtn"
                                                                        class="btn btn-primary">Update</button>
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
                    </div>
                </div>
            </div>
        </div>

        @include('elements.sidebar-right')
        @include('elements.footer')
    </div>
    @include('elements.bottom-js')
    <script src="{{ asset('/public/pages/setting.js?v='.time()) }}"></script>
    <script src="{{ asset('/public/pages/custom.js?v='.time()) }}"></script>

</body>
