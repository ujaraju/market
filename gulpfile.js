var elixir = require('laravel-elixir');

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



elixir(function(mix) {
    mix.sass([
	    	'app.scss',
	    	'custom.scss'
    	]);


    mix.scripts([
    		'jquery.js',
    		'bootstrap.min.js',
	    	'jquery.bxslider.min.js',
	    	'swelldwell.js'
    	]);

    mix.version(['css/app.css', 'js/all.js']);

    //mix.copy('resources/assets/js/property-editor-map.js', 'public/js');


    //mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/build/fonts/bootstrap');

    

});


