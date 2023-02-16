<?php

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/pwd', function () {
    return Hash::make('password');
});

Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/resend-activation', 'Auth\RegisterController@resendActivationShow')->name('activation.resendActivation');
Route::post('/resend-activation', 'Auth\RegisterController@resendActivation')->name('activation.resendActivation');
