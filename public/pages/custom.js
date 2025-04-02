$("input.alphanumeric").keypress(function (event) {
    var regex = new RegExp("^[a-zA-Z0-9 ]+$");
    var key = String.fromCharCode(
        !event.charCode ? event.which : event.charCode
    );
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$(document).ready(function () {
    $("input.metaslug").keypress(function (event) {
        var regex = new RegExp("^[a-z0-9-]+$");
        var key = String.fromCharCode(event.which);
        
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
});


$("input.mobile").keypress(function(event) {
    var regex = /^[0-9]{0,10}$/;
    var key = String.fromCharCode(
        !event.charCode ? event.which : event.charCode
    );
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
    var inputValue = $(this).val() + key;
    if (inputValue.length === 1 && /[0-5]/.test(key)) {
        event.preventDefault();
        return false;
    }
    if (inputValue.length > 10) {
        event.preventDefault();
        return false;
    }
});

$("input.numbers").keypress(function (event) {
    return /\d/.test(String.fromCharCode(event.keyCode));
});

$("input.decimal").keypress(function (event) {
    const charCode = event.which ? event.which : event.keyCode;
    const charStr = String.fromCharCode(charCode);
    const inputVal = $(this).val();

    // Allow digits and a single decimal point
    if (!/\d/.test(charStr) && charStr !== '.' || (charStr === '.' && inputVal.indexOf('.') !== -1)) {
        return false;
    }
});


$("input.alpha").keypress(function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(
        !event.charCode ? event.which : event.charCode
    );
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

const field = document.getElementById('typehead_search');
const ac = new Autocomplete(field, {
    data: [], 
    maximumItems: 100,
    threshold: 1,
    onSelectItem: ({label, value}) => {
        window.location.href = `https://app.denchinfotech.in/lms/lead-profile/${value}`;
    },
});

field.addEventListener('input', function() {
    let query = field.value;

    if (query.length > 0) {
        $.ajax({
            url: httpPath + "search-global-leads",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: 'GET',
            data: { term: query },
            success: function(data) {
                let newData = data.map(lead => {
                    return {
                        label: `${lead.first_name} ${lead.last_name}`,
                        value: lead.id
                    };
                });

                ac.setData(newData);
            }
        });
    } else {
        ac.setData([]); 
    }
});


function validateGST() {
    var gstNumber = document.getElementById("gstno").value;
    var gstRegex = /^[0-9]{15}$/; 
    if (!gstRegex.test(gstNumber)) {
        toastr.error("Please enter a valid 15-digit GST number.");
        return false;
    }
    return true;
}

$(document).ready(function () {
    // Initialize Select2
    $('.select2').select2();

    // Hide error label on change for any select2 element
    $('.select2').on('change', function () {
        var selectId = $(this).attr('id');
        $('#' + selectId + '-error').hide();
    });
});


$(document).ready(function() {
    function fetchNotifications() {
        $.ajax({
            url: httpPath + "get-notifications",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            method: 'GET',
            success: function(response) {
                if (response.notifications && response.notifications.length > 0) {
                    var notificationsCount = response.notifications.length;
                    $('#count_notification').html(notificationsCount);

                    // Clear previous notifications
                    $('.notifications-menu').empty();

                    // Append new notifications
                    $.each(response.notifications, function(index, notification) {
                        var notificationHtml = '';

                        // Handle 'follow_up' notifications
                        if (notification.type === 'follow_up') {
                            notificationHtml = `
                                <a class="dropdown-item d-flex" href="leads">
                                    <div class="me-3 notifyimg bg-primary brround box-shadow-primary">
                                        <i class="fa fa-phone" style="margin-top: 12px;"></i>
                                    </div>
                                    <div class="mt-1 wd-80p">
                                        <h5 class="notification-label mb-1">${notification.message}</h5>
                                    </div>
                                </a>`;
                        }

                        // Handle 'payment' notifications
                        if (notification.type === 'payment') {
                            notificationHtml = `
                                <a class="dropdown-item d-flex" href="bookings">
                                    <div class="me-3 notifyimg bg-warning brround box-shadow-warning">
                                        <i class="fa fa-money" style="margin-top: 12px;"></i>
                                    </div>
                                    <div class="mt-1 wd-80p">
                                        <h5 class="notification-label mb-1">${notification.message}</h5>
                                    </div>
                                </a>`;
                        }

                        // Append to the notification menu
                        $('.notifications-menu').append(notificationHtml);
                    });
                } else {
                    $('#count_notification').html(0);
                    $('.notifications-menu').html('<li class="dropdown-item text-muted">No new notifications</li>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching notifications:", status, error);
            }
        });
    }

    // Initial fetch and refresh every 5 seconds
    fetchNotifications();
    setInterval(fetchNotifications, 5000);
});


$(".start-date").datepicker({
    templates: {
        leftArrow: '<i class="fa fa-chevron-left"></i>',
        rightArrow: '<i class="fa fa-chevron-right"></i>',
    },
    startView: "months",
    minViewMode: "months",
    format: "mm-yyyy",
    keyboardNavigation: false,
    autoclose: true,
    disableTouchKeyboard: true,
    orientation: "bottom auto",
    minDate: "today",
});

document.addEventListener('DOMContentLoaded', function () {
    var today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
    var dateInputs = document.getElementsByClassName('current-date'); // Get all elements with class 'current-date'

    // Loop through all date inputs and set the min attribute
    for (var i = 0; i < dateInputs.length; i++) {
        var dateInput = dateInputs[i];
        dateInput.setAttribute('min', today); // Set the minimum date for each input field

        // Optionally, you can add additional validation in case JavaScript is disabled
        dateInput.addEventListener('input', function () {
            if (this.value < today) {
                this.value = today;
            }
        });
    }
});