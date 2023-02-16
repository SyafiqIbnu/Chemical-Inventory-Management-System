<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('product_type/export-remote/{type}', 'ProductTypeController@index')->name('product_type.export_pdf');
    Route::post('product_type/indexAjax', 'ProductTypeController@indexAjax')->name('product_type.indexAjax');
    Route::get('product_type/indexAjax', 'ProductTypeController@indexAjax')->name('product_type.indexAjax');
    Route::resource('product_type','ProductTypeController');
});