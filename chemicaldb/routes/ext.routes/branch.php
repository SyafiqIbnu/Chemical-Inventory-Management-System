<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('branch/export-remote/{type}', 'BranchController@index')->name('branch.export_pdf');
    Route::post('branch/indexAjax', 'BranchController@indexAjax')->name('branch.indexAjax');
    Route::get('branch/indexAjax', 'BranchController@indexAjax')->name('branch.indexAjax');
    Route::resource('branch','BranchController');
});