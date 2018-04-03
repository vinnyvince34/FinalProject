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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/item', function (Request $request) {
    return $request->item();
});

Route::resource('user', 'UserController');
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
