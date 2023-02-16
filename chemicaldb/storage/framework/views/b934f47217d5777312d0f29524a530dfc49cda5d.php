<?php $__env->startComponent('layouts.components.nav_li_parent',
['permission'=>['user_*'],
'title'=>__('general.product'),'id'=>'menu-product','icon'=>'fas fa-cogs']); ?> 
	<?php $__env->slot('content'); ?>


		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'nasiarab_*',
		'title'=>__('general.nasiarab'),'id'=>'menu-product-nasiarab',
		'icon'=>'fa fa-cutlery','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/nasiarab')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

	

	<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\factohub\resources\views/layouts/navigation_products.blade.php ENDPATH**/ ?>