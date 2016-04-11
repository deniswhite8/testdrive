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
    columns.push({data: null, width: '13%', orderable: false});

    $table
        .on('draw.dt', function () {
            initDeleteBtns($table, config);
            $table.find('.js-edit').each(function () {
                var $btn = $(this),
                    id = $table.DataTable().row($btn.closest('tr')).data().id;
                $btn.attr('href', config.url + '/' + id);
            });
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
                        <a href="#" type="button" class="btn btn-xs btn-primary js-edit">Edit\
                            <span class="glyphicon glyphicon-edit"></span></a>\
                        <button type="button" class="btn btn-xs btn-danger js-delete">Delete\
                            <span class="glyphicon glyphicon-remove"></span></button>\
                    </div>'
            }],
            dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>rt<'row'<'col-sm-6'i><'col-sm-6'p>>",
            buttons: [
                {
                    text: 'Add New <span class="glyphicon glyphicon-plus"></span>',
                    init: function (dt, node) {
                        $(node).attr('href', config.url + '/new').off('click');
                    }
                },
                {
                    text: 'Refresh <span class="glyphicon glyphicon-refresh"></span>',
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