let mix = require('laravel-mix');

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

//NEEDS: compile multiple files into one js and css file

mix.js('components/header/header.js', 'assets/js/all.js')
    .version();
//    .sass('resources/sass/app.scss', 'public/css'); 

mix.sass('assets/scss/styles.scss', 'assets/css/all.css');

//mix.js('app/index.js', 'app/public/js')
    //.babel('app/public/js/index.js', 'app/public/js/index.es5.js') 