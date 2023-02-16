
<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'inbox_*',
'title'=>__('general.inbox'),'id'=>'menu-inbox',
'icon'=>'fa fa-envelope','color'=>'primary']); ?> 
	<?php $__env->slot('url'); ?>
		<?php echo e(url('/inbox')); ?>

	<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/navigation_inbox.blade.php ENDPATH**/ ?>