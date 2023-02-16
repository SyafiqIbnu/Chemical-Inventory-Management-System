<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('announcement/export-remote/pdf', 'AnnouncementController@index')->name('announcement.export_pdf');
    Route::post('announcement/export-remote/excel', 'AnnouncementController@index')->name('announcement.export_excel');
    Route::post('announcement/indexAjax', 'AnnouncementController@indexAjax')->name('announcement.indexAjax');
    Route::get('announcement/indexAjax', 'AnnouncementController@indexAjax')->name('announcement.indexAjax');
    Route::resource('announcement','AnnouncementController');
});