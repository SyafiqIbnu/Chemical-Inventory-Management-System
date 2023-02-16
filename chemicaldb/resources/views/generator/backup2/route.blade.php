Route::group(['middleware' => ['auth']], function () {
    Route::resource('{{$route}}','{{$controllerName}}');
});