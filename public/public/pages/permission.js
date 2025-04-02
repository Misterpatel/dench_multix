$('#permissionForm').submit(function(e){
    e.preventDefault(); // Prevent default form submission

    $.ajax({
        url: httpPath + "manage-menupermission",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        data: $(this).serialize(), // Serialize the entire form
        success: function(response) {
            if(response.res == '1') {
                toastr.success("Permissions updated successfully.");
            } else {
                toastr.error("Failed to update permissions.");
            }
        },
        error: function() {
            toastr.error("An error occurred. Please try again.");
        }
    });
});