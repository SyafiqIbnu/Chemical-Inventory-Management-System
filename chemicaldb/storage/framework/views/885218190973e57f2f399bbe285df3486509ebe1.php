<?php $__env->startComponent('layouts.components.nav_li_parent',['permission'=>['user_*','role_*','announcement_*','application_*'],'title'=>__('general.registration'),'id'=>'menu-registration','icon'=>'fas fa-user-plus']); ?> 
	<?php $__env->slot('content'); ?>

		
		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.account_application'),'id'=>'menu-registration-account_application',
		'icon'=>'fa fa-user-plus','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/account_application/create')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.account_application_agency'),'id'=>'menu-registration-account_application_agency',
		'icon'=>'fa fa-user-plus','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/account_application_agency/create')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.account_application_individu'),'id'=>'menu-registration-account_individu',
		'icon'=>'fa fa-user-plus','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/account_application_individu/create')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		


	<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/navigation_registration.blade.php ENDPATH**/ ?>