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
            sLengthMenu: "_MENU_",
            sInfoFiltered: "",
            sProcessing: "Loading ...",
            sEmptyTable: "NO DATA ADDED YET !",
        },
        aLengthMenu: [
            [-1, 10, 20, 30, 50],
            ["All", 10, 20, 30, 50],
        ],
        iDisplayLength: 10,
        sAjaxSource: httpPath + "fetch-menu",
        fnServerParams: function (aoData) {
            aoData.push({
                name: "parent_id",
                value: $("#parent_id").val()
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


$(document).ready(function () {
    "use strict";
    var pageForm = $("#menu_form");
    if (pageForm.length) {
        if (typeof pageForm.validate === "function") {
            pageForm.validate({
                rules: {
                    name: {
                        required: true,
                    },
                    icon: {
                        required: true,
                    },
                    order_by: {
                        required: true,
                    },

                },
                messages: {

                    name: {
                        required: "Enter Menu Name",
                    },
                    icon: {
                        required: "Enter Menu Icon",
                    },
                    order_by: {
                        required: "Enter Menu Order",
                    },

                },
            });
        }
    } else {
        console.error("jQuery Validation Plugin is not loaded");
    }

    $("#menu_submit_btn").on("click", function (e) {
        e.preventDefault();
        if (!pageForm.valid()) {
            return false;
        }
        var formData = new FormData(pageForm[0]);
        $.ajax({
            url: httpPath + "manage-menu",
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
                    $("#menu_form").trigger("reset");
                    $("#module_id").val('').trigger('change');
                    $("#file-datatable").DataTable().ajax.reload();
                    toastr.success( "Data Added Successfully.");
                } else if (obj.res == "3") {
                    $("#menu_form").trigger("reset");
                    $("#file-datatable").DataTable().ajax.reload();
                    toastr.success( "Data Updated Successfully.");
                } else if (obj.res == "2") {
                    toastr.info("Data Already Exist.");
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
                url: httpPath + "delete-menu",
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
                        toastr.success("Menu Deleted Successfully.");
                        $("#file-datatable").DataTable().ajax.reload();
                    } else {
                        toastr.error("Something is wrong.");
                    }
                },
            });
        }
    });
}

function edit_record(id) {
    $.ajax({
        url: httpPath + "get-menu-data",
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
            // console.log(obj);
            $("#edit_modal").modal("show");
            $("#edit_module_id").val(obj.module_id).trigger('change');
            $("#edit_menu_name").val(obj.name);
            $("#edit_icon").val(obj.icon);
            $("#edit_menu_link").val(obj.link);
            $("#edit_order_by").val(obj.order_by);
            $("#edit_id").val(id);

        },
    });
}
$(document).ready(function () {
    "use strict";
    var pageForm = $("#edit_menus_form");
    if (pageForm.length) {
        if (typeof pageForm.validate === "function") {
            pageForm.validate({
                rules: {
                    edit_menu_name: {
                        required: true,
                    },
                    edit_icon: {
                        required: true,
                    },
                    edit_order_by: {
                        required: true,
                    },

                },
                messages: {

                    edit_menu_name: {
                        required: "Enter Menu Name",
                    },
                    edit_icon: {
                        required: "Enter Menu Icon",
                    },
                    edit_order_by: {
                        required: "Enter Menu Order",
                    },

                },
            });
        }
    } else {
        console.error("jQuery Validation Plugin is not loaded");
    }
    $("#edit_menu_submit_btn").on("click", function (e) {
        e.preventDefault();
        if (!pageForm.valid()) {
            return false;
        }
        var formData = new FormData(pageForm[0]);
        $.ajax({
            url: httpPath + "manage-menu",
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
                    $("#menu_form").trigger("reset");
                    $("#file-datatable").DataTable().ajax.reload();
                    toastr.success("Data Added Successfully.");
                } else if (obj.res == "3") {
                    $("#menu_form").trigger("reset");
              
                    $("#file-datatable").DataTable().ajax.reload();
                    $("#edit_modal").modal("hide");
                    toastr.success("Data Updated Successfully.");
                } else if (obj.res == "2") {
                    toastr.info("Data Already Exist.");
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

function closeMenuModal()
{
    $('#edit_modal').modal('hide');
    $("#file-datatable").DataTable().ajax.reload();
}