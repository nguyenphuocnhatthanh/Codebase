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
mix.copyDirectory('resources/images/admin', 'public/vendors/admin/images');

/**
 * Override Laravel Mix Webpack Configuration
 * @type {{chunkFilename: string, publicPath: string}}
 */
mix.config.webpackConfig.output = {
  chunkFilename: 'js/dist/[name].[hash].bundle.js',
  publicPath: '/',
};

mix.js('resources/js/admin/app.js', 'public/js/admin/app.js')
  .sass('resources/sass/admin/app.scss', 'public/css/admin/app.css')
  .version();

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');
