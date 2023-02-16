<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('setting/export-remote/{type}', 'SettingController@index')->name('setting.export_pdf');
    Route::post('setting/indexAjax', 'SettingController@indexAjax')->name('setting.indexAjax');
    Route::get('setting/indexAjax', 'SettingController@indexAjax')->name('setting.indexAjax');
    Route::resource('setting','SettingController');
});