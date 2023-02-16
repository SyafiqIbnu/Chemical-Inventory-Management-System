<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking_application/export-remote/{type}', 'BookingApplicationController@index')->name('booking_application.export_pdf');
    Route::post('booking_application/indexAjax', 'BookingApplicationController@indexAjax')->name('booking_application.indexAjax');
    Route::get('booking_application/indexAjax', 'BookingApplicationController@indexAjax')->name('booking_application.indexAjax');
    Route::resource('booking_application','BookingApplicationController');

    Route::get('/booking_application/{booking_vehicle_id}/confirm', 'BookingApplicationController@confirm')->name('booking_application.confirm');
    
    Route::get('/calculateDistance/{addressFrom}/{addressTo}/{unit}','BookingApplicationController@getDistance');
    Route::post('/calculateOptimizer/{id}','BookingApplicationController@calculateOptimizer')->name('booking_application.calculateOptimizer');
});