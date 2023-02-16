<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('state/export-remote/{type}', 'StateController@index')->name('state.export_pdf');
    Route::post('state/indexAjax', 'StateController@indexAjax')->name('state.indexAjax');
    Route::get('state/indexAjax', 'StateController@indexAjax')->name('state.indexAjax');
    Route::resource('state','StateController');
});