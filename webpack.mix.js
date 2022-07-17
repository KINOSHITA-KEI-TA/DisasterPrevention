const mix = require('laravel-mix');
const glob = require('glob');
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

glob.sync('resources/js/*.js').map(function (file) {
    mix.js(file, 'public/js');
});
    
glob.sync('resources/sass/*.scss').map(function(file) {
    mix.sass(file, 'public/css');
});
// mix.sourceMaps();