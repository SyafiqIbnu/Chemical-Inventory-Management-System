<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('booking/export-remote/{type}', 'BookingController@index')->name('booking.export_pdf');
    Route::post('booking/indexAjax', 'BookingController@indexAjax')->name('booking.indexAjax');
    Route::get('booking/indexAjax', 'BookingController@indexAjax')->name('booking.indexAjax');
    Route::resource('booking','BookingController');

    Route::get('testlogin','BookingController@testLogin')->name('booking.testlogin');
    Route::get('testoptimizer','BookingController@testOptimizer')->name('booking.testoptimizer');
    Route::post('/getmsg','BookingController@getMsg');

    Route::get('bookinginvoice/{id}','BookingController@showInvoice')->name('booking.invoice');
});