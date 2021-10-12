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
    .js('resources/js/views/kratmeister/show.js', 'public/js')
    .js('resources/js/views/overig/fileInputNameUpdaters.js', 'public/js');
    // mix.browserSync('127.0.0.1:8000');




// C: \Users\ mattt\ Desktop\ laravel oefenen\ final_website_steentjes\ theWildEast\
