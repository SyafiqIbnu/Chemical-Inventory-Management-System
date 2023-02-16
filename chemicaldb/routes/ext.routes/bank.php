<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('bank/export-remote/{type}', 'BankController@index')->name('bank.export_pdf');
    Route::post('bank/indexAjax', 'BankController@indexAjax')->name('bank.indexAjax');
    Route::get('bank/indexAjax', 'BankController@indexAjax')->name('bank.indexAjax');
    Route::resource('bank','BankController');
});