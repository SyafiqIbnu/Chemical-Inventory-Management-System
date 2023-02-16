<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('order_statu/export-remote/{type}', 'OrderStatuController@index')->name('order_statu.export_pdf');
    Route::post('order_statu/indexAjax', 'OrderStatuController@indexAjax')->name('order_statu.indexAjax');
    Route::get('order_statu/indexAjax', 'OrderStatuController@indexAjax')->name('order_statu.indexAjax');
    Route::resource('order_statu','OrderStatuController');
});