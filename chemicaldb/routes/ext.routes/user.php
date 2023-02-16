<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('user/export-remote/{type}', 'UserController@index')->name('user.export_pdf');
    Route::post('user/indexAjax', 'UserController@indexAjax')->name('user.indexAjax');
    Route::get('user/indexAjax', 'UserController@indexAjax')->name('user.indexAjax');

    
    Route::post('user/setAdmin/{id}', 'UserController@setAdmin')->name('user.setAdmin');
    Route::get('user/setAdmin/{id}', 'UserController@setAdmin')->name('user.setAdmin');
    Route::post('user/resetAdmin/{id}', 'UserController@resetAdmin')->name('user.resetAdmin');
    Route::post('user/getUserBranch/{id}', 'UserController@getUserBranch')->name('user.getUserBranch');
    Route::get('user/test', 'UserController@test')->name('user.test');
    Route::get('user/qrtest/{code}', 'UserController@qrtest')->name('user.qrtest');
    
    Route::put('user/updatepwd/{id}', 'UserController@updatepwd')->name('user.updatepwd');
    
    Route::resource('user','UserController');
    
});

Route::get('registerCustomer','UserController@create_customer')->name('user.create_customer');
Route::post('submitCustomer', 'UserController@store_customer')->name('user.store_customer');