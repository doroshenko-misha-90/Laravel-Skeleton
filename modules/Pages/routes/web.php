<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Pages\Http\Controllers'], function()
{
    Route::get('/', 'PagesController@index');

    Route::get('/page/{slug}', 'PagesController@getPageBySlug')->name('page');
});
