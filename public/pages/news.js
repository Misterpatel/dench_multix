$(document).ready(function () {
    "use strict";
    var pageForm = $("#news_form");
    if (pageForm.length) {
        if (typeof pageForm.validate === "function") {
            pageForm.validate({
                rules: {
                    news_title: {
                        required: true,
                    },
                    news_content_short: {
                        required: true,
                    },
                    news_content: {
                        required: true,
                    },
                    news_date: {
                        required: true,
                        date: true, // Validate as a date
                    },
                 
                    category_id: {
                        required: true,
                    },
                    comment: {
                        required: true,
                    },
                   
                },
                messages: {
                    news_title: {
                        required: "Enter News Title",
                    },
                    news_content_short: {
                        required: "Enter Short Content",
                    },
                    news_content: {
                        required: "Enter News Content",
                    },
                    news_date: {
                        required: "Enter News Date",
                        date: "Enter a valid date",
                    },
                  
                    category_id: {
                        required: "Select a category",
                    },
                    comment: {
                        required: "Specify whether comments are allowed",
                    },
                   
                },
            });
        }
    } else {
        console.error("jQuery Validation Plugin is not loaded");
    }

    $("#news_submit_btn").on("click", function (e) {
        e.preventDefault();
        if (!pageForm.valid()) {
            return false;
        }
        $(this).prop("disabled", true);

        var formData = new FormData(pageForm[0]);
        $.ajax({
            url: httpPath + "manage-news",
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
                    $("#news_form").trigger("reset");
                    $("#file-datatable").DataTable().ajax.reload();
                    toastr.success("Data Added Successfully.");
                    setInterval(function () {
                        window.location = httpPath + "news";
                    }, 1000);
                } else if (obj.res == "3") {
                    $("#news_form").trigger("reset");
                    $("#file-datatable").DataTable().ajax.reload();
                    toastr.success("Data Updated Successfully.");
                    setInterval(function () {
                        window.location = httpPath + "news";
                    }, 1000);
                } else if (obj.res == "2") {
                    toastr.info("News with same email already exist.");
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
        sAjaxSource: httpPath + "fetch-news",
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
                url: httpPath + "delete-news",
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
                        toastr.success("News Deleted Successfully.");
                        $("#file-datatable").DataTable().ajax.reload();
                    } else {
                        toastr.error("Something is wrong.");
                    }
                },
            });
        }
    });
}

