<?php

use Illuminate\Http\Request;

Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/me', 'Auth\AuthController@user');

    Route::prefix('releases')->group(function () {
        Route::get('/', 'ReleaseController@index');
        Route::post('store', 'ReleaseController@store');
        Route::get('{release}', 'ReleaseController@show');
        Route::put('{release}/update', 'ReleaseController@update');
        Route::delete('{release}/destroy', 'ReleaseController@destroy');

        Route::post('convert', 'ReleaseController@convert');
    });

    Route::prefix('shoes')->group(function () {
        Route::get('/', 'ShoeController@index');
        Route::post('store', 'ShoeController@store');
        Route::get('{shoe}', 'ShoeController@show');
        Route::get('{shoe}/stock', 'StockTransactionController@stockShow');
        Route::put('{shoe}/update', 'ShoeController@update');
        Route::delete('{shoe}/destroy', 'ShoeController@destroy');
    });

    Route::prefix('stock')->group(function () {
        Route::get('/', 'StockTransactionController@stockIndex');

        Route::prefix('transactions')->group(function () {
            Route::get('/', 'StockTransactionController@transactionIndex');
            Route::post('store', 'StockTransactionController@transactionStore');
            Route::get('{stock}', 'StockTransactionController@transactionShow');
            Route::put('{stock}/update', 'StockTransactionController@transactionUpdate');
            Route::delete('{stock}/destroy', 'StockTransactionController@transactionDestroy');
        });
    });
});