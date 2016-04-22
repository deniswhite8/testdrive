function initDatetime() {
    $('.js-datetime').datetimepicker({
        format: 'd.m.Y H:i',
        step: 30
    });
}

function initImageInput() {
    $('.js-image-input').on('set-value', function(event, value) {
        var $this = $(this),
            $container = $this.prev(),
            $glyphicon = $container.find('.glyphicon'),
            $img = $container.find('img');

        $this.val('');
        $this.data('value', value);

        if (value) {
            $container.addClass('_with-image');
            $glyphicon.hide();
            $img.attr('src', $img.data('baseUrl') + '/' + value).show();
        } else {
            $container.removeClass('_with-image');
            $glyphicon.show();
            $img.attr('src', '').hide();
        }

        $img.parent().attr('href', $img.attr('src'));
    });
}

$(function() {
    initDatetime();
    initImageInput();
});