<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

header('Access-Control-Allow-Origin:*');//nerima dari port mana aja
header('Access-Control-Allow-Headers:Authorization, X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers, X-XSRF-TOKEN, Origin, X-Auth-Token, Authorization');//nerima header apa aja
header('Access-Control-Allow-Methods:GET,POST,PUT,PATCH,DELETE');//method yang bisa diterima dari front end


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/item', function (Request $request) {
    return $request->item();
});

//crud
Route::get('customer/{id}', 'CustomerController@show');
Route::post('customer', 'CustomerController@store');
Route::put('customer/{id}', 'CustomerController@update');

Route::resource('credit_card', 'CreditCardController');

Route::get('cinema', 'CinemaController@show');
Route::put('cinema/{id}', 'CinemaController@update');
Route::post('cinema', 'CinemaController@store');
Route::get('city', 'CinemaController@showCity');

Route::get('movie', 'MovieController@getMovie');
Route::post('movie', 'MovieController@store');
Route::put('movie', 'MovieController@update');
Route::get('movie/comingsoon', 'MovieController@showComingSoon');
Route::get('movie/nowplaying', 'MovieController@showNowPlaying');


Route::get('schedule','ScheduleController@getSchedule');
//Route::resource('schedule', 'ScheduleController');

Route::resource('room_type', 'RoomTypeController');

Route::resource('theatre', 'TheatreController');

Route::get('all_seats', 'AllSeatsController@show');
Route::post('all_seats', 'AllSeatsController@store');
Route::put('all_seats/{id}', 'AllSeatsController@update');

Route::get('transaction', 'TransactionController@show');
Route::get('transaction', 'TransactionController@store');
Route::get('transaction/{id}', 'TransactionController@update');

Route::resource('reserved_seats', 'ReservedSeatsController');

Route::resource('promo', 'PromoController');

//display on web
//Route::get('movie/now_playing/carousel', 'MovieController@carousel');
//Route::get('movie/now_playing', 'MovieController@nowPlaying');
//Route::get('movie/coming_soon', 'MovieController@coming_soon');

//user
Route::get('credit_card/by_customer/{id}', 'CreditCardController@byCustomer');

//seats
Route::get('all_seats/by_schedule/{id}', 'AllSeatsController@seatBySchedule');

//schedule
Route::get('schedule/byCity', 'ScheduleController@byCity');
Route::post('schedule', 'ScheduleController@store');

// purchases
Route::post('purchases', 'PurchasesController@store');

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });

    // Purchase Tickets; record transaction
    Route::post('purchase', 'PurchaseRecordController@createPurchaseRecord');


});


Route::get('availableSeat','AllSeatsController@getAvaSeat');