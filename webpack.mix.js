const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/now-ui-dashboard.scss', 'public/css')
    .copyDirectory('resources/selectize', 'public/selectize')
    .copyDirectory('resources/datatable/', 'public/datatable')
    .copyDirectory('resources/leaflet/', 'public/leaflet')
    .copyDirectory('resources/images/', 'public/images');

