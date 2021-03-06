var ajax = require('./ajax.js');

function initDatetime() {
    $('.js-datetime').datetimepicker({
        step: 30
    });
}

function initImageInput() {
    $('.js-image-input').on('set-value', function(event, data) {
        var $this = $(this),
            value = data.value,
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

function initSelect() {
    var $selects = $('.js-select');

    $selects.select2({
        theme: 'bootstrap'
    });

    $selects.on('set-value', function(event, data) {
        $(this).trigger('change').data('tmpValue', data.value);
    });

    $selects.on('change', function() {
        var $parent = $(this),
            $dependent = $parent.data('dependent');

        if (!$dependent) {
            $dependent = $('.js-select[data-parent=' + $parent[0].id + ']');
            $parent.data('dependent', $dependent);
        }

        $(this).valid();

        $dependent.each(function() {
            var $this = $(this),
                options = [{id: '0', text: '\xa0'}];

            if (!$parent.val() || $parent.val() == '0') {
                $this.empty().select2({
                    theme: 'bootstrap',
                    data: options
                });
                $this.val('0').trigger('change');
                return;
            }

            var optionName = $this.data('option'),
                data = {count: 1000};

            data[$parent.attr('name')] = $parent.val();

            ajax({
                url: $this.data('url'),
                data: data,

                success: function(data) {
                    $this.empty();

                    data.data.forEach(function(item) {
                        options.push({
                            id: item.id,
                            text: item[optionName]
                        });
                    });

                    $this.select2({
                        theme: 'bootstrap',
                        data: options
                    });

                    var tmpValue;
                    if (tmpValue = $this.data('tmpValue')) {
                        $this.val(tmpValue).trigger('change').data('tmpValue', null);
                    }
                }
            });
        });
    });
}

function initMap() {
    ymaps.ready(function() {
        $('.js-map').each(function() {
            var $this = $(this),
                $latInput = $this.prevAll('.js-latitude'),
                $longInput = $this.prevAll('.js-longitude');

            var map = new ymaps.Map(this, {
                center: [$latInput.val() || 55.76, $longInput.val() || 37.64],
                zoom: 10
            });

            function updateCoords(coords) {
                coords = coords || [null, null];

                $latInput.val(coords[0]).valid();
                $longInput.val(coords[1]);
            }

            function addPlacemark(coords) {
                map.geoObjects.removeAll();

                var point = new ymaps.Placemark(coords, null, {
                    draggable: true,
                    preset: 'islands#dotIcon'
                });

                point.events.add('dragend', function(event) {
                    updateCoords(event.get('coords'));
                });

                point.events.add('contextmenu', function() {
                    updateCoords();
                    map.geoObjects.removeAll();
                });

                updateCoords(coords);
                map.geoObjects.add(point);
            }

            function addInitPoint() {
                if ($latInput.val()) {
                    addPlacemark([$latInput.val(), $longInput.val()]);
                    map.setCenter([$latInput.val(), $longInput.val()], 10);
                }
            }

            addInitPoint();
            $longInput.on('set-value', addInitPoint);

            map.events.add('click', function (event) {
                addPlacemark(event.get('coords'));
            });
        });
    });
}

$(function() {
    initDatetime();
    initImageInput();
    initSelect();
    initMap();
});