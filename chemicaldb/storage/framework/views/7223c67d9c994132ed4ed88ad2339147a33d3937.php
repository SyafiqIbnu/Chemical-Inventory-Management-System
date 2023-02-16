<?php $__env->startComponent('layouts.components.nav_li_parent',
['permission'=>[''],
'title'=>__('general.product'),'id'=>'menu-reference','icon'=>'fas fa-cogs']); ?> 
	<?php $__env->slot('content'); ?>


		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'',
		'title'=>__('general.faculty'),'id'=>'menu-reference-faculty',
		'icon'=>'fa fa-cutlery','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/faculty')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
		
	

	<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/layouts/navigation_reference.blade.php ENDPATH**/ ?>