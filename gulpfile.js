var elixir = require('laravel-elixir');

elixir(function(mix) {
    // admin side
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
            '../../../public/js/admin.js'
        ], 'public/js/admin.js')
        .copy('bower_components/bootstrap/fonts/**', 'public/build/fonts')
        .copy('bower_components/font-awesome/fonts/**', 'public/build/fonts')
        .copy('bower_components/fancybox/source/*.gif', 'public/build/css')
        .copy('bower_components/fancybox/source/*.png', 'public/build/css')
        .version(['css/admin.css', 'js/admin.js'])
    ;
});
