<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', 'admin\homeController@index')->name('admin.home.dashboard');

Route::group(['prefix' => 'city', 'middleware' => ['web']], function () {
    Route::get('/', 'admin\cityController@index')->name('admin.city.index');
    Route::get('/create', 'admin\cityController@create')->name('admin.city.create');
    Route::post('/create', 'admin\cityController@save')->name('admin.city.save');
    Route::delete('/delete', 'admin\cityController@delete')->name('admin.city.delete');
});

Route::group(['prefix' => 'route', 'middleware' => ['web']], function () {
    Route::get('/', 'admin\routeController@index')->name('admin.route.index');
    Route::get('/create', 'admin\routeController@create')->name('admin.route.create');
    Route::post('/create', 'admin\routeController@save')->name('admin.route.save');
    Route::get('/edit/{id}', 'admin\routeController@edit')->name('admin.route.edit');
    Route::patch('/edit', 'admin\routeController@update')->name('admin.route.update');
    Route::delete('/delete', 'admin\routeController@delete')->name('admin.route.delete');
});

Route::group(['prefix' => 'vehicle', 'middleware' => ['web']], function () {
    Route::get('/', 'admin\vehicleController@index')->name('admin.vehicle.index');
    Route::get('/create', 'admin\vehicleController@create')->name('admin.vehicle.create');
    Route::post('/create', 'admin\vehicleController@save')->name('admin.vehicle.save');
    Route::get('/edit/{id}', 'admin\vehicleController@edit')->name('admin.vehicle.edit');
    Route::patch('/edit', 'admin\vehicleController@update')->name('admin.vehicle.update');
    Route::delete('/delete', 'admin\vehicleController@delete')->name('admin.vehicle.delete');

    Route::get('/detail/{id}', 'admin\vehicleController@detail')->name('admin.vehicle.detail');
    Route::delete('/seat/delete', 'admin\vehicleController@deleteSeat')->name('admin.vehicle.delete.seat');
    Route::get('/addseat/{id}', 'admin\vehicleController@addSeat')->name('admin.vehicle.addSeat');
});
