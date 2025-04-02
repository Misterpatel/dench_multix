document.getElementById('colorPicker').addEventListener('input', function () {
    document.getElementById('colorCode').placeholder = this.placeholder;
});

$('#logoForm').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-logo",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success('Logo updated successfully!');
           window.location.reload();
        },
        error: function (xhr) {
            // If validation fails, display error messages
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Clear previous error messages
                toastr.clear();

                // Loop through the errors and display each one
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});

// For Favicon form submission
$('#faviconForm').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-favicon",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success('Favicon updated successfully!');
           window.location.reload();    

        },
        error: function (xhr) {
            // If validation fails, display error messages
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Clear previous error messages
                toastr.clear();

                // Loop through the errors and display each one
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});

$('#topBarForm').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-topbar",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success('Top Bar settings updated successfully!');
            window.location.reload();

        },
        error: function (xhr) {
            // If validation fails, display error messages
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Clear previous error messages
                toastr.clear();

                // Loop through the errors and display each one
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});

$('#footerSettingsForm').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-footer",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success(response.success);
            window.location.reload();

        },
        error: function (xhr) {
            // If validation fails, display error messages
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Clear previous error messages
                toastr.clear();

                // Loop through the errors and display each one
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});

$('#newsletterSettingsForm').on('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this); // Collect the form data

    $.ajax({
        url: httpPath + "update-newsletter",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // Show success message on successful submission
            toastr.success(response.success);
        },
        error: function (xhr) {
            // Handle validation errors
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Clear previous error messages
                toastr.clear();

                // Display each error message using toastr
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});


$('#storeOfTechexSettingsForm').on('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this); // Collect the form data

    $.ajax({
        url: httpPath + "update-storeTechex",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // Show success message on successful submission
            toastr.success(response.success);
        },
        error: function (xhr) {
            // Handle validation errors
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Clear previous error messages
                toastr.clear();

                // Display each error message using toastr
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});



$('#ctaSettingsForm').on('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this); // Collect the form data

    $.ajax({
        url: httpPath + "update-cta",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // Show success message on successful submission
            toastr.success(response.success);
            window.location.reload();

        },
        error: function (xhr) {
            // Handle validation errors
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Clear previous error messages
                toastr.clear();

                // Display each error message using toastr
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});

$('#ctaBackgroundForm').on('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this); // Collect the form data

    $.ajax({
        url: httpPath + "update-cta-background",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // Show success message on successful submission
            toastr.success(response.success);
            window.location.reload();

        },
        error: function (xhr) {
            // Handle validation errors
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Clear previous error messages
                toastr.clear();

                // Display each error message using toastr
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});

$('#emailForm').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-email",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success('Email settings updated successfully!');
            window.location.reload();
        },
        error: function (xhr) {
            // If validation fails, display error messages
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                toastr.clear();
                // Loop through the errors and display each one
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});

$('#sidebarSettingsForm').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + 'save-sidebar-settings', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // On success, show a success message
            toastr.success('Sidebar settings updated successfully!');
            window.location.reload();
        },
        error: function (xhr) {
            // If validation fails, show error messages
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                toastr.clear();
                // Loop through the errors and display each one
                for (var field in errors) {
                    toastr.error(errors[field][0]);
                }
            }
        }
    });
});

$(document).ready(function () {
    // Update color input field dynamically
    $('#colorPicker').on('input', function () {
        $('#front_end_color').val($(this).val());
    });

    // Handle the form submission using AJAX
    $('#updateBtn').on('click', function () {
        var formData = $('#colorForm').serialize(); // Serialize the form data

        $.ajax({
            url: httpPath + 'save-color-settings', // Adjust the URL to your actual endpoint
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "POST",
            data: formData,
            success: function (response) {
                // Success response (optional)
                toastr.success('Color updated successfully!');
                window.location.reload();
            },
            error: function (xhr) {
                // If validation fails, show error messages
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    toastr.clear();
                    // Loop through the errors and display each one
                    for (var field in errors) {
                        toastr.error(errors[field][0]);
                    }
                }
            }
        });
    });
});

$(document).ready(function () {
    $('#aboutBannerForm').on('submit', function (e) {
        e.preventDefault(); // Form ko reload hone se roknay ke liye
        
        let formData = new FormData(this); // Form data collect karna
        $.ajax({
            url: httpPath + 'about-banner-update', // Adjust the URL to your actual endpoint
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "POST",
            data: formData,
            processData: false, // Form data ko process mat karo
            contentType: false, // Content type set mat karo
            success: function (response) {
                if (response.success) {
                    toastr.success('About Banner updated successfully!');
                    location.reload(); // Page reload karna
                } else {
                    alert('Something went wrong!');
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

$(document).ready(function () {
    $('#testimonialBannerForm').on('submit', function (e) {
        e.preventDefault(); // Form ko reload hone se roknay ke liye
        
        let formData = new FormData(this); // Form data collect karna
        $.ajax({
            url: httpPath + 'testimonial-banner-update', // Adjust the URL to your actual endpoint
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "POST",
            data: formData,
            processData: false, // Form data ko process mat karo
            contentType: false, // Content type set mat karo
            success: function (response) {
                if (response.success) {
                    toastr.success('testimonial Banner updated successfully!');
                    location.reload(); // Page reload karna
                } else {
                    alert('Something went wrong!');
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

$(document).ready(function () {
    $('#newsBannerForm').on('submit', function (e) {
        e.preventDefault(); // Form ko reload hone se roknay ke liye
        
        let formData = new FormData(this); // Form data collect karna
        $.ajax({
            url: httpPath + 'news-banner-update', // Adjust the URL to your actual endpoint
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "POST",
            data: formData,
            processData: false, // Form data ko process mat karo
            contentType: false, // Content type set mat karo
            success: function (response) {
                if (response.success) {
                    toastr.success('News Banner updated successfully!');
                    location.reload(); // Page reload karna
                } else {
                    alert('Something went wrong!');
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});

$('#eventBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'event-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('Event Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#contactBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'contact-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('Contact Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#searchBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'search-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('Search Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});


$('#privacyBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'privacy-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('Privacy Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#faqBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'faq-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('Faq Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#serviceBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'service-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('service Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#portfolioBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'portfolio-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('portfolio Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#teamBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'team-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('team Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#pricingBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'pricing-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('pricing Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#photoGalleryBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'photo-gallery-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('Photo Gallery Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

$('#termsBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'term-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('term Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});


$('#storyOfTechexForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'storyOfTechex-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('Story Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});



$('#verifySubscriberBannerForm').on('submit', function (e) {
    e.preventDefault(); // Form ko reload hone se roknay ke liye
    
    let formData = new FormData(this); // Form data collect karna
    $.ajax({
        url: httpPath + 'verify-subscriber-banner-update', // Adjust the URL to your actual endpoint
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false, // Form data ko process mat karo
        contentType: false, // Content type set mat karo
        success: function (response) {
            if (response.success) {
                toastr.success('Verify Subscriber Banner updated successfully!');
                location.reload(); // Page reload karna
            } else {
                alert('Something went wrong!');
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});


