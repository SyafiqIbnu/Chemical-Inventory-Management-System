<?php $__env->startPush('scriptsDocumentReady'); ?>
	<?php
		$name = Route::currentRouteName();
		$menuActives=[];
		$menuActives[]="menu-reviewer-permit_application_review";	

	?>
	
	<?php $__currentLoopData = $menuActives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuActive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	setMenuActive('<?php echo e($menuActive); ?>');
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	

<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_reviewer/menu_active.blade.php ENDPATH**/ ?>