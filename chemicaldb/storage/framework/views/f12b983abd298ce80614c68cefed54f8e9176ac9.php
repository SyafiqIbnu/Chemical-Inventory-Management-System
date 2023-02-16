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

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('user.title_smartpartner'),'id'=>'menu-administration-smartpartner',
		'icon'=>'fa fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/usersmartpartner')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('user.title_agent'),'id'=>'menu-administration-agent',
		'icon'=>'fa fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/useragent')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'user_*',
		'title'=>__('user.title_dropship'),'id'=>'menu-administration-dropship',
		'icon'=>'fas fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/userdropship')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('user.title_kitchen'),'id'=>'menu-administration-kitchen',
		'icon'=>'fa fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/userkitchen')); ?>

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
		['permission'=>'announcement_*',
		'title'=>__('general.announcement'),'id'=>'menu-administration-announcement',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/announcement')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

	
		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'state_*',
		'title'=>__('general.state'),'id'=>'menu-administration-state',
		'icon'=>'fas fa-map-marker','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/state')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'kitchen_*',
		'title'=>__('general.kitchen'),'id'=>'menu-administration-kitchenlocation',
		'icon'=>'fas fa-map','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/kitchen')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'location_*',
		'title'=>__('general.location'),'id'=>'menu-administration-location',
		'icon'=>'fas fa-location-arrow','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/location')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'location_*',
		'title'=>__('general.bank'),'id'=>'menu-administration-bank',
		'icon'=>'fa fa-money','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/bank')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

	
		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'email_*',
		'title'=>__('general.email'),'id'=>'menu-administration-email',
		'icon'=>'fa fa-envelope','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/mail_message')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

	<?php $__env->endSlot(); ?>
  <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/layouts/navigation_administration.blade.php ENDPATH**/ ?>