<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('nasiarab/export-remote/{type}', 'NasiarabController@index')->name('nasiarab.export_pdf');
    Route::post('nasiarab/indexAjax', 'NasiarabController@indexAjax')->name('nasiarab.indexAjax');
    Route::get('nasiarab/indexAjax', 'NasiarabController@indexAjax')->name('nasiarab.indexAjax');
    Route::resource('nasiarab','NasiarabController');
    
});