<?php
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile/changepwd', 'ProfileController@changepwd')->name('profile.changepwd');
    Route::post('profile/updatepwd', 'ProfileController@updatepwd')->name('profile.updatepwd');
    Route::resource('profile','ProfileController');

    Route::get('profile_upline', 'ProfileController@indexUpline')->name('profile.profile_upline');
});