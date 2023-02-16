<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('faculty/export-remote/{type}', 'FacultyController@index')->name('faculty.export_pdf');
    Route::post('faculty/indexAjax', 'FacultyController@indexAjax')->name('faculty.indexAjax');
    Route::get('faculty/indexAjax', 'FacultyController@indexAjax')->name('faculty.indexAjax');
    Route::resource('faculty','FacultyController');
});