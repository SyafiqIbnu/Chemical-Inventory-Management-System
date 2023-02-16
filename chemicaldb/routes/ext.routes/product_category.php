<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('product_category/export-remote/{type}', 'ProductCategoryController@index')->name('product_category.export_pdf');
    Route::post('product_category/indexAjax', 'ProductCategoryController@indexAjax')->name('product_category.indexAjax');
    Route::get('product_category/indexAjax', 'ProductCategoryController@indexAjax')->name('product_category.indexAjax');
    Route::resource('product_category','ProductCategoryController');
});