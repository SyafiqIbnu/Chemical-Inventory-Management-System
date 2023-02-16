<?php
Route::group(['middleware' => ['auth']], function () {
	/*
    Route::post('booking_cargo/export-remote/{type}', 'BookingCargoController@index')->name('booking_cargo.export_pdf');
    Route::post('booking_cargo/indexAjax', 'BookingCargoController@indexAjax')->name('booking_cargo.indexAjax');
    Route::get('booking_cargo/indexAjax', 'BookingCargoController@indexAjax')->name('booking_cargo.indexAjax');
    Route::resource('booking_cargo','BookingCargoController');
*/

    Route::post('booking_cargo/indexAjax/{id}', 'BookingCargoController@indexAjax')->name('booking_cargo.indexAjax');
    Route::get('booking_cargo/indexAjax/{id}', 'BookingCargoController@indexAjax')->name('booking_cargo.indexAjax');

    Route::get('/booking_cargo/{id}/index/{type?}', 'BookingCargoController@index')->name('booking_cargo.index');
    Route::get('/booking_cargo/create/{id}', 'BookingCargoController@create')->name('booking_cargo.create');
    Route::post('/booking_cargo', 'BookingCargoController@store')->name('booking_cargo.store');
    Route::delete('/booking_cargo/{id}', 'BookingCargoController@destroy')->name('booking_cargo.destroy');
});