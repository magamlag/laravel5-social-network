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

Route::get( '/',
		[
				'uses' => 'HomeController@index',
				'as'   => 'home'
		]
);


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

Route::group( [ 'middleware' => [ 'web', 'guest' ] ], function () {
	//

	Route::get( 'signup', [ 'uses' => 'AuthController@getSignUp', 'as' => 'auth.signup' ] );

	Route::post( 'signup', [ 'uses' => 'AuthController@postSignUp', 'as' => 'auth.signup' ] );

	Route::post( 'signin', [ 'uses' => 'AuthController@postSignIn', 'as' => 'auth.signin' ] );

	Route::get( 'signin', [ 'uses' => 'AuthController@getSignIn', 'as' => 'auth.signin' ] );

	Route::get( 'signout', [ 'uses' => 'AuthController@getSignOut', 'as' => 'auth.signout' ] );

	Route::get( 'profile.index', [ 'as' => 'profile.index' ], function () {
		return 'hello profile';
	} );

	Route::get( '/search', [ 'uses' => 'SearchController@getResults', 'as' => 'search.results' ] );

} );
