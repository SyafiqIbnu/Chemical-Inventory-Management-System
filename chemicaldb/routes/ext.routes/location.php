<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('location/export-remote/{type}', 'LocationController@index')->name('location.export_pdf');
    Route::post('location/indexAjax', 'LocationController@indexAjax')->name('location.indexAjax');
    Route::get('location/indexAjax', 'LocationController@indexAjax')->name('location.indexAjax');
    Route::resource('location','LocationController');
});