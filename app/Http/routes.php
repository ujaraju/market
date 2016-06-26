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

Route::group(['middleware' => ['web']], function () {
	

	Route::controllers ([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController'
	]);

	Route::resource('products','ProductsController');
	Route::resource('categories','CategoriesController');
	Route::resource('users','UsersController');
	// Route::get  (	'products'            		,	'ProductsController@index'   );
	// Route::get 	(	'products/create'     		,	'ProductsController@create'  );
	// Route::get 	(	'products/{id}'     		,	'ProductsController@show'    );
	// Route::post (	'products'            		,	'ProductsController@store'   ); 
	// Route::get 	(	'products/{id}'     		,	'ProductsController@destroy' );
	// Route::put 	(	'products/{id}'     		,	'ProductsController@update'  );
	// Route::get 	(	'products/{id}/edit'		,	'ProductsController@edit'	 );
});

Route::auth();

Route::get  ('/', 'PagesController@home');
Route::get  ('/home', 'PagesController@home');
Route::get  ('/about', 'PagesController@about');
Route::get  ('/contact', 'PagesController@contact');




