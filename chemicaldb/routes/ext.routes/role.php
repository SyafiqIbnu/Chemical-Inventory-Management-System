<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('role/export-remote/{type}', 'RoleController@index')->name('role.export_pdf');
    Route::post('role/indexAjax', 'RoleController@indexAjax')->name('role.indexAjax');
    Route::get('role/indexAjax', 'RoleController@indexAjax')->name('role.indexAjax');
    Route::resource('role','RoleController');
});