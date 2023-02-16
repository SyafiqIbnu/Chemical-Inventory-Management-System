<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_vehicle/export-remote/{type}', 'BookingVehicleController@index')->name('booking_vehicle.export_pdf');
    Route::post('booking_vehicle/indexAjax/{id}', 'BookingVehicleController@indexAjax')->name('booking_vehicle.indexAjax');
    Route::get('booking_vehicle/indexAjax/{id}', 'BookingVehicleController@indexAjax')->name('booking_vehicle.indexAjax');
    Route::resource('booking_vehicle','BookingVehicleController');
});