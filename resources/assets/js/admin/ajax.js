var $body = $('body'),
    csrfToken = $('meta[name="csrf-token"]').attr('content'),
    defaults = {
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },

        beforeSend: function() {
            $.fancybox.helpers.overlay.open({parent: $body, closeClick: false});
            $.fancybox.showLoading();
        },

        error: function(xhr, status, error) {
            $.fancybox(error);
        },

        complete: function() {
            if ($.fancybox.current) return;

            $.fancybox.hideLoading();
            $.fancybox.helpers.overlay.close();
        }
    };

module.exports = function (settings) {
    $.ajax($.extend(defaults, settings));
};
