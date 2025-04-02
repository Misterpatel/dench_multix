$(document).ready(function () {
    if ($.fn.DataTable.isDataTable('#file-datatable')) {
        $('#file-datatable').DataTable().destroy();
    }
    var fileDataTable = $('#file-datatable').DataTable({
        bAutoWidth: false,
        bFilter: true,
        bStateSave: true,
        bSort: true,
        bProcessing: true,
        bServerSide: true,
        oLanguage: {
            sLengthuser: "_user_",
            sInfoFiltered: "",
            sProcessing: "Loading ...",
            sEmptyTable: "NO DATA ADDED YET !",
        },
        aLengthuser: [
            [-1, 10, 20, 30, 50],
            ["All", 10, 20, 30, 50],
        ],
        iDisplayLength: 10,
        sAjaxSource: httpPath + "fetch-users",
        fnServerParams: function (aoData) {
            aoData.push({
                name: "mode",
                value: "fetch"
            });
        },
        fnDrawCallback: function (oSettings) {
            $('.ttip, [data-toggle="tooltip"]').tooltip();
        },
    });

    $(".dataTables_filter input")
        .addClass("form-control")
        .attr("placeholder", "Search");
    $(".dataTables_length select").addClass("form-control");

});


$(document).ready(function () {
    "use strict";
    var pageForm = $("#user_form");
    if (pageForm.length) {
        if (typeof pageForm.validate === "function") {
            pageForm.validate({
                rules: {
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                  
                    mobile_no: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    organization_name:{
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        regex: /^(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&#]).{6,}$/
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password",
                    },
                    zip: {
                        minlength: 6,
                        maxlength: 6,
                    }
                },
                messages: {
                    first_name: {
                        required: "Enter First Name",
                    },
                    last_name: {
                        required: "Enter Last Name",
                    },
                
                    mobile_no: {
                        required: "Enter Mobile Number",
                        minlength: "Mobile Number must be 10 digits.",
                        maxlength: "Mobile Number must be 10 digits.",
                    },
                    organization_name :{
                        required: "Enter Organization Name",
                    },
                    email: {
                        required: "Enter Email",
                        email: "Enter Valid Email",
                    },
                    password: {
                        required: "Enter Password",
                        minlength: "Password must be at least 6 characters long.",
                        regex: "Password must contain at least one uppercase letter, one numeric character, and one special character."
                    },
                    password_confirmation: {
                        required: "Enter Confirm Password",
                        equalTo: "Password did not match",
                    },
                    zip: {
                        minlength: "Zip must be 6 digits.",
                        maxlength: "Zip must be 6 digits.",
                    },
                },
            });

            $.validator.addMethod("regex", function(value, element, regexpr) {
                return regexpr.test(value);
            }, "Please enter a valid value.");
        }
    } else {
        console.error("jQuery Validation Plugin is not loaded");
    }

    $("#user_submit_btn").on("click", function (e) {
        e.preventDefault();
        if (!pageForm.valid()) {
            return false;
        }
        var formData = new FormData(pageForm[0]);
        $.ajax({
            url: httpPath + "manage-user",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                var obj = JSON.parse(JSON.stringify(response));
                if (obj.res == "1") {
                    $("#user_form").trigger("reset");
                    setInterval(function () {
                        window.location = httpPath + "users";
                    }, 1000);
                    toastr.success("Data Added Successfully");
                } else if (obj.res == "3") {
                    $("#user_form").trigger("reset");
                    $("#file-datatable").DataTable().ajax.reload();
                    $("#user_modal").modal("hide");
                    toastr.success("Data Updated Successfully");
                    setInterval(function() {
                        window.location.reload(true);
                    }, 500);
                } else if (obj.res == "2") {
                    toastr.info("Data Already Exist");
                } else if (obj.res == "4") {
                    toastr.info("Can't Add More Users Limit Exceeded");
                } else if (obj.res == "0") {
                    toastr.error("Something is wrong.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX request failed:", textStatus, errorThrown);
                toastr.error("AJAX request failed");
            }
        });
    });
});


function delete_record(id) {
    Swal.fire({
        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: httpPath + "delete-user",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                data: {
                    id: id
                },
                beforeSend: function () {},
                success: function (response) {
                    var obj = JSON.parse(response);

                    if (obj.res == 1) {
                        toastr.success("User Deleted Successfully");
                        $("#file-datatable").DataTable().ajax.reload();
                    } else {
                        toastr.error("Something is wrong");
                    }
                },
            });
        }
    });
}

function edit_record(id) {
    $.ajax({
        url: httpPath + "get-user-data",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        data: {
            id: id
        },
        beforeSend: function () {},
        success: function (response) {
            var obj = JSON.parse(response);
            $("#user_modal").modal("show");
			
            $("#edit_id").val(id);
            $("#first_name").val(obj.first_name);
            $("#last_name").val(obj.last_name);
            $("#email").val(obj.email);
            $("#mobile_no").val(obj.mobile_no);
            $("#organization_name").val(obj.organization_name);
            $("#role_id").val(obj.role_id).trigger('change');
            $("#edit_role_id").val(obj.role_id);
            $("#sales_target").val(obj.sales_target);
            $("#alloted_no_of_login").val(obj.alloted_no_of_login);
			
			
        }, 
    });
}

function closeUserModal() {
    $('#user_modal').modal('hide');
    $("#file-datatable").DataTable().ajax.reload();
}

$(function () {
    "use strict";
    var pageForm = $("#update_password_form");
    if (pageForm.length) {
        pageForm.validate({
            rules: {
                old_password: {
                    required: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                    regex: /^(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&#]).{6,}$/
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                old_password: {
                    required: "Enter Old Password",
                },
                password: {
                    required: "Enter New Password",
                    minlength: "Password must be at least 6 characters long.",
                    regex: "Password must contain at least one uppercase letter, one numeric character, and one special character."
                },
                password_confirmation: {
                    required: "Enter Confirm Password",
                    equalTo: "Password did not match",
                },
            },
        });

        // Add the regex validation method
        $.validator.addMethod("regex", function(value, element, regexpr) {
            return regexpr.test(value);
        }, "Please enter a valid value.");
    }
});

function submit_password() {
    if (!$("#update_password_form").valid()) {
        return false;
    }
    var formData = new FormData($("#update_password_form")[0]);
    $.ajax({
        url: httpPath + "update-profile-password",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            var obj = JSON.parse(JSON.stringify(response));
            if (obj.res == "1") {
                $("#update_password_form").trigger("reset");
                toastr.success("Password Added Successfully.");
            } else if (obj.res == "2") {
                toastr.error("Enter Correct Old Password");
            } else if (obj.res == "0") {
                toastr.error("Something is wrong.");
            }
        },
    });
}
$(function () {
    var pageForm = $("#update_user_profile");

    if (pageForm.length) {
        pageForm.validate({
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                mobile_no: {
                    required: true,
                },
                organization: {
                    required: true,
                },
                country: {
                    required: true,
                },
                zip :{
                    minlength: 6,
                    maxlength: 6,
                }
            },
            messages: {
                first_name: {
                    required: "Enter First Name",
                },
                last_name: {
                    required: "Enter Last Name",
                },
                email: {
                    required: "Enter Email Address",
                    email: "Enter a valid email address",
                },
                mobile_no: {
                    required: "Enter Mobile Number",
                },
                organization: {
                    required: "Enter Organization",
                },
                country: {
                    required: "Enter Country",
                },
                zip: {
                    minlength: "Zip must be 6 digits.",
                    maxlength: "Zip must be 6 digits.",
                },
            },
        });
    }

    $("#update_user_submit_btn").on("click", function (e) {
        e.preventDefault();

        if (!pageForm.valid()) {
            return false;
        }

        var formData = new FormData($("#update_user_profile")[0]);

        $.ajax({
            url: httpPath + "update-user-profile",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                var obj = JSON.parse(JSON.stringify(response));
                if (obj.res == "3") {
                    toastr.success("User profile updated successfully.");
                    updateProgressBar();
                    window.location.reload(true);
                } else if (obj.res == "0") {
                    toastr.error("Something went wrong while updating the profile.");
                }
            },
            error: function () {
                toastr.error("An error occurred while processing your request.");
            }
        });
    });
});

function calculateProgress() {
    var totalFields = 20;
    var updatedFields = 0;
    if ($("#first_name").val() !== '') updatedFields++;
    if ($("#last_name").val() !== '') updatedFields++;
    if ($("#email").val() !== '') updatedFields++;
    if ($("#mobile_no").val() !== '') updatedFields++;
    if ($("#organization").val() !== '') updatedFields++;
    if ($("#designation").val() !== '') updatedFields++;
    if ($("#website").val() !== '') updatedFields++;
    if ($("#telephone_direct").val() !== '') updatedFields++;
    if ($("#telephone_office").val() !== '') updatedFields++;
    if ($("#address_line_one").val() !== '') updatedFields++;
    if ($("#address_line_two").val() !== '') updatedFields++;
    if ($("#city").val() !== '') updatedFields++;
    if ($("#state").val() !== '') updatedFields++;
    if ($("#country").val() !== '') updatedFields++;
    if ($("#zip").val() !== '') updatedFields++;
    if ($("#facebook_url").val() !== '') updatedFields++;
    if ($("#twitter_url").val() !== '') updatedFields++;
    if ($("#linkedin_url").val() !== '') updatedFields++;
    if ($("#instagram_url").val() !== '') updatedFields++;
    if ($("#personal_url").val() !== '') updatedFields++;

    var completionPercentage = (updatedFields / totalFields) * 100;
    return completionPercentage;
}

function updateProgressBar() {
    var completionPercentage = calculateProgress();
    $(".progress-bar").css("width", completionPercentage + "%").text(completionPercentage + "%");
    $("#profile-progress-label").text(" Your Profile is " + completionPercentage + "% complete.");
    $("#profile-business-progress-label").text(" Your Profile is " + completionPercentage + "% complete.");

}



$(document).ready(function() {
    $(function () {
        "use strict";
        var pageForm = $("#resetPasswordForm");
        if (pageForm.length) {
            pageForm.validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                },
                messages: {
                    email: {
                        required: "Enter Email",
                        email: "Enter Valid Email",
                    },
                },
            });
        }
    });

    $('#resetPasswordForm').on('submit', function(e) {
        e.preventDefault(); 
        if (!$("#resetPasswordForm").valid()) {
            return false;
        }
        var email = $('#email').val();

        $.ajax({
            url: httpPath + "forgot-password-link",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: 'POST',
            data: {
                email: email,
            },
            success: function(response) {
                var obj = JSON.parse(JSON.stringify(response));
                if (obj.res == "1") {
                    toastr.success('Password reset link sent successfully.');
                } else if(obj.res == "0") {
                    toastr.error('Failed to send password reset link.');
                    console.error('Error:', obj.error); 
                } else if(obj.res == "2") {
                    toastr.error('User not found.');
                } else if(obj.res == "3") {
                    toastr.error('Super Admin Details Not Found.');
                }
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                if (errors.email) {
                    toastr.error(errors.email[0]);
                } else {
                    toastr.error('An error occurred. Please try again.');
                }
            }
        });
    });
});
