<?php

use Illuminate\Http\Request;

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

    Route::group(['prefix' => '/user'], function () {

        Route::post('/register', 'RegistrationController@register');
    });

    Route::group(['middleware' => ['auth:api']], function () {

        Route::group(['prefix' => 'products'], function () {
            Route::get('/', 'ProductsController@get');
            Route::get('/options', 'ProductsController@options');
            Route::get('/{id}', 'ProductsController@getById');
            Route::post('/', 'ProductsController@create');
            Route::put('/{id}', 'ProductsController@update');
            Route::delete('/{id}', 'ProductsController@delete');
        });
    });
});
