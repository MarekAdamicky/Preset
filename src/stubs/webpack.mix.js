let mix = require('laravel-mix');

require('laravel-mix-environments');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Disable optimize relative stylesheet url()'s
mix.options({ processCssUrls: false });

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sourceMaps()
    .version();

if (!mix.inDevelopment()) {

    // mix.copy('bower_components/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
    // mix.copy('bower_components/popper.js/dist/umd/popper.min.js', 'public/js/popper.min.js');
    // mix.copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');
}

// Disable success notifications
mix.disableSuccessNotifications();