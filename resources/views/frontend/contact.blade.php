@extends('frontend.layouts.app')
@section('content')
    <section class="page-banner-wrap bg-cover" style="background-image: url('{{ asset("public/front-assetsimg/page-banner.jpg")}}')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <div class="page-heading text-white">
                        <div class="page-title">
                            <h1>{{ $contact?->contact_heading ?? '' }}</h1>
                        </div>
                    </div>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-page-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-contact-card card1">
                        <div class="top-part">
                            <div class="icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="title">
                                <h4>Email Address</h4>
                                <span>Sent mail asap anytime</span>
                            </div>
                        </div>
                        <div class="bottom-part">
                            <div class="info">
                                <p>{{ $contact?->contact_email ?? '' }}</p>
                            </div>
                            <div class="icon">
                                <i class="fal fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-contact-card card2">
                        <div class="top-part">
                            <div class="icon">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="title">
                                <h4>Phone Number</h4>
                                <span>call us asap anytime</span>
                            </div>
                        </div>
                        <div class="bottom-part">
                            <div class="info">
                                <p>+{{ $contact?->contact_phone ?? '' }}</p>
                            </div>
                            <div class="icon">
                                <i class="fal fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-contact-card card3">
                        <div class="top-part">
                            <div class="icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="title">
                                <h4>Office Address</h4>
                                <span>Sent mail asap anytime</span>
                            </div>
                        </div>
                        <div class="bottom-part">
                            <div class="info">
                                <p>{{ $contact?->contact_address ?? '' }}</p>
                            </div>
                            <div class="icon">
                                <i class="fal fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="contact-map-wrap">
                        <div id="map">
                            @if (!empty($contact))
                                <p> {!! !empty($contact) ? $contact->contact_map : '' !!}</p>
                            @else
                                <p>This will be replaced with the Google Map.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row section-padding pb-0">
                <div class="col-12 text-center mb-20">
                    <div class="section-title">
                        <p>send us message</p>
                        <h1>Don’t Hesited To Contact Us <br> Say Hello or Message</h1>
                    </div>
                </div>

                <div class="col-12 col-lg-12">
                    <div class="contact-form">
                        <form class="row conact-form" id="contactform">
                            <div class="col-md-12 col-12">
                                <div class="single-personal-info">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" placeholder="Enter Name">
                                    <span class="error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <label for="name">EMail</label>
                                    <input type="email" id="email" name="email" placeholder="Enter Email">
                                    <span class="error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="single-personal-info">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" id="phone" name="phone" placeholder="Enter Number">
                                    <span class="error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="single-personal-info">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" name="subject" placeholder="Enter Subject">
                                    <span class="error text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="single-personal-info">
                                    <label for="address">Address</label>
                                    <textarea id="address" name="address" placeholder="Enter address"></textarea>
                                    <span class="error text-danger"></span>
                                </div>
                            </div>
                           
                            <div class="col-md-12 col-12">
                                <div class="single-personal-info">
                                    <label for="message">Enter Message</label>
                                    <textarea name="message" id="message" placeholder="Enter message"></textarea>
                                    <span class="error text-danger" ></span>
                                </div>
                            </div>
                            <div class="col-md-12 col-12 text-center">
                                <button type="submit" data-btntext-sending="Sending..." class="theme-btn">send message <i
                                        class="fas fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-banner">
        <div class="container-fluid bg-cover section-bg"
            style="background-image: url('{{ asset('public/front-assets/img/cta_bg1.png') }}')">
            <div class="cta-content">
                <div class="row align-items-center">
                    <div class="col-xl-7 text-white col-12 text-center text-xl-left">
                        <h1>Ready To Get Free Consulations For <br> Any Kind Of It Solutions ? </h1>
                    </div>
                    <div class="col-xl-5 col-12 text-center text-xl-right">
                        <a href="{{ route('contact') }}" class="theme-btn mt-4 mt-xl-0">Get a quote <i
                                class="fas fa-arrow-right"></i></a>
                        <a href="{{ route('services') }}" class="ml-sm-3 mt-4 mt-xl-0 theme-btn minimal-btn">read more <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom_js')
    <script>
        $(document).ready(function() {
            $('#contactform').on('submit', function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                var $button = $(this).find('button[type="submit"]');
                var originalText = $button.text();

                $button.text($button.data('btntext-sending')).prop('disabled', true);

                $.ajax({
                    url: "{{ route('contact.submit') }}",
                    method: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success(response.message, 'Success', {
                                timeOut: 3000
                            });
                            $('#contactform')[0].reset();
                            window.location.href = "{{ route('contact') }}";
                        } else if (response.status === 'error') {
                            $('.error').html('');
                            $('input[type=text],input[type=email],textarea').removeClass('is-invalid');
                            $.each(response.errors, function(key, error) {
                                $('#'+key).addClass('is-invalid').siblings('.error').html(error);
                                // toastr.error(error[0], 'Error', {
                                //     timeOut: 3000
                                // });
                            });
                        }
                    },
                    error: function() {
                        toastr.error('Something went wrong. Please try again later.', 'Error', {
                            timeOut: 3000
                        });
                    },
                    complete: function() {
                        $button.text(originalText).prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
