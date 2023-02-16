
Route::get('{{$newpath}}/export/{type?}', '{{$controllerName}}@index');
Route::resource('{{$newpath}}','{{$controllerName}}',
    ['names' => ['index' => '{{$route}}.index',
        'show' => '{{$route}}.show',
        'create' => '{{$route}}.create',
        'store' => '{{$route}}.store',
        'edit' => '{{$route}}.edit',
        'update' => '{{$route}}.update',
        'showRecordSaved' => '{{$route}}.showRecordSaved',
        'destroy' => '{{$route}}.destroy']
    ]);