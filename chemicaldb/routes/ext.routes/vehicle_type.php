<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('vehicle_type/export-remote/{type}', 'VehicleTypeController@index')->name('vehicle_type.export_pdf');
    Route::post('vehicle_type/indexAjax', 'VehicleTypeController@indexAjax')->name('vehicle_type.indexAjax');
    Route::get('vehicle_type/indexAjax', 'VehicleTypeController@indexAjax')->name('vehicle_type.indexAjax');
    Route::resource('vehicle_type','VehicleTypeController');
});