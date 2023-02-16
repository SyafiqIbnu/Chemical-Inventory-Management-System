
<?php $__env->startComponent('layouts.components.nav_li_parent',
['permission'=>['booking_application_*'],
'title'=>__('general.booking'),'id'=>'menu-booking','icon'=>'fas fa-cogs']); ?> 
	<?php $__env->slot('content'); ?>


		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'booking_application_*',
		'title'=>__('general.booking_application'),'id'=>'menu-booking-all',
		'icon'=>'fa fa-list','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/booking_application')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'booking_application_*',
		'title'=>__('general.new').' '.__('general.booking'),'id'=>'menu-booking-create',
		'icon'=>'fa fa-plus-circle','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/booking_application/create')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'booking_*',
		'title'=>__('general.confirm').' '.__('general.booking'),'id'=>'menu-booking-confirm',
		'icon'=>'fa fa-check-square-o','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/booking')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
	

	<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/layouts/navigation_orders.blade.php ENDPATH**/ ?>