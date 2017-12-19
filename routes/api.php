<?php

use Illuminate\Http\Request;

Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/me', 'Auth\AuthController@user');

    Route::prefix('releases')->group(function () {
        Route::get('index', 'ReleaseController@index');
        Route::post('store', 'ReleaseController@store');
        Route::get('show/{release}', 'ReleaseController@show');
        Route::put('update/{release}', 'ReleaseController@update');
        Route::delete('destroy/{release}', 'ReleaseController@destroy');
    });
});