function fetchLeadStagesData(selectedListIds) {
    var selectedListIds = selectedListIds;
    $.ajax({
        url: httpPath + "get-lead-stages-data",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: 'GET',
        data: {
            selectedListIds: selectedListIds
        },
        success: function (response) {
            var chartData = JSON.parse(response.chartData);
            $('#leadStagesTableContainer').html(response.tableHtml);
            $('.filteredlist').html(response.totalLeadsCount);
            
            initializeChart(chartData); 
            $('#filtered_list_link').attr('href', 'get-leads-view/0/' + selectedListIds);

        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
}


function initializeChart(chartData) {
    var columns = chartData.map(function(item) {
        return [item.name, item.count];
    });

    var predefinedColors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd',
                            '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf',
                            '#aec7e8', '#ffbb78', '#98df8a', '#ff9896', '#c5b0d5',
                            '#c49c94', '#f7b6d2', '#c7c7c7', '#dbdb8d', '#9edae5'];

    var colors = {};
    chartData.forEach(function(item, index) {
        colors[item.name] = predefinedColors[index % predefinedColors.length];
    });

    var names = chartData.reduce(function(acc, item) {
        acc[item.name] = item.name;
        return acc;
    }, {});

    c3.generate({
        bindto: '#leadsStageChart',
        data: {
            columns: columns,
            type: 'donut',
            colors: colors,
            names: names
        },
        axis: {},
        legend: {
            show: false,
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });
    var legendHtml = columns.map(function(item) {
        var color = colors[item[0]];
        var name = item[0];
        return '<div style="display: flex; align-items: center; margin: 5px 0;">' +
                   '<div style="width: 20px; height: 20px; background-color: ' + color + '; margin-right: 10px;"></div>' +
                   '<div>' + name + '</div>' +
               '</div>';
    }).join('');

    document.getElementById('leadsStage').innerHTML = legendHtml;

}

function openSelectListDataModal()
{
    $('#dashboard_select_list_modal').modal('show');
    showSelectListData();
    $('.list_name').text('');
}
function closeSelectListModal() {
    $('#dashboard_select_list_modal').modal('hide');
}

function showSelectListData() {
    $.ajax({
        url: httpPath + "get-select-list-data",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: 'GET',
        success: function(response) {
            $(".dashboard_select_list_view").html(response);
            var selectedListIds = sessionStorage.getItem('selectedListIds');
            if (selectedListIds) {
                selectedListIds = selectedListIds.split(',');
                selectedListIds.forEach(function(id) {
                    $(".selected_list_id[value='" + id + "']").prop('checked', true);
                });
                $('.selected_list_id_count').html(selectedListIds.length);
                fetchLeadStagesData(selectedListIds)
                fetchLeadProductGroupData(selectedListIds)
                fetchLeadCustomerGroupData(selectedListIds)
                fetchLeadTagData(selectedListIds)
                fetchLeadPotentialData(selectedListIds)
                fetchLeadStageDealSizeData(selectedListIds)
            } else {
                $(".selected_list_id:first").prop('checked', true);
                var firstSelectedId = $(".selected_list_id:first").val();
                sessionStorage.setItem('selected_list', firstSelectedId);
                $('#selected_list_ids').val(firstSelectedId);
                $('.selected_list_id_count').html('1');
                fetchLeadStagesData(firstSelectedId)
                fetchLeadProductGroupData(firstSelectedId)
                fetchLeadCustomerGroupData(firstSelectedId)
                fetchLeadTagData(firstSelectedId)
                fetchLeadPotentialData(firstSelectedId)
                fetchLeadStageDealSizeData(firstSelectedId)
            }
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
}

$('#dashboard_select_list_submit_btn').click(function() {
    var selectedListIds = [];
    $(".selected_list_id:checked").each(function() {
        selectedListIds.push($(this).val());
    });
    if (selectedListIds.length === 0) {
        showToastError("Please select at least one list.");
        return;
    }
    sessionStorage.setItem('selectedListIds', selectedListIds.join(','));
    $('#selected_list_ids').val(selectedListIds.join(','));
    $('.selected_list_id_count').html(selectedListIds.length);
    fetchLeadStagesData(sessionStorage.getItem('selectedListIds'))
    fetchLeadProductGroupData(sessionStorage.getItem('selectedListIds'))
    fetchLeadCustomerGroupData(sessionStorage.getItem('selectedListIds'))
    fetchLeadTagData(sessionStorage.getItem('selectedListIds'))
    fetchLeadPotentialData(sessionStorage.getItem('selectedListIds'))
    fetchLeadStageDealSizeData(sessionStorage.getItem('selectedListIds'))
    closeSelectListModal();
});

$(window).on('load', function() {
    var firstSelectedId = $(".selected_list_id:first").val();
    $('#selected_list_ids').val(firstSelectedId);
});

$(window).on('beforeunload', function(){
    sessionStorage.removeItem('selectedListIds');
    sessionStorage.getItem('selected_list');
    $('#selected_list_ids').val(sessionStorage.getItem('selected_list'));
});



function searchList() {
    var searchTerm = $('#search_list').val();

    $.ajax({
        url: httpPath + 'search-select-list-data',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: 'GET',
        data: { search_term: searchTerm },
        success: function(response) {
            updateListView(response);
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
}


function updateListView(data) {
    $('.dashboard_select_list_view').empty();
    data.forEach(function(list) {
        var row = '<tr>' +
            '<td><label class="custom-control custom-radio">' +
            '<input type="radio" class="custom-control-input selected_list_id" name="selected_list_id" value="' + list.id + '">' +
            '<span class="custom-control-label"></span>' +
            '</label></td>' +
            '<td>' + list.list_name + '</td>' +
            '<td>' + list.lead_count + '</td>' +
            '</tr>';

        $('.dashboard_select_list_view').append(row);
    });
}

function closeSelectListDataModal()
{
    $('#dashboard_select_list_modal').modal('hide');
}


function fetchLeadProductGroupData(selectedListIds) {
    var selectedListIds = selectedListIds;
    $.ajax({
        url: httpPath + "get-lead-product-group-data",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: 'GET',
        data: {
            selectedListIds: selectedListIds
        },
        success: function (response) {
            var chartData = JSON.parse(response.chartData);
            $('#leadProductGroupTableContainer').html(response.tableHtml);
            $('.filteredlist').html(response.totalLeadsCount);
            
            initializeProductGroupChart(chartData); 
            $('#filtered_list_link').attr('href', 'get-leads-view/0/' + selectedListIds);

        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
}


function initializeProductGroupChart(chartData) {
    var columns = chartData.map(function(item) {
        return [item.name, item.count];
    });

    var predefinedColors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd',
                            '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf',
                            '#aec7e8', '#ffbb78', '#98df8a', '#ff9896', '#c5b0d5',
                            '#c49c94', '#f7b6d2', '#c7c7c7', '#dbdb8d', '#9edae5'];

    var colors = {};
    chartData.forEach(function(item, index) {
        colors[item.name] = predefinedColors[index % predefinedColors.length];
    });

    var names = chartData.reduce(function(acc, item) {
        acc[item.name] = item.name;
        return acc;
    }, {});

    c3.generate({
        bindto: '#leadsProductGroupChart',
        data: {
            columns: columns,
            type: 'donut',
            colors: colors,
            names: names
        },
        axis: {},
        legend: {
            show: false,
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });
    var legendHtml = columns.map(function(item) {
        var color = colors[item[0]];
        var name = item[0];
        return '<div style="display: flex; align-items: center; margin: 5px 0;">' +
                   '<div style="width: 20px; height: 20px; background-color: ' + color + '; margin-right: 10px;"></div>' +
                   '<div>' + name + '</div>' +
               '</div>';
    }).join('');

    document.getElementById('leadsProductGroup').innerHTML = legendHtml;

}

function fetchLeadCustomerGroupData(selectedListIds) {
    var selectedListIds = selectedListIds;
    $.ajax({
        url: httpPath + "get-lead-customer-group-data",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: 'GET',
        data: {
            selectedListIds: selectedListIds
        },
        success: function (response) {
            var chartData = JSON.parse(response.chartData);
            $('#leadCustomerGroupTableContainer').html(response.tableHtml);
            $('.filteredlist').html(response.totalLeadsCount);
            
            initializeCustomerGroupChart(chartData); 
            $('#filtered_list_link').attr('href', 'get-leads-view/0/' + selectedListIds);

        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
}


function initializeCustomerGroupChart(chartData) {
    var columns = chartData.map(function(item) {
        return [item.name, item.count];
    });

    var predefinedColors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd',
                            '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf',
                            '#aec7e8', '#ffbb78', '#98df8a', '#ff9896', '#c5b0d5',
                            '#c49c94', '#f7b6d2', '#c7c7c7', '#dbdb8d', '#9edae5'];

    var colors = {};
    chartData.forEach(function(item, index) {
        colors[item.name] = predefinedColors[index % predefinedColors.length];
    });

    var names = chartData.reduce(function(acc, item) {
        acc[item.name] = item.name;
        return acc;
    }, {});

    c3.generate({
        bindto: '#leadsCustomerGroupChart',
        data: {
            columns: columns,
            type: 'donut',
            colors: colors,
            names: names
        },
        axis: {},
        legend: {
            show: false,
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });
    var legendHtml = columns.map(function(item) {
        var color = colors[item[0]];
        var name = item[0];
        return '<div style="display: flex; align-items: center; margin: 5px 0;">' +
                   '<div style="width: 20px; height: 20px; background-color: ' + color + '; margin-right: 10px;"></div>' +
                   '<div>' + name + '</div>' +
               '</div>';
    }).join('');

    document.getElementById('leadsCustomerGroup').innerHTML = legendHtml;

}

function fetchLeadTagData(selectedListIds) {
    var selectedListIds = selectedListIds;
    $.ajax({
        url: httpPath + "get-lead-tag-data",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: 'GET',
        data: {
            selectedListIds: selectedListIds
        },
        success: function (response) {
            var chartData = JSON.parse(response.chartData);
            $('#leadTagTableContainer').html(response.tableHtml);
            $('.filteredlist').html(response.totalLeadsCount);
            
            initializeTagChart(chartData); 
            $('#filtered_list_link').attr('href', 'get-leads-view/0/' + selectedListIds);

        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
}

function initializeTagChart(chartData) {
    var columns = chartData.map(function(item) {
        return [item.name, item.count];
    });

    var predefinedColors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd',
                            '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf',
                            '#aec7e8', '#ffbb78', '#98df8a', '#ff9896', '#c5b0d5',
                            '#c49c94', '#f7b6d2', '#c7c7c7', '#dbdb8d', '#9edae5'];

    var colors = {};
    chartData.forEach(function(item, index) {
        colors[item.name] = predefinedColors[index % predefinedColors.length];
    });

    var names = chartData.reduce(function(acc, item) {
        acc[item.name] = item.name;
        return acc;
    }, {});

    c3.generate({
        bindto: '#leadsTagChart',
        data: {
            columns: columns,
            type: 'donut',
            colors: colors,
            names: names
        },
        axis: {},
        legend: {
            show: false,
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });
    var legendHtml = columns.map(function(item) {
        var color = colors[item[0]];
        var name = item[0];
        return '<div style="display: flex; align-items: center; margin: 5px 0;">' +
                   '<div style="width: 20px; height: 20px; background-color: ' + color + '; margin-right: 10px;"></div>' +
                   '<div>' + name + '</div>' +
               '</div>';
    }).join('');

    document.getElementById('leadsTag').innerHTML = legendHtml;

}

function fetchLeadPotentialData(selectedListIds) {
    var selectedListIds = selectedListIds;
    $.ajax({
        url: httpPath + "get-lead-potential-data",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: 'GET',
        data: {
            selectedListIds: selectedListIds
        },
        success: function (response) {
            var chartData = JSON.parse(response.chartData);
            $('#leadPotentialTableContainer').html(response.tableHtml);
            $('.filteredlist').html(response.totalLeadsCount);
            
            initializePotentialChart(chartData); 
            $('#filtered_list_link').attr('href', 'get-leads-view/0/' + selectedListIds);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
}

function initializePotentialChart(chartData) {
    var columns = chartData.map(function(item) {
        return [item.name, item.count];
    });

    var predefinedColors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd',
                            '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf',
                            '#aec7e8', '#ffbb78', '#98df8a', '#ff9896', '#c5b0d5',
                            '#c49c94', '#f7b6d2', '#c7c7c7', '#dbdb8d', '#9edae5'];

    var colors = {};
    chartData.forEach(function(item, index) {
        colors[item.name] = predefinedColors[index % predefinedColors.length];
    });

    var names = chartData.reduce(function(acc, item) {
        acc[item.name] = item.name;
        return acc;
    }, {});

    var chart = c3.generate({
        bindto: '#leadsPotentialChart',
        data: {
            columns: columns,
            type: 'donut',
            colors: colors,
            names: names
        },
        axis: {},
        legend: {
            show: false,
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });

    var legendHtml = columns.map(function(item) {
        var color = colors[item[0]];
        var name = item[0];
        return '<div style="display: flex; align-items: center; margin: 5px 0;">' +
                   '<div style="width: 20px; height: 20px; background-color: ' + color + '; margin-right: 10px;"></div>' +
                   '<div>' + name + '</div>' +
               '</div>';
    }).join('');

    document.getElementById('leadsPotential').innerHTML = legendHtml;
}


function fetchLeadStageDealSizeData(selectedListIds) {
    var selectedListIds = selectedListIds;
    $.ajax({
        url: httpPath + "get-lead-stages-deal-size-data",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: 'GET',
        data: {
            selectedListIds: selectedListIds
        },
        success: function (response) {
            var chartData = JSON.parse(response.chartData);
            $('#leadStageDealSizeTableContainer').html(response.tableHtml);
            $('.filteredlist').html(response.totalLeadsCount);
            
            initializeLeadStageDealSizeChart(chartData); 
            $('#filtered_list_link').attr('href', 'get-leads-view/0/' + selectedListIds);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
        }
    });
}

function initializeLeadStageDealSizeChart(chartData) {
    var columns = chartData.map(function(item) {
        return [item.name, item.count];
    });

    var predefinedColors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd',
                            '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf',
                            '#aec7e8', '#ffbb78', '#98df8a', '#ff9896', '#c5b0d5',
                            '#c49c94', '#f7b6d2', '#c7c7c7', '#dbdb8d', '#9edae5'];

    var colors = {};
    chartData.forEach(function(item, index) {
        colors[item.name] = predefinedColors[index % predefinedColors.length];
    });

    var names = chartData.reduce(function(acc, item) {
        acc[item.name] = item.name;
        return acc;
    }, {});

    var chart = c3.generate({
        bindto: '#leadsStageDealSizeChart',
        data: {
            columns: columns,
            type: 'donut',
            colors: colors,
            names: names
        },
        axis: {},
        legend: {
            show: false,
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });

    var legendHtml = columns.map(function(item) {
        var color = colors[item[0]];
        var name = item[0];
        return '<div style="display: flex; align-items: center; margin: 5px 0;">' +
                   '<div style="width: 20px; height: 20px; background-color: ' + color + '; margin-right: 10px;"></div>' +
                   '<div>' + name + '</div>' +
               '</div>';
    }).join('');

    document.getElementById('leadsStageDealSize').innerHTML = legendHtml;
}
