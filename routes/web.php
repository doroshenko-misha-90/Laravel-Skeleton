<?php

use \App\Traits\LanguageTrait;

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

Route::get('set-locale/{lang}', 'SwitchLanguageController')->name('set_locale');

Route::group(['prefix' => LanguageTrait::getPrefix()], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
