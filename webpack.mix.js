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

mix.js('resources/assets/js/app.js', 'public/js')
   .extract(['vue', 'vue-router', 'axios', 'lodash']);

mix.sass('resources/assets/sass/app.scss', 'public/css');


/*
 
 "axios": "^0.17",
 "bootstrap-sass": "^3.3.7",
 "cross-env": "^5.1",
 "laravel-mix": "^1.0",
 "lodash": "^4.17.4",
 "vue": "^2.1.10",
 "vue-router": "^3.0.1"

 */