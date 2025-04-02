$(document).ready(function () {
    "use strict";
    var pageForm = $("#default_home_form");
    if (pageForm.length) {
        if (typeof pageForm.validate === "function") {
            pageForm.validate({
                rules: {
                    heading: {
                        required: true,
                    },
                   
                   
                },
                messages: {
                    heading: {
                        required: "Enter heading",
                    },
                   
                },
            });
        }
    } else {
        console.error("jQuery Validation Plugin is not loaded");
    }

    $("#default_home_submit_btn").on("click", function (e) {
        e.preventDefault();
        if (!pageForm.valid()) {
            return false;
        }
        $(this).prop("disabled", true);

        var formData = new FormData(pageForm[0]);
        $.ajax({
            url: httpPath + "manage-default-home",
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
                    $("#default_home_form").trigger("reset");
                    $("#file-datatable").DataTable().ajax.reload();
                    toastr.success("Data Added Successfully.");
                    setInterval(function () {
                        window.location = httpPath + "defalut_home";
                    }, 1000);
                } else if (obj.res == "3") {
                    $("#default_home_form").trigger("reset");
                    $("#file-datatable").DataTable().ajax.reload();
                    toastr.success("Data Updated Successfully.");
                    setInterval(function () {
                        window.location = httpPath + "defalut_home";
                    }, 1000);
                } else if (obj.res == "2") {
                    toastr.info("Slider with same email already exist.");
                } else if (obj.res == "0") {
                    toastr.error("Something is wrong.");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX request failed:", textStatus, errorThrown);
                toastr.error("AJAX request failed.");
            }
        });
    });
});

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
            sLengthdepartment: "_department_",
            sInfoFiltered: "",
            sProcessing: "Loading ...",
            sEmptyTable: "NO DATA ADDED YET !",
        },
        aLengthdepartment: [
            [-1, 10, 20, 30, 50],
            ["All", 10, 20, 30, 50],
        ],
        iDisplayLength: 10,
        sAjaxSource: httpPath + "fetch-default-home",
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
    fileDataTable.search('').draw();

    $(".dataTables_filter input")
        .addClass("form-control")
        .attr("placeholder", "Search");
    $(".dataTables_length select").addClass("form-control");

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
                url: httpPath + "delete-default-home",
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
                        toastr.success("Default Home Page Deleted Successfully.");
                        $("#file-datatable").DataTable().ajax.reload();
                    } else {
                        toastr.error("Something is wrong.");
                    }
                },
            });
        }
    });
}

