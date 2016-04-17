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


Route::get('/', 'HomeController@showHome');


Route::get('users', function(){
	$users = User::all();
	return View::make('users')->with('users', $users);
});

Route::get('/fighter-list', 'UserController@showList');
Route::get('/fighter-list-broken', 'UserController@showBrokenList');

Route::get('/contacts', function(){
	return View::make('contacts');
});

Route::get('/brackets', 'BracketsController@index');

Route::post('/competition/getFight', 'CompetitionController@getFight');

// Route::get('/calendarDownload', 'HomeController@getDownload');

// Register and Payment
Route::match(array('GET', 'POST'),'register', 'RegisterController@showRegister');
Route::match(array('GET', 'POST'), '/paymentconfirm', 'RegisterController@paymentConfirm');
Route::get('/thankyou', 'HomeController@thankyou');
Route::get('/cancel', 'HomeController@showHome');
Route::post('/savetemp', 'RegisterController@paymentConfirm');

// Rest API
Route::get('/twitterTimeline', 'RestController@getTwitter');



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
    //
});
