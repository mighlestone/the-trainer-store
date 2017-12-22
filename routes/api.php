<?php

use Illuminate\Http\Request;

Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/me', 'Auth\AuthController@user');

    // Releases
    Route::prefix('releases')->group(function () {
        Route::get('/', 'ReleaseController@index');
        Route::post('store', 'ReleaseController@store');
        Route::get('{release}', 'ReleaseController@show');
        Route::put('{release}/update', 'ReleaseController@update');
        Route::delete('{release}/destroy', 'ReleaseController@destroy');

        Route::post('{release}/convert', 'ReleaseController@convert');

        Route::prefix('types')->namespace('Release')->group(function () {
            Route::get('/', 'ReleaseTypeController@index');
        });

        Route::prefix('sources')->namespace('Release')->group(function () {
            Route::get('/', 'SourceController@index');
            Route::post('store', 'SourceController@store');
            Route::put('{source}/update', 'SourceController@update');
            Route::delete('{source}/destroy', 'SourceController@destroy');
        });

        Route::prefix('links')->namespace('Release')->group(function () {
            Route::get('{release}', 'LinkController@get');
            Route::post('{release}', 'LinkController@store');
            Route::put('{link}/update', 'LinkController@update');
            Route::delete('{link}/destroy', 'LinkController@destroy');
        });
    });

    // Shoes
    Route::prefix('shoes')->group(function () {
        Route::get('/', 'ShoeController@index');
        Route::post('store', 'ShoeController@store');
        Route::get('{shoe}', 'ShoeController@show');
        Route::get('{shoe}/stock', 'StockTransactionController@getStock');
        Route::put('{shoe}/update', 'ShoeController@update');
        Route::delete('{shoe}/destroy', 'ShoeController@destroy');

        Route::prefix('brands')->namespace('Shoe')->group(function () {
            Route::get('/', 'BrandController@index');
            Route::post('store', 'BrandController@store');
            Route::put('{brand}/update', 'BrandController@update');
            Route::get('{brand}/models', 'BrandController@models');
        });

        Route::prefix('models')->namespace('Shoe')->group(function () {
            Route::get('/', 'ShoeModelController@index');
            Route::post('store', 'ShoeModelController@store');
            Route::put('{model}/update', 'ShoeModelController@update');
            Route::delete('{model}/destroy', 'ShoeModelController@destroy');
        });

        Route::prefix('categories')->namespace('Shoe')->group(function () {
            Route::get('/', 'ShoeCategoryController@index');
            Route::post('store', 'ShoeCategoryController@store');
            Route::put('{category}/update', 'ShoeCategoryController@update');
            Route::delete('{category}/delete', 'ShoeCategoryController@destroy');
        });

        Route::prefix('colours')->namespace('Shoe')->group(function () {
            Route::get('/', 'ColourController@index');
            Route::post('store', 'ColourController@store');
            Route::put('{colour}/update', 'ColourController@update');
            Route::delete('{colour}/destroy', 'ColourController@destroy');
        });

        Route::prefix('sizes')->namespace('Shoe')->group(function () {
            Route::get('/', 'ShoeSizeController@index');
            Route::post('store', 'ShoeSizeController@store');
            Route::put('{size}/update', 'ShoeSizeController@update');
            Route::delete('{size}/destroy', 'ShoeSizeController@destroy');
        });
    });

    // Stock Transactions
    Route::prefix('stock')->group(function () {
        Route::get('/', 'StockTransactionController@stockIndex');

        Route::prefix('transactions')->group(function () {
            Route::get('/', 'StockTransactionController@transactionIndex');
            Route::post('store', 'StockTransactionController@transactionStore');
            Route::get('{stock}', 'StockTransactionController@getTransaction');
            Route::put('{stock}/update', 'StockTransactionController@transactionUpdate');
            Route::delete('{stock}/destroy', 'StockTransactionController@transactionDestroy');
        });

        Route::prefix('transactions')->namespace('Stock')->group(function () {
            Route::get('{stock}/fees', 'FeeController@get');
            Route::post('{stock}/fees/store', 'FeeController@store');
            Route::put('{stock}/fees/{fee}', 'FeeController@update');
            Route::delete('{stock}/fees/{fee}', 'FeeController@destroy');
        });
    });

    Route::prefix('locations')->group(function () {
        Route::get('/', 'LocationController@index');
        Route::post('store', 'LocationController@store');
    });
});