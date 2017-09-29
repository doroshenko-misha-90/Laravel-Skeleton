<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Products\Http\Controllers'], function()
{
    Route::get('/', 'ProductsController@index');
});
