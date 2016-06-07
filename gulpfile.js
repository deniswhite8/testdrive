var elixir = require('laravel-elixir');
require('laravel-elixir-remove');

elixir(function(mix) {
    mix
        .less('admin.less')
        .browserify('admin.js')
        .scripts([
            '../../../bower_components/jquery/dist/jquery.min.js',
            '../../../bower_components/bootstrap/dist/js/bootstrap.min.js',
            '../../../bower_components/metisMenu/dist/metisMenu.min.js',
            '../../../bower_components/datatables/media/js/jquery.dataTables.min.js',
            '../../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js',
            '../../../bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js',
            '../../../bower_components/bootstrap-confirmation2/bootstrap-confirmation.min.js',
            '../../../bower_components/fancybox/source/jquery.fancybox.pack.js',
            '../../../bower_components/datatables-buttons/js/dataTables.buttons.js',
            '../../../bower_components/datatables-buttons/js/buttons.bootstrap.js',
            '../../../bower_components/jquery-validation/dist/jquery.validate.min.js',
            '../../../bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js',
            '../../../bower_components/select2/dist/js/select2.full.min.js',
            '../../../public/js/admin.js'
        ], 'public/js/admin.js')

        .less('app.less')
        .browserify('app.js')
        .scripts([
            '../../../bower_components/jquery/dist/jquery.min.js',
            '../../../bower_components/bootstrap/dist/js/bootstrap.min.js',
            '../../../bower_components/underscore/underscore-min.js',
            '../../../bower_components/backbone/backbone-min.js',
            '../../../bower_components/bootstrap-validator/js/validator.js',
            '../../../bower_components/select2/dist/js/select2.full.min.js',
            '../../../bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js',
            '../../../public/js/app.js'
        ], 'public/js/app.js')

        .remove('public/build')
        .copy('bower_components/bootstrap/fonts/**', 'public/build/fonts')
        .copy('bower_components/font-awesome/fonts/**', 'public/build/fonts')
        .copy('bower_components/lato/font/**', 'public/build/font')
        .copy('bower_components/fancybox/source/*.gif', 'public/build/css')
        .copy('bower_components/fancybox/source/*.png', 'public/build/css')
        .copy('resources/assets/img/**', 'public/build/img')

        .version(['css/admin.css', 'js/admin.js', 'css/app.css', 'js/app.js'])
        .remove(['public/css', 'public/js'])
    ;
});
