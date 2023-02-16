
<?php $__env->startComponent('layouts.components.nav_li_parent',
['permission'=>['order_*'],
'title'=>__('general.order'),'id'=>'menu-order','icon'=>'fas fa-cogs']); ?> 
	<?php $__env->slot('content'); ?>


		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'order_*',
		'title'=>__('general.orderhistory'),'id'=>'menu-order-all',
		'icon'=>'fa fa-cutlery','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/order')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'orderreview_*',
		'title'=>__('general.orderreview'),'id'=>'menu-order-review',
		'icon'=>'fa fa-cutlery','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/orderreviewer')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'orderapprove_*',
		'title'=>__('general.orderapprove'),'id'=>'menu-order-approve',
		'icon'=>'fa fa-cutlery','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/orderapprover')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'orderreceive_*',
		'title'=>__('general.orderreceive'),'id'=>'menu-order-receive',
		'icon'=>'fa fa-cutlery','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/orderreceiver')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'ordercreate_*',
		'title'=>__('general.ordercreate'),'id'=>'menu-order-create',
		'icon'=>'fa fa-cutlery','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/ordercreate')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

	

	<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/layouts/navigation_orders.blade.php ENDPATH**/ ?>