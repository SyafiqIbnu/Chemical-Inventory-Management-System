<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('kitchen/export-remote/{type}', 'KitchenController@index')->name('kitchen.export_pdf');
    Route::post('kitchen/indexAjax', 'KitchenController@indexAjax')->name('kitchen.indexAjax');
    Route::get('kitchen/indexAjax', 'KitchenController@indexAjax')->name('kitchen.indexAjax');
    Route::resource('kitchen','KitchenController');
});