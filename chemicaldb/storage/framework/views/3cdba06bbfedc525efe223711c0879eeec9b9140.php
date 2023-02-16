<?php $__env->startComponent('layouts.components.nav_li_parent',
['permission'=>['user_*','role_*','announcement_*','application_*','email_*'],
'title'=>__('general.system_administration'),'id'=>'menu-administration','icon'=>'fas fa-cogs']); ?> 
	<?php $__env->slot('content'); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.user'),'id'=>'menu-administration-user',
		'icon'=>'fa fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/user')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'role_*',
		'title'=>__('general.role'),'id'=>'menu-administration-role',
		'icon'=>'fa fa-user-shield','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/role')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'vehicle_type_*',
		'title'=>__('general.vehicle_type'),'id'=>'menu-administration-vehicle_type',
		'icon'=>'fa fa-truck','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/vehicle_type')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>


	

	<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\factohub\resources\views/layouts/navigation_administration.blade.php ENDPATH**/ ?>