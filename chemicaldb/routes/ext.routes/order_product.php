<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('order_product/export-remote/{type}', 'OrderProductController@index')->name('order_product.export_pdf');
    Route::post('order_product/indexAjax', 'OrderProductController@indexAjax')->name('order_product.indexAjax');
    Route::get('order_product/indexAjax', 'OrderProductController@indexAjax')->name('order_product.indexAjax');
    Route::resource('order_product','OrderProductController');
    
});