"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.fn.serializeObject = function() {
    var data = {};
    _.each(this.serializeArray(), function(item) {
        data[item.name] = item.value;
    });

    return data;
};

$.fn.clear = function () {
    return $(this).val(null).trigger('change').trigger('clear');
};

$(function() {
    $('select.js-select').each(function() {
        var $select = $(this);

        $select
            .select2($.extend({
                theme: 'bootstrap',
                allowClear: true
            }, $select.data()))
            .on('clear', function() {
                $select.children().not(':first').remove();
            })
        ;
    });

    $('input.js-datetime').datetimepicker({
        lang: 'ru',
        step: 30,
        minDate: 0
    });
});