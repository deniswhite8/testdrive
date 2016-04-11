var ajax = require('./ajax.js');

function initForm() {
    var $form = $('#editForm'),
        apiUrl = $form.data('apiUrl'),
        modelId = $form.data('modelId'),
        url = $form.data('url'),
        inputs = {};

    $form.find('input').each(function() {
        var $input = $(this);
        inputs[$input.attr('name')] = $input;
    });

    $form.on('reset', function(event) {
        if (!modelId) return;

        event.preventDefault();
        ajax({
            url: apiUrl + '/' + modelId,
            method: 'get',

            success: function(data) {
                for (var field in data) {
                    var input = inputs[field];
                    if (!data.hasOwnProperty(field) || !input) continue;
                    inputs[field].val(data[field]);
                }
            }
        });
    });

    $form.on('submit', function(event) {
        event.preventDefault();

        ajax({
            url: apiUrl + '/' + modelId,
            method: modelId ? 'put' : 'post',
            data: $form.serialize(),

            success: function(data) {
                modelId = data.id;
                history.replaceState(null, null, url + '/' + data.id)
            }
        });
    });

    $form.trigger('reset');
}

$(function() {
    initForm();
});