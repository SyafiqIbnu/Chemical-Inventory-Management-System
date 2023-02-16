<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('laboratory_type/export-remote/{type}', 'LaboratoryTypeController@index')->name('laboratory_type.export_pdf');
    Route::post('laboratory_type/indexAjax', 'LaboratoryTypeController@indexAjax')->name('laboratory_type.indexAjax');
    Route::get('laboratory_type/indexAjax', 'LaboratoryTypeController@indexAjax')->name('laboratory_type.indexAjax');
    Route::resource('laboratory_type','LaboratoryTypeController');
});