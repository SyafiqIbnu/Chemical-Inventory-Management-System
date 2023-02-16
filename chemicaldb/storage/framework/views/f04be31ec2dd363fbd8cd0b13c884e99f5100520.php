
<?php $__env->startComponent('layouts.components.nav_li_parent',
	['permission'=>['permit_application_review_*'],
	'title'=>__('general.reviewer'),
	'id'=>'menu-reviewer',
	'icon'=>'fas fa-users']); ?>

	<?php $__env->slot('content'); ?>
	
		
		<?php $__env->startComponent('layouts.components.nav_li',
			[
				'permission'=>'permit_*',
				'title'=>__('general.company_list'),
				'id'=>'menu-reviewer-company_list',
				'icon'=>'fas fa-house-user',
				'color'=>'primary'
			]
			); ?>

			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/company_list')); ?>

			<?php $__env->endSlot(); ?>

		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'permit_*',
		'title'=>__('general.permit_search'),'id'=>'menu-reviewer-permit_search',
		'icon'=>'fab fa-waze','color'=>'primary']); ?>
			<?php $__env->slot('url'); ?>
			<?php echo e(url('/permit_search')); ?>

			<?php $__env->endSlot(); ?>
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'permit_*',
		'title'=>__('general.permit_application_review'),'id'=>'menu-reviewer-permit_application_review',
		'icon'=>'fab fa-waze','color'=>'primary']); ?>
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/permit_application_review')); ?>

			<?php $__env->endSlot(); ?>
		<?php echo $__env->renderComponent(); ?>

    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/navigation_reviewer.blade.php ENDPATH**/ ?>