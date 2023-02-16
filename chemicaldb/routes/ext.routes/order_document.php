<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('order_document/export-remote/{type}', 'OrderDocumentController@index')->name('order_document.export_pdf');
    Route::post('order_document/indexAjax', 'OrderDocumentController@indexAjax')->name('order_document.indexAjax');
    Route::get('order_document/indexAjax', 'OrderDocumentController@indexAjax')->name('order_document.indexAjax');
    Route::resource('order_document','OrderDocumentController');
});