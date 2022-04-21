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
    .js('resources/js/jQuery.js', 'public/js')
    .js('resources/js/jQueryPlayer.js', 'public/js')
    .js('resources/js/jQueryUser.js', 'public/js')
    .js('resources/js/jQueryCreatePost.js', 'public/js')
    .js('resources/js/jQueryLike.js', 'public/js')
    .js('resources/js/jQueryCommentLike.js', 'public/js')
    
   .sass('resources/sass/app.scss', 'public/css');

