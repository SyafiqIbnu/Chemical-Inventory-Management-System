<?php
	if(!isset($menu_active_id)){
		$menu_active_id="menu-tfa";
	}
?>
<?php $__env->startPush('scriptsDocumentReady'); ?>
	setMenuActive('<?php echo e($menu_active_id); ?>');
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/tfa/menu_active.blade.php ENDPATH**/ ?>