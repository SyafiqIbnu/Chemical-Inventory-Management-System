<?php
	if(!isset($menu_active_id)){
		$menu_active_id="menu-administration-user";
	}
?>
<?php $__env->startPush('scriptsDocumentReady'); ?>
	setMenuActive('<?php echo e($menu_active_id); ?>');
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/user/menu_active.blade.php ENDPATH**/ ?>