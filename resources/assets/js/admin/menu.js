function initSearch() {
    var $menuItemTextElements = $('.js-menu-item-text');

    $menuItemTextElements.each(function() {
        var $item = $(this);
        $item.data('text', $item.text());
    });

    $('#menuSearch').on('input', function (event) {
        var searchText = $(this).val().trim();

        $menuItemTextElements.each(function() {
            var $item = $(this),
                text = $item.data('text');

            if (searchText) {
                text = text.replace(new RegExp(searchText, 'ig'),
                    function (match) {
                        return '<span class="search-highlight">' + match + '</span>';
                    });
            }

            $item.html(text);
        });
    });
}

$(function() {
    initSearch();
});