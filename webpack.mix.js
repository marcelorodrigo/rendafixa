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

mix.copy('resources/js/angular.min.js', 'public/js')
    .copy('resources/js/bootstrap.min.js', 'public/js')
    .js('resources/js/calculadora.js', 'public/js')
    .js('resources/js/calculadora-rentabilidade.js', 'public/js')
    .copy('resources/js/jquery.min.js', 'public/js')
    .copy('resources/js/math.min.js', 'public/js')
    .postCss('resources/css/bootstrap.min.css', 'public/css')
    .postCss('resources/css/bootstrap-theme.min.css', 'public/css')
    .postCss('resources/css/rendafixa.css', 'public/css');
