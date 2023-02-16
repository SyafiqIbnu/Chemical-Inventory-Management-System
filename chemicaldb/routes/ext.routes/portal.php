<?php

Route::get('/portal', 'Portal\PortalController@index')->name('portal.home');
Route::get('/portal/post/faq', 'Portal\PostController@faq')->name('portal.post.faq');
Route::resource('portal/post', 'Portal\PostController')->names('portal.post');