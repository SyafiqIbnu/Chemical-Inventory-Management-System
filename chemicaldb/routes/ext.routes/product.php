<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('product/export-remote/{type}', 'ProductController@index')->name('product.export_pdf');
    Route::post('product/indexAjax', 'ProductController@indexAjax')->name('product.indexAjax');
    Route::get('product/indexAjax', 'ProductController@indexAjax')->name('product.indexAjax');
    Route::resource('product','ProductController');
});