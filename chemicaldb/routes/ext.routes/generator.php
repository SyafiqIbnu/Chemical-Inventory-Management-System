<?php
Route::group(['middleware' => ['auth']], function () {
    Route::get("generator/getTableColumns/{table}/{name}", "GeneratorController@getTableColumns");
    Route::get("generator/getTableList/{name}", "GeneratorController@getTableList");
	Route::post("generator/generate/", "GeneratorController@generate")->name('generator.index');
    Route::post("generator/generate/{table?}", "GeneratorController@generate")->name('generator.generate');
	//Route::post("generator/generate/", "GeneratorController@generate")->name('generator.generate');
    Route::get("generator/getDropdownOptions/{col}", "GeneratorController@getDropdownOptions");
    Route::get("generator/getDropdownTableOptions/{table}/{col}", "GeneratorController@getDropdownTableOptions");
	Route::get("generator/", "GeneratorController@index")->name('generator.index');
	Route::post("generator/", "GeneratorController@index")->name('generator.index');
    //Route::get("generator/{table?}", "GeneratorController@index")->name('generator.index');
    //Route::post("generator/{table?}", "GeneratorController@index")->name('generator.index');
});