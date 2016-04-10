var ajax = require('./ajax.js');

function initDeleteBtns($table, config) {
    $table.find('.js-delete').confirmation({
        placement: 'left',
        singleton: true,
        popout: true,
        onConfirm: function() {
            var datatable = $table.DataTable(),
                id = datatable.row($(this).closest('tr')).data().id;

            ajax({
                url: config.url + '/' + id,
                type: 'delete',

                success: function() {
                    datatable.ajax.reload(null, false);
                }
            });
        }
    });
}

function prepareRequest(request) {
    request.count = request.length;
    request.page = Math.floor(request.start / request.length) + 1;
}

function prepareResponse(response) {
    response.recordsTotal = response.total;
    response.recordsFiltered = response.total;
    response.error = response.message;
}

function initDatatable($table) {
    var config = $table.data(),
        columns = [];

    for (var fieldKey in config.fields) {
        if (!config.fields.hasOwnProperty(fieldKey)) continue;
        columns.push({data: fieldKey});
    }
    columns.push({data: null, width: '10%', orderable: false});

    $table
        .on('draw.dt', function () {
            initDeleteBtns($table, config);
        })
        .on('xhr.dt', function (event, settings, response) {
            prepareResponse(response);
        })
        .DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: config.url,
                data: function(request) {
                    prepareRequest(request);
                }
            },
            columns: columns,
            columnDefs: [{
                targets: -1,
                defaultContent:
                    '<div class="btn-group" role="group" aria-label="Actions">\
                        <button type="button" class="btn btn-xs btn-primary js-edit">Edit</button>\
                        <button type="button" class="btn btn-xs btn-danger js-delete">Delete</button>\
                    </div>'
            }],
            dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>rtip",
            buttons: [
                {
                    text: 'Add New',
                    action: function () {
                        alert(123);
                    }
                },
                {
                    text: 'Refresh',
                    action: function () {
                        $table.DataTable().ajax.reload(null, false);
                    }
                }
            ]
        });
}

$(function() {
    $('.js-datatable').each(function() {
        initDatatable($(this));
    });
});