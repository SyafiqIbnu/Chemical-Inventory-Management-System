<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('order/export-remote/{type}', 'OrderController@index')->name('order.export_pdf');
    Route::post('order/indexAjax', 'OrderController@indexAjax')->name('order.indexAjax');
    Route::get('order/indexAjax', 'OrderController@indexAjax')->name('order.indexAjax');

    Route::get('orderreviewer', 'OrderController@indexReview')->name('order.reviewer');
    Route::post('orderreviewer', 'OrderController@indexAjaxReview')->name('order.indexAjaxReview');

    Route::get('orderapprover', 'OrderController@indexApprove')->name('order.approver');
    Route::post('orderapprover', 'OrderController@indexAjaxApprove')->name('order.indexAjaxApprove');

    Route::get('orderreceiver', 'OrderController@indexReceive')->name('order.receiver');
    Route::post('orderreceiver', 'OrderController@indexAjaxReceive')->name('order.indexAjaxReceive');

    Route::get('ordercreate', 'OrderController@create')->name('order.create');

    Route::get('orderlinked/create', 'OrderController@create_orderlinked')->name('order.create_orderlinked');
    Route::get('orderlinked/{orderid}/products', 'OrderController@create_orderlinked_products')->name('order.create_orderlinked_products');
    Route::put('orderlinked/{orderid}/storeproducts','OrderController@store_products')->name('order.store_products');
    Route::get('orderlinked/{orderid}/proceed', 'OrderController@proceed')->name('order.proceed');
    Route::resource('order','OrderController');

    Route::put('/orderlinked/{orderid}/submit', 'OrderController@submit')->name('orderlinked.submit');
    Route::patch('/orderlinked/{orderid}/submit', 'OrderController@submit')->name('orderlinked.submit');

    Route::get('ordersummary/{orderid}', 'OrderController@orderSummary')->name('order.orderSummary');
    Route::get('orderreview/{orderid}', 'OrderController@orderReview')->name('order.orderReview');
    Route::get('orderapprove/{orderid}', 'OrderController@orderApprove')->name('order.orderApprove');
    Route::get('orderreceive/{orderid}', 'OrderController@orderReceive')->name('order.orderReceive');

    Route::put('/orderreviewed/{orderid}', 'OrderController@reviewedOrder')->name('order.orderreviewed');
    Route::patch('/orderreviewed/{orderid}', 'OrderController@reviewedOrder')->name('order.orderreviewed');
    
    Route::put('/orderapproved/{orderid}', 'OrderController@approvedOrder')->name('order.orderapproved');
    Route::patch('/orderapproved/{orderid}', 'OrderController@approvedOrder')->name('order.orderapproved');
    
    
});


    
