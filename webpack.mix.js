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

mix.styles([
   'resources/admin_view/css/adminlte.min.css',
   'resources/admin_view/css/dataTables.bootstrap4.css',
   'resources/admin_view/css/font-awesome.min.css',
   'resources/admin_view/css/custom.css',
], 'public/css/admin.css');

mix.scripts([
   'resources/admin_view/js/jquery.min.js',
   'resources/admin_view/js/bootstrap.bundle.min.js',
   'resources/admin_view/js/jquery.dataTables.js',
   'resources/admin_view/js/dataTables.bootstrap4.js',
    'resources/admin_view/js/fastclick.js',
    'resources/admin_view/js/jquery.slimscroll.min.js',
    'resources/admin_view/js/adminlte.min.js',
    'resources/admin_view/js/demo.js',
], 'public/js/admin.js');

mix.copy('resources/admin_view/fonts', 'public/fonts');
mix.copy('resources/admin_view/img', 'public/img');

/*mix.styles([
    'resources/coreui/node_modules/@coreui/icons/css/coreui-icons.min.css',
    'resources/coreui/node_modules/flag-icon-css/css/flag-icon.min.css',
    'resources/coreui/node_modules/font-awesome/css/font-awesome.min.css',
    'resources/coreui/node_modules/simple-line-icons/css/simple-line-icons.css',
    'resources/coreui/src/vendors/pace-progress/css/pace.min.css',
    'resources/coreui/src/css/style.css',
], 'public/css/admin.css');

mix.scripts([
    'resources/coreui/node_modules/jquery/dist/jquery.min.js',
    'resources/coreui/node_modules/popper.js/dist/umd/popper.min.js',
    'resources/coreui/node_modules/bootstrap/dist/js/bootstrap.min.js',
    'resources/coreui/node_modules/pace-progress/pace.min.js',
    'resources/coreui/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js',
    'resources/coreui/node_modules/@coreui/coreui/dist/js/coreui.min.js',
], 'public/js/admin.js');

mix.copy('resources/coreui/node_modules/@coreui/icons/fonts', 'public/fonts');
mix.copy('resources/coreui/node_modules/flag-icon-css/flags', 'public/flags');
mix.copy('resources/coreui/node_modules/font-awesome/fonts', 'public/fonts');
mix.copy('resources/coreui/node_modules/simple-line-icons/fonts', 'public/fonts');
mix.copy('resources/coreui/src/img', 'public/img');*/
