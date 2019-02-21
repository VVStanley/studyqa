<?php

use Illuminate\Support\Facades\Route;

Route::post('/ajax', 'MailController@ajax')->name('ajax');

Route::group(
    [
        'namespace' => 'Auth'
    ],
    function(){
    Route::get('/login','LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware'	=>	'admin',
        'namespace' => 'Admin'
    ],
    function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::resource('/user', 'UserController', ['names' => ['index' => 'user']]);
    Route::resource('/meeting', 'MeetingController', ['names' => ['index' => 'meeting']]);
    Route::resource('/gallery', 'GalleryController', ['names' => ['index' => 'gallery']]);
    Route::get('/customer', 'CustomerController@index')->name('customer');
    Route::get('/customer/{id}', 'CustomerController@destroy')->name('customer.destroy');
});

Route::group(
    [
        'namespace' => 'Front'
    ],
    function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/{meeting}', 'IndexController@meeting');
});
