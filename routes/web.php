<?php

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('portolfio', 'PortfolioController@index')->name('dashboard.portfolio');
});

Route::name('settings.')->prefix('settings')->middleware(['auth'])->group(function () {
    Route::get('profile', 'Settings\ProfileController@index')->name('profile');
    Route::patch('profile', 'Settings\ProfileController@update');
    Route::get('security', 'Settings\SecurityController@index')->name('security');
    Route::patch('security', 'Settings\SecurityController@update');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
