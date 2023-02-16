<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('cargo_type/export-remote/{type}', 'CargoTypeController@index')->name('cargo_type.export_pdf');
    Route::post('cargo_type/indexAjax', 'CargoTypeController@indexAjax')->name('cargo_type.indexAjax');
    Route::get('cargo_type/indexAjax', 'CargoTypeController@indexAjax')->name('cargo_type.indexAjax');
    Route::resource('cargo_type','CargoTypeController');
});