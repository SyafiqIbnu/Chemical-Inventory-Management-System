<?php
Route::group(['middleware' => ['auth']], function () {
	Route::post('chemical/export-remote/{type}', 'ChemicalController@index')->name('chemical.export_pdf');
    Route::post('chemical/indexAjax', 'ChemicalController@indexAjax')->name('chemical.indexAjax');
    Route::get('chemical/indexAjax', 'ChemicalController@indexAjax')->name('chemical.indexAjax');
	
    Route::post('chemical/{laboratory_id}/chemicalbylab', 'ChemicalController@indexLaboratory')->name('chemicalbylab.export_pdf');
    Route::get('chemical/{laboratory_id}/chemicalbylab', 'ChemicalController@indexLaboratory')->name('chemicalbylab.export_pdf');
    Route::post('chemicalbylab/indexAjax/{laboratory_id}', 'ChemicalController@indexAjaxLaboratory')->name('chemical.indexAjaxLaboratory');
    Route::get('chemicalbylab/indexAjax/{laboratory_id}', 'ChemicalController@indexAjaxLaboratory')->name('chemical.indexAjaxLaboratory');
    //'create' button in chemical
    // Route::post('chemical/{laboratory_id}/chemicalbylab/create', 'ChemicalController@create')->name('chemicalbylab.export_pdf');
    // Route::get('chemical/{laboratory_id}/chemicalbylab/create', 'ChemicalController@create')->name('chemicalbylab.export_pdf');
    Route::post('chemical/create', 'ChemicalController@create');
    Route::get('chemical/create', 'ChemicalController@create');
    //'upload' button in chemical
    Route::get('chemical/{chemical_id}/uploadform', 'FileUploadController@createForm');
    Route::post('chemical/{chemical_id}/upload', 'FileUploadController@fileUpload')->name('fileupload.upload');
    //'view upload' button in chemical
    Route::get('chemical/{chemical_id}/viewfile', 'FileUploadController@view');
    //'create' button in chemicalbylab
    Route::post('chemical/{laboratory_id}/chemicalbylab/create', 'ChemicalController@createbylab')->name('chemicalbylab.export_pdf');
    Route::get('chemical/{laboratory_id}/chemicalbylab/create', 'ChemicalController@createbylab')->name('chemicalbylab.export_pdf');
    //'edit' button in chemical
    // Route::post('chemical/{laboratory_id}/chemicalbylab/edit', 'ChemicalController@editbylab')->name('chemicalbylab.export_pdf');
    // Route::get('chemical/{laboratory_id}/chemicalbylab/edit', 'ChemicalController@editbylab')->name('chemicalbylab.export_pdf');
    Route::post('chemical/edit', 'ChemicalController@edit');
    Route::get('chemical/edit', 'ChemicalController@edit');
    //'edit' button in chemicalbylab
    Route::post('chemical/{laboratory_id}/chemicalbylab/edit', 'ChemicalController@editbylab')->name('chemicalbylab.export_pdf');
    Route::get('chemical/{laboratory_id}/chemicalbylab/edit', 'ChemicalController@editbylab')->name('chemicalbylab.export_pdf');
    //store
    Route::post('chemical/{laboratory_id}/chemicalbylab/store', 'ChemicalController@store')->name('chemicalbylab.export_pdf');
    Route::get('chemical/{laboratory_id}/chemicalbylab/store', 'ChemicalController@store')->name('chemicalbylab.export_pdf');
    //show
    Route::post('chemical/{laboratory_id}/chemicalbylab/show', 'ChemicalController@show')->name('chemicalbylab.export_pdf');
    Route::get('chemical/{laboratory_id}/chemicalbylab/show', 'ChemicalController@show')->name('chemicalbylab.export_pdf');
    //update
    Route::post('chemical/{laboratory_id}/chemicalbylab/update', 'ChemicalController@update')->name('chemicalbylab.export_pdf');
    Route::get('chemical/{laboratory_id}/chemicalbylab/update', 'ChemicalController@update')->name('chemicalbylab.export_pdf');
    //destroy
    Route::post('chemical/{laboratory_id}/chemicalbylab/destroy', 'ChemicalController@destroy')->name('chemicalbylab.export_pdf');
    Route::get('chemical/{laboratory_id}/chemicalbylab/destroy', 'ChemicalController@destroy')->name('chemicalbylab.export_pdf');

    Route::resource('chemical','ChemicalController');
});