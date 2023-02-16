        

		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'profile_*',
		'title'=>__('general.profile'),'id'=>'menu-profile',
		'icon'=>'fas fa-user','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/profile')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/navigation_profile.blade.php ENDPATH**/ ?>