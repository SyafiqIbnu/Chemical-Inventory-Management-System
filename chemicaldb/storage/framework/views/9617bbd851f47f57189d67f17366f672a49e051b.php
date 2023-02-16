<?php if(\App\Helpers\UserModelDataHelper::getUserIsAccountHolder()): ?>
	<?php $__env->startComponent('layouts.components.nav_li_parent',['permission'=>['permit_*','permit_application_*'],'title'=>__('general.account_holder'),'id'=>'menu-account_holder','icon'=>'fas fa-users']); ?> 
		<?php $__env->slot('content'); ?>

			
			<?php $__env->startComponent('layouts.components.nav_li',
			['permission'=>'permit_*',
			'title'=>__('general.permit_list'),'id'=>'menu-account_holder-permit',
			'icon'=>'fas fa-house-user','color'=>'primary']); ?> 
				<?php $__env->slot('url'); ?>
				<?php echo e(url('/permit')); ?>

				<?php $__env->endSlot(); ?> 
			<?php echo $__env->renderComponent(); ?>


			
			<?php $__env->startComponent('layouts.components.nav_li',
			['permission'=>'permit_application_*',
			'title'=>__('general.permit_application_list'),'id'=>'menu-account_holder-permit_application',
			'icon'=>'fas fa-house-user','color'=>'primary']); ?> 
				<?php $__env->slot('url'); ?>
				<?php echo e(url('/permit_application')); ?>

				<?php $__env->endSlot(); ?> 
			<?php echo $__env->renderComponent(); ?>


			
			<?php $__env->startComponent('layouts.components.nav_li',
			['permission'=>'permit_application_*',
			'title'=>__('general.permit_cancelled'),'id'=>'menu-account_holder-permit_cancelled',
			'icon'=>'fas fa-house-user','color'=>'primary']); ?> 
				<?php $__env->slot('url'); ?>
				<?php echo e(url('/permit_application/cancelled')); ?>

				<?php $__env->endSlot(); ?> 
			<?php echo $__env->renderComponent(); ?>
			
		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/navigation_account_holder.blade.php ENDPATH**/ ?>