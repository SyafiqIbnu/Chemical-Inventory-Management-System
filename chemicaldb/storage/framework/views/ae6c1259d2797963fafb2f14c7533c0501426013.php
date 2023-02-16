<?php $__env->startComponent('layouts.components.nav_li_parent',
['permission'=>'*',
'title'=>__('general.system_administration'),'id'=>'menu-administration','icon'=>'fas fa-cogs']); ?> 
	<?php $__env->slot('content'); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'*',
		'title'=>__('general.user'),'id'=>'menu-administration-user',
		'icon'=>'fa fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('user')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'*',
		'title'=>__('general.role'),'id'=>'menu-administration-role',
		'icon'=>'fa fa-user-shield','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/role')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>


	

	<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/layouts/navigation_administration.blade.php ENDPATH**/ ?>