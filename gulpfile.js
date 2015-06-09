var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
    	'backend/bootstrap.min.css',
    	'backend/AdminLTE.min.css',
    	'backend/skin-blue.css'
    ], 'public/backend/css/style.css');
    mix.scripts([
    	'backend/jquey.js',
    	'backend/bootstrap.js',
    	'backend/app.js',
    	'backend/fastclick.js',
    	'backend/slimscroll.js'
	], 'public/backend/js/app.js');
});
