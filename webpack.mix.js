const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/bootstrap.js', 'public/js/bootstrap.js')
//    .sass('resources/sass/app.scss', 'public/css')
//    .copy('node_modules/cropper/dist/cropper.min.css', 'public/css/cropper.min.css')
//    .copy('node_modules/cropper/dist/cropper.min.js', 'public/js/cropper.min.js')
   .copy('node_modules/cropperjs/dist/cropper.min.css', 'public/css/cropper.min.css')
   .copy('node_modules/cropperjs/dist/cropper.min.js', 'public/js/cropper.min.js')
   .copy('node_modules/jquery-cropper/dist/jquery-cropper.min.js', 'public/js/jquery-cropper.min.js')
   .copy('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')
   .postCss('resources/css/app.css', 'public/css', [
   require('postcss-import'),
   require('tailwindcss'),
])
.sourceMaps();