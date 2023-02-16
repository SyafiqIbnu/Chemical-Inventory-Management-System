<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('laboratory/export-remote/{type}', 'LaboratoryController@index')->name('laboratory.export_pdf');
    Route::post('laboratory/indexAjax', 'LaboratoryController@indexAjax')->name('laboratory.indexAjax');
    Route::get('laboratory/indexAjax', 'LaboratoryController@indexAjax')->name('laboratory.indexAjax');
    Route::resource('laboratory','LaboratoryController');
});