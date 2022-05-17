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

mix.js(['resources/js/app.js', 'resources/js/script.js'], 'public/js')
    .extract(['@paypal/paypal-js'])
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
// mix.js('@paypal/paypal-js', 'public/js/script')

if (mix.inProduction()) {
    mix.version();
}
