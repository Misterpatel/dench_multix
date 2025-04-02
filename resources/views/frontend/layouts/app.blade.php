<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ======== Page title ============ -->
    <title>{{ $meta?->meta_title ?? '' }}</title>

    <!-----------  Header Links Section ------------->
    @include('frontend.layouts.comman.header_links')
    <!-----------  Header Links Section End ------------->
	<style>
    :root {
        --theme-btn-bg: {{ $themeColor ?? 'linear-gradient(90deg, #FB5155 0%, #6129AC 100%)' }};
        --theme-content-color: {{ $themeColor ?? 'linear-gradient(90deg, #5116AD 19.92%, #E2345C 41.21%)' }};
        --theme-banner-color: {{ $themeColor ?? '#211e3b' }};
    }
</style>

  
</head>

<body class="body-wrapper">
    <!-- preloader -->
     <!---<div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="spinner">
            </div>
            <div class="txt-loading">
                <span data-text-preloader="A" class="letters-loading">
                    A
                </span>
                <span data-text-preloader="S" class="letters-loading">
                    S
                </span>
                <span data-text-preloader="P" class="letters-loading">
                    P
                </span>
                <span data-text-preloader="I" class="letters-loading">
                    I
                </span>
                <span data-text-preloader="R" class="letters-loading">
                    R
                </span>
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
            </div>
            <p class="text-center">Loading</p>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div> ---->
    <!-- welcome content start from here -->

    <!-----------  Header Section ------------->
    @include('frontend.layouts.comman.header')
    <!-----------  Header Section End ------------->

    @yield('content')


    <!-----------  Footer Section ------------->
    @include('frontend.layouts.comman.footer')
    <!-----------  Footer Section End ------------->


    <!-----------  Footer Links Section ------------->
    @include('frontend.layouts.comman.footer_links')
    <!-----------  Footer Links Section End ------------->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('custom_js')

</body>

</html>
