Route::group(['middleware' => ['auth']], function () {
	Route::post('{{$name}}/export-remote/{type}', '{{$controllerName}}@index')->name('{{$route}}.export_pdf');
    Route::post('{{$name}}/indexAjax', '{{$controllerName}}@indexAjax')->name('{{$route}}.indexAjax');
    Route::get('{{$name}}/indexAjax', '{{$controllerName}}@indexAjax')->name('{{$route}}.indexAjax');
    Route::resource('{{$route}}','{{$controllerName}}');
});