<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::auth();
	
Route::controllers ([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);


Route::get  ('properties/map', 'PropertiesController@map');

Route::resource('properties','PropertiesController');


// Route::resource('categories','CategoriesController');

//Route::resource('users','UsersController');

// Route::get  (	'properties'            	,	'propertiesController@index'   	);
// Route::get 	(	'properties/create'     	,	'propertiesController@create'  	);
// Route::get 	(	'properties/{id}'     		,	'propertiesController@show'    	);
// Route::post (	'properties'            	,	'propertiesController@store'   	); 
// Route::get 	(	'properties/{id}'     		,	'propertiesController@destroy' 	);
// Route::put 	(	'properties/{id}'     		,	'propertiesController@update'  	);
// Route::get 	(	'properties/{id}/edit'		,	'propertiesController@edit'	 	);




/*static Pages*/
Route::get  ('/', 'PagesController@home');
Route::get  ('/home', 'PagesController@home');
Route::get  ('/about', 'PagesController@about');
Route::get  ('/contact', 'PagesController@contact');

/*Dashboard Pages*/
Route::get  ('/dashboard', 'UsersController@dashboard');

/*images*/
Route::get  ('/images', 'ImagesController@index');
Route::get  ('/images/create', 'ImagesController@create');



