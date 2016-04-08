var elixir = require('laravel-elixir');
elixir.config.js.browserify.transformers.shift();

elixir(function(mix) {
    mix
        .less('admin.less')
        .browserify('admin.js')
        .version(['css/admin.css', 'js/admin.js'])
        .copy('bower_components/bootstrap/fonts/**', elixir.config.publicPath + '/build/fonts')
        .copy('bower_components/font-awesome/fonts/**', elixir.config.publicPath + '/build/fonts')
    ;
});
