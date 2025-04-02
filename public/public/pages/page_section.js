$("#submitContact").click(function (e) {
    e.preventDefault(); // Prevent default form submission

    let formData = $("#contactForm").serialize();

    $.ajax({
        url: httpPath + "update-contact",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                toastr.success(response.message);
                window.location.reload();

            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (key, value) {
                    toastr.error(value[0]); // Show validation errors
                });
            } else {
                toastr.error("An unexpected error occurred.");
            }
        }
    });
});
$("#aboutForm").submit(function (e) {
    e.preventDefault(); // Prevent default form submission

    let formData = $(this).serialize();

    $.ajax({
        url: httpPath + "update-about",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.success) {
                toastr.success(response.message);
                window.location.reload();

            } else {
                toastr.error("Something went wrong!");
            }
        },
        error: function (xhr) {
            let errors = xhr.responseJSON.errors;
            if (errors) {
                $.each(errors, function (key, value) {
                    toastr.error(value[0]);
                });
            } else {
                toastr.error("An error occurred.");
            }
        }
    });
});

$('#metaHomeForm').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-home-meta",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#homeWelcomeForm').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-home-welcome",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error(
                'An error occurred while updating welcome information.');
            console.error(error);
        }
    });
});


$('#updateVideoBgForm').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-home-video-bg",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success('Image updated successfully!');
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

$('#homeWhyChooseForm').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-home-why-choose",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#homeFeatureForm').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-home-feature",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#homeServiceForm').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-home-service",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#counterInfoForm').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-counter-info",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#counterBackgroundForm').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-home-counter-photo",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success('Image updated successfully!');
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

$('#workPortfolioForm').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-work-portfolio",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#bookingSection').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-booking-section",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#bookingphotosection').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-booking-photo",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success('Image updated successfully!');
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

$('#teamsection').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-team-section",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#pricingtable').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-pricing-table",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#testimonialSection').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-testimonial-section",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});

$('#testimonialPhoto').on('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var formData = new FormData(this); // Collect form data

    $.ajax({
        url: httpPath + "update-testimonial-photo",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // If successful, show a success message
            toastr.success('Image updated successfully!');
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

$('#blogSection').on('submit', function (e) {
    e.preventDefault();
    let formData = $(this).serialize();
    $.ajax({
        url: httpPath + "update-blog-section",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: formData,
   
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            toastr.success(response.message);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while updating meta information.');
            console.error(error);
        }
    });
});