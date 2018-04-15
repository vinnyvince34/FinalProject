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
Route::put('customer', 'CustomerController@update');
Route::resource('credit_card', 'CreditCardController');
Route::resource('cinema', 'CinemaController');
Route::resource('movie', 'MovieController');
Route::resource('schedule', 'ScheduleController');
Route::resource('room_type', 'RoomTypeController');
Route::resource('theatre', 'TheatreController');
Route::resource('all_seats', 'AllSeatsController');
Route::resource('transaction', 'TransactionController');
Route::resource('reserved_seats', 'ReservedSeatsController');
Route::resource('promo', 'PromoController');

//display on web
//Route::get('movie/now_playing/carousel', 'MovieDisplayController@carousel');
//Route::get('movie/now_playing', 'MovieDisplayController@nowPlaying');
//Route::get('movie/coming_soon', 'MovieDisplayController@coming_soon');

//user
Route::get('credit_card/by_customer/{id}', 'CreditCardController@byCustomer');

//seats
Route::get('all_seats/by_schedule/{id}', 'AllSeatsController@seatBySchedule');

//schedule
Route::get('schedule/byCity', 'ScheduleController@byCity');



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
