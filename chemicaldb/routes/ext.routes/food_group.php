<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('food_group/export-remote/{type}', 'FoodGroupController@index')->name('food_group.export_pdf');
    Route::post('food_group/indexAjax', 'FoodGroupController@indexAjax')->name('food_group.indexAjax');
    Route::get('food_group/indexAjax', 'FoodGroupController@indexAjax')->name('food_group.indexAjax');
    Route::resource('food_group','FoodGroupController');
});