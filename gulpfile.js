const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
	'foundation': '../../../node_modules/foundation/scss/',
	'jqueryFiler': 'node_modules/jquery.filer/',
	'select2': 'node_modules/select2/dist/',
	'sweetalert': 'node_modules/sweetalert/dist/',
};

//backend
elixir(mix => {
    mix.sass(['app.scss'])
       .copy(paths.jqueryFiler + 'assets/fonts/jquery.filer-icons/jquery-filer.css', 'resources/assets/css')
   	   .copy(paths.jqueryFiler + 'css/jquery.filer.css', 'resources/assets/css')
   	   .copy(paths.jqueryFiler + 'css/themes/jquery.filer-dragdropbox-theme.css', 'resources/assets/css')
   	   .copy(paths.select2 + 'js/select2.min.js', 'resources/assets/js')
       .copy(paths.select2 + 'css/select2.min.css', 'resources/assets/css')
       .copy(paths.sweetalert + 'sweetalert.css', 'resources/assets/css')
       .copy(paths.sweetalert + 'sweetalert.min.js', 'resources/assets/js')
       .scripts([
       		'jquery.filer.js',
       		'select2.min.js',
       		'sweetalert.min.js'
       ], './public/js/dashboardLibs.js')
       .styles([
       		'jquery-filer.css',
       		'jquery.filer.css',
       		'jquery.filer-dragdropbox-theme.css',
       		'select2.min.css',
       		'sweetalert.css'
       ], './public/css/dashboardLibs.css');
	}
);

//frontend
elixir(mix => {
	mix.sass([
		'styles.scss',
        '../css/font-awesome.css',
		paths.foundation + 'foundation.scss'
    ], 'public/css/styles.css')
   .scripts([
        'init.js'
    ], './public/js/init.js');
});