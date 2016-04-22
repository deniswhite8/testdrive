var ajax = require('./ajax.js');

function initValidator() {
    var _origRequiredMethod = $.validator.methods.required;

    $.validator.methods.required = function(value, element, param) {
        var result = _origRequiredMethod.call(this, value, element, param);
        if (result === false) {
            result = !!$(element).data('value');
        }

        return result;
    };
}

function initForm() {
    var $form = $('#editForm'),
        apiUrl = $form.data('apiUrl'),
        modelId = $form.data('modelId'),
        url = $form.data('url'),
        $fileResets = $form.find('.js-file-reset'),
        inputs = {};

    $form.find('input, textarea').not('.js-file-reset').each(function() {
        var $input = $(this);
        inputs[$input.attr('name')] = $input;
    });

    function _updateFormFields(data) {
        $fileResets.prop('checked', false);

        for (var field in data) {
            var input = inputs[field];
            if (!data.hasOwnProperty(field) || !input) continue;
            if (input.attr('type') != 'file') input.val(data[field]);
            input.triggerHandler('set-value', data[field]);
        }

        $form.valid();
    }

    $form.on('reset', function(event) {
        if (!modelId) return;

        event.preventDefault();
        ajax({
            url: apiUrl + '/' + modelId,
            method: 'get',

            success: _updateFormFields
        });
    });

    $form.on('submit', function(event) {
        event.preventDefault();

        if (!$form.valid()) {
            return;
        }

        ajax({
            url: apiUrl + '/' + modelId,
            method: 'post',
            data: new FormData($form[0]),
            contentType: false,
            processData: false,

            success: function(data) {
                modelId = data.id;
                history.replaceState(null, null, url + '/' + data.id);
                _updateFormFields(data);
            }
        });
    });

    $form.validate();
    $form.trigger('reset');
}

$(function() {
    initValidator();
    initForm();
});