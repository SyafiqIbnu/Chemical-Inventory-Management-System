<?php $__env->startComponent('layouts.components.nav_li_parent',['permission'=>['user_*','role_*','announcement_*','application_*','email_*'],'title'=>__('general.system_administration'),'id'=>'menu-administration','icon'=>'fas fa-cogs']); ?> 
	<?php $__env->slot('content'); ?>


		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('general.account_holder'),'id'=>'menu-administration-user',
		'icon'=>'fa fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/user')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'user_*',
		'title'=>__('user.title_kpdn'),'id'=>'menu-administration-kpdn',
		'icon'=>'fa fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/userkpdn')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>['user_create','user_edit'],
		'title'=>__('general.user_admin'),'id'=>'menu-administration-admin',
		'icon'=>'fas fa-user-secret','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/user/admin')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',['permission'=>'agencie_*',
		'title'=>__('general.account_application_agency_approve'),'id'=>'menu-administration-account_holder_agency',
		'icon'=>'fa fa-users','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/account_holder_agency')); ?>

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
		['permission'=>'branch_*',
		'title'=>__('general.branch'),'id'=>'menu-administration-branch',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/branch')); ?>

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
		['permission'=>'actitivy_type_*',
		'title'=>__('general.actitivy_type'),'id'=>'menu-administration-actitivy_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/actitivy_type')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'applicant_category_*',
		'title'=>__('general.applicant_category'),'id'=>'menu-administration-applicant_category',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/applicant_category')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'state_*',
		'title'=>__('general.state'),'id'=>'menu-administration-state',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/state')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'district_*',
		'title'=>__('general.district'),'id'=>'menu-administration-district',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/district')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'city_*',
		'title'=>__('general.city'),'id'=>'menu-administration-city',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/city')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
		

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'citie_*',
		'title'=>__('general.controlled_goods_type'),'id'=>'menu-administration-controlled_goods_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/controlled_goods_type')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
		

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'designation_*',
		'title'=>__('general.designation'),'id'=>'menu-administration-designation',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/designation')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>


		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'document_type_*',
		'title'=>__('general.document_type'),'id'=>'menu-administration-document_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/document_type')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'equipment_*',
		'title'=>__('general.equipment'),'id'=>'menu-administration-equipment',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/equipment')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
		
		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'oilco_*',
		'title'=>__('general.oilco'),'id'=>'menu-administration-oilco',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/oilco')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>		

		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'purchase_type_*',
		'title'=>__('general.purchase_type'),'id'=>'menu-administration-purchase_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/purchase_type')); ?>

			<?php $__env->endSlot(); ?> 
		<?php echo $__env->renderComponent(); ?>
		
		
		<?php $__env->startComponent('layouts.components.nav_li',
		['permission'=>'agency_type_*',
		'title'=>__('general.agency_type'),'id'=>'menu-administration-agency_type',
		'icon'=>'fas fa-bullhorn','color'=>'primary']); ?> 
			<?php $__env->slot('url'); ?>
			  <?php echo e(url('/agency_type')); ?>

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
  <?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/layouts/navigation_administration.blade.php ENDPATH**/ ?>