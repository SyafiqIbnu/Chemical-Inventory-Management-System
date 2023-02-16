<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('staff/export-remote/{type}', 'StaffController@index')->name('staff.export_pdf');
    Route::post('staff/indexAjax', 'StaffController@indexAjax')->name('staff.indexAjax');
    Route::get('staff/indexAjax', 'StaffController@indexAjax')->name('staff.indexAjax');
    Route::resource('staff','StaffController');
});