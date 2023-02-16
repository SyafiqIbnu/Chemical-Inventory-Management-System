<?php $__env->startComponent('layouts.components.nav_li_parent',
['permission'=>['order_*'],
'title'=>__('general.profile'),'id'=>'menu-profile','icon'=>'fas fa-cogs']); ?> 
	<?php $__env->slot('content'); ?>
		
		
		

		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'order_*',
		'title'=>__('general.profile'),'id'=>'menu-profile-user',
		'icon'=>'fas fa-user','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/profile')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		

		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'order_*',
		'title'=>__('general.profile_upline'),'id'=>'menu-profile-upline',
		'icon'=>'fas fa-user-secret','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/profile_upline')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'user_bankaccount_*',
		'title'=>__('general.user_bankaccount'),'id'=>'menu-profile-bankaccount',
		'icon'=>'fa fa-money','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/user_bankaccount')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>


		<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/layouts/navigation_profile.blade.php ENDPATH**/ ?>