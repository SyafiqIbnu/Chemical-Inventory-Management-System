Route::group(['middleware' => ['auth']], function () {
	Route::post('<?php echo e($name); ?>/export-remote/{type}', '<?php echo e($controllerName); ?>@index')->name('<?php echo e($route); ?>.export_pdf');
    Route::post('<?php echo e($name); ?>/indexAjax', '<?php echo e($controllerName); ?>@indexAjax')->name('<?php echo e($route); ?>.indexAjax');
    Route::get('<?php echo e($name); ?>/indexAjax', '<?php echo e($controllerName); ?>@indexAjax')->name('<?php echo e($route); ?>.indexAjax');
    Route::resource('<?php echo e($route); ?>','<?php echo e($controllerName); ?>');
});<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/generator/route.blade.php ENDPATH**/ ?>