$(document).ready(function () {
    "use strict";
    var pageForm = $("#login_form");
    if (pageForm.length) {
        if (typeof pageForm.validate === "function") {            
            pageForm.validate({
                rules: {
                   
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                    },
                   
                },
                messages: {
                  
                    email: {
                        required: "Enter Email",
                    },
                    password: {
                        required: "Enter Password",
                    },
                   
                },
            });
        }
    } else {
        console.error("jQuery Validation Plugin is not loaded");
    }

    $("#login_button").on("click", function (e) {
        e.preventDefault();
        if (!pageForm.valid()) {
            return false;
        }
        var formData = new FormData(pageForm[0]);
        $.ajax({
            url: httpPath +"user-login",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                // console.log(response);
                if (response.res === 1) { 
                    toastr.success("User Login Successful");
                    setInterval(function () {
                        window.location = httpPath + 'dashboard';
                    }, 1000);
                } else if (response.res === 0)  {
                    toastr.error( "Something is wrong");
                }else if (response.res === 2)  {
                    toastr.error("Enter Valid Password");
                }else if (response.res === 3)  {
                    toastr.error("Enter Valid Email");
                }else if (response.res === 6)  {
                    toastr.error("User Expired");
                }
            },
        });
    });
    // $("#login_button").on("click", function (e) {
    //     e.preventDefault();
    //     if (!pageForm.valid()) {
    //         return false;
    //     }
        
    //     var formData = new FormData(pageForm[0]);
    //     $.ajax({
    //         url: httpPath + "user-login",
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //         type: "POST",
    //         processData: false,
    //         contentType: false,
    //         data: formData,
    //         success: function (response) {
    //             // Check response for login success
    //             if (response.res === 1) {
    //                 toastr.success("User Login Successful");
    
    //                 // Redirect to the provided URL
    //                 window.location.href = httpPath + "dashboard";
                    
    //             } else if (response.res === 0) {
    //                 toastr.error("Something is wrong");
    //             } else if (response.res === 2) {
    //                 toastr.error("Enter Valid Password");
    //             } else if (response.res === 3) {
    //                 toastr.error("Enter Valid Email");
    //             } else if (response.res === 6) {
    //                 toastr.error("User Expired");
    //             }
    //         },
    //         error: function() {
    //             toastr.error("An error occurred while processing the login.");
    //         }
    //     });
    // });
    
    
});