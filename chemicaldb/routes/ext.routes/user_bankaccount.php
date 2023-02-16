<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('user_bankaccount/export-remote/{type}', 'UserBankaccountController@index')->name('user_bankaccount.export_pdf');
    Route::post('user_bankaccount/indexAjax', 'UserBankaccountController@indexAjax')->name('user_bankaccount.indexAjax');
    Route::get('user_bankaccount/indexAjax', 'UserBankaccountController@indexAjax')->name('user_bankaccount.indexAjax');
    Route::resource('user_bankaccount','UserBankaccountController');
});