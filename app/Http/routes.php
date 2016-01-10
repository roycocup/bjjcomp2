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

Route::match(array('GET', 'POST'),'register', 'RegisterController@showRegister');

Route::get('/fighter-list', 'UserController@showList');
Route::get('/fighter-list-broken', 'UserController@showBrokenList');

Route::get('/contacts', function(){
	return View::make('contacts');
});

Route::get('/b', function(){
	return View::make('b');
});

Route::get('/brackets', function(){
	return View::make('brackets');
});
//Paypal Routes
Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'IndexController@postPayment',
));
// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'IndexController@getPaymentStatus',
));

Route::get('/calendarDownload', 'HomeController@getDownload');


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
