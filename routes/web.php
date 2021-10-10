<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'landing\homeController@index')->name('landing.index');

// Travel Reguler
Route::group(['prefix' => 'shuttle'], function () {
    Route::get('/', 'landing\travelController@index')->name('landing.shuttle.index');
    Route::post('/getroute', 'landing\travelController@getRouteByDeparture')->name('landing.shuttle.getroute');
    Route::get('/search', 'landing\travelController@search')->name('landing.shuttle.search');
    // Route::get('/search/reservation', 'landing\travelController@createReservation')->name('landing.shuttle.reservation.create');
    Route::get('/reservation', 'landing\travelController@reservation')->name('landing.shuttle.reservation.index');
    Route::get('/reservation/seatlist', 'landing\travelController@seatList')->name('landing.shuttle.reservation.seatList');
    Route::post('/reservation', 'landing\travelController@saveReservation')->name('landing.shuttle.reservation.save');
    Route::get('/reservation/updatestatus/{code}', 'landing\travelController@updateStatusReservation')->name('landing.shuttle.reservation.updatestatus');

    Route::get('/payment/{code}', 'landing\travelController@payment')->name('landing.shuttle.reservation.payment');
    Route::post('/payment/{code}', 'landing\travelController@savePayment')->name('landing.shuttle.reservation.payment.save');
    // Route::get('/payment/single/{code}', 'landing\travelController@paymentSingle')->name('landing.shuttle.reservation.paymentsingle');
    Route::get('/payment/upload/{code}', 'landing\travelController@uploadTransfer')->name('landing.shuttle.reservation.uploadTransfer');
});

// auth
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', 'landing\authController@index')->name('landing.auth.login');
    Route::get('/register', 'landing\authController@register')->name('landing.auth.register');
});
