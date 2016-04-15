var ajax = require('./ajax.js'),
    searchIndexes = [];

function initDeleteBtns($table, config) {
    $table.find('.js-delete').confirmation({
        placement: 'left',
        singleton: true,
        popout: true,
        onConfirm: function() {
            var datatable = $table.DataTable(),
                id = datatable.row($(this).closest('tr')).data().id;

            ajax({
                url: config.apiUrl + '/' + id,
                type: 'delete',

                success: function() {
                    datatable.ajax.reload(null, false);
                }
            });
        }
    });
}

function prepareRequest(request) {
    request.request_id = request.draw;
    request.count = request.length;
    request.page = Math.floor(request.start / request.length) + 1;
    request.dir = request.order[0].dir;
    request.order = searchIndexes[request.order[0].column];
    request.search = request.search.value;
}

function prepareResponse(response) {
    response.draw = response.request_id;
    response.recordsTotal = response.total;
    response.recordsFiltered = response['filtered_total'];
    response.error = response.message;
}

function initDatatable($table) {
    var config = $table.data(),
        columns = [];

    for (var fieldKey in config.fields) {
        if (!config.fields.hasOwnProperty(fieldKey)) continue;
        columns.push({data: fieldKey});
        searchIndexes.push(fieldKey.split('.').slice(-2).join('.'));
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
                url: config.apiUrl + '/query',
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