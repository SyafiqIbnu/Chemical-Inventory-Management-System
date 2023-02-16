
<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'*',
'title'=>__('general.tfa'),'id'=>'menu-tfa',
'icon'=>'fa fa-key','color'=>'primary']); ?> 
	<?php $__env->slot('url'); ?>
		<?php echo e(url('/tfa')); ?>

	<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/layouts/navigation_tfa.blade.php ENDPATH**/ ?>