<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('user_type/export-remote/{type}', 'UserTypeController@index')->name('user_type.export_pdf');
    Route::post('user_type/indexAjax', 'UserTypeController@indexAjax')->name('user_type.indexAjax');
    Route::get('user_type/indexAjax', 'UserTypeController@indexAjax')->name('user_type.indexAjax');
    Route::resource('user_type','UserTypeController');
});