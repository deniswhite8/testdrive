var $body = $('body'),
    csrfToken = $('meta[name="csrf-token"]').attr('content'),
    timeoutHandle = null,
    activeRequests = 0,
    defaults = {
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },

        beforeSend: function() {
            activeRequests++;

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
            activeRequests--;
            if (activeRequests) return;

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
