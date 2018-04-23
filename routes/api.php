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
Route::get('customer', 'CustomerController@index');
Route::post('customer', 'CustomerController@store');
Route::put('customer/{id}', 'CustomerController@update');
Route::delete('customer/{id}', 'CustomerController@destroy');
Route::get('purchase-history/{id}', 'TransactionController@showHistory');
Route::get('seatmovie-history/{id}', 'ReservedSeatsController@showHistory');

// Route::resource('credit_card', 'CreditCardController');

Route::get('cinema', 'CinemaController@index');
Route::get('cinema/{id}', 'CinemaController@show');
Route::put('cinema/{id}', 'CinemaController@update');
Route::post('cinema', 'CinemaController@store');

Route::get('city', 'CinemaController@showCity');

Route::get('movie', 'MovieController@getMovie');
Route::get('movie/all', 'MovieController@index');
Route::post('movie', 'MovieController@store');
Route::put('movie', 'MovieController@update');
Route::get('movie/comingsoon', 'MovieController@showComingSoon');
Route::get('movie/nowplaying', 'MovieController@showNowPlaying');


Route::get('schedule','ScheduleController@getSchedule');
Route::get('schedule/all','ScheduleController@index');
Route::post('schedule','ScheduleController@store');
Route::put('schedule','ScheduleController@update');
//Route::resource('schedule', 'ScheduleController');

Route::get('room_type', 'RoomTypeController@index');
Route::get('room_type/{id}', 'RoomTypeController@show');
Route::post('room_type', 'RoomTypeController@store');
Route::put('room_type/{id}', 'RoomTypeController@update');

Route::get('theatre', 'TheatreController@index');
Route::get('theatre/{id}', 'TheatreController@show');
Route::post('theatre', 'TheatreController@store');
Route::put('theatre/{id}', 'TheatreController@update');

Route::get('all_seats', 'AllSeatsController@show');
Route::post('all_seats', 'AllSeatsController@store');
Route::put('all_seats/{id}', 'AllSeatsController@update');

Route::get('transaction', 'TransactionController@show');
Route::get('transaction', 'TransactionController@store');
Route::get('transaction/{id}', 'TransactionController@update');

Route::get('reserved_seats', 'ReservedSeatsController@index');
Route::get('reserved_seats/{id}', 'ReservedSeatsController@show');
Route::post('reserved_seats', 'ReservedSeatsController@store');
Route::put('reserved_seats/{id}', 'ReservedSeatsController@put');

Route::get('promo/{id}', 'PromoController@show');
Route::get('promo', 'PromoController@index');
Route::post('promo', 'PromoController@store');
Route::put('promo/{id}', 'PromoController@update');
Route::get('promoval/{id}', 'PromoController@getPromoValue');

//display on web
//Route::get('movie/now_playing/carousel', 'MovieController@carousel');
//Route::get('movie/now_playing', 'MovieController@nowPlaying');
//Route::get('movie/coming_soon', 'MovieController@coming_soon');

//user
Route::get('credit_card/by_customer/{id}', 'CreditCardController@byCustomer');

//seats
// Route::get('all_seats/by_schedule/{id}', 'AllSeatsController@seatBySchedule');
Route::get('availableSeat','AllSeatsController@getAvaSeat');

Route::get('pricing', 'AllSeatsController@getPrice');

//schedule
// Route::get('schedule/byCity', 'ScheduleController@byCity');
// Route::post('schedule', 'ScheduleController@store');

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
