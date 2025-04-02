$(document).ready(function() {
    $('#social_media_form').submit(function(e) {
        e.preventDefault(); // Default submit ko roken
        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('update.socialmedia') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                toastr.success("Social media links saved successfully!");
            },
            error: function(xhr) {
                toastr.error("Something went wrong!");
            }
        });
    });
});
