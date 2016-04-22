var $body = $('body'),
    csrfToken = $('meta[name="csrf-token"]').attr('content'),
    timeoutHandle = null,
    defaults = {
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },

        beforeSend: function() {
            clearTimeout(timeoutHandle);
            timeoutHandle = setTimeout(function() {
                $.fancybox.helpers.overlay.open({parent: $body, closeClick: false});
                $.fancybox.showLoading();
            }, 300);
        },

        error: function(xhr, status, error) {
            $.fancybox(error);
        },

        complete: function() {
            clearTimeout(timeoutHandle);
            $.fancybox.hideLoading();

            if (!$.fancybox.current) {
                $.fancybox.helpers.overlay.close();
            }
        }
    };

module.exports = function (settings) {
    $.ajax($.extend({}, defaults, settings));
};
