<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'account_holder_id','required' => '1','label'=>__('permit.account_holder_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('account_holder_id',$modelPermit->account_holder_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'registration_no','required' => '1','label'=>__('permit.registration_no')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('registration_no',$modelPermit->registration_no,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'pbt_no','required' => '1','label'=>__('permit.pbt_no')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('pbt_no',$modelPermit->pbt_no,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'company_name','required' => '1','label'=>__('permit.company_name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('company_name',$modelPermit->company_name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'applicant_category_id','required' => '1','label'=>__('permit.applicant_category_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('applicant_category_id',$modelPermit->applicant_category_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'address1','required' => '1','label'=>__('permit.address1')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('address1',$modelPermit->address1,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'address2','required' => '1','label'=>__('permit.address2')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('address2',$modelPermit->address2,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'postcode','required' => '1','label'=>__('permit.postcode')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('postcode',$modelPermit->postcode,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'city_id','required' => '1','label'=>__('permit.city_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('city_id',$modelPermit->city_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('permit.state_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('state_id',$modelPermit->state_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'district_id','required' => '1','label'=>__('permit.district_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('district_id',$modelPermit->district_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone_no','required' => '1','label'=>__('permit.phone_no')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('phone_no',$modelPermit->phone_no,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fax_no','required' => '1','label'=>__('permit.fax_no')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('fax_no',$modelPermit->fax_no,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'mobile_no','required' => '1','label'=>__('permit.mobile_no')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('mobile_no',$modelPermit->mobile_no,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('permit.email')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('email',$modelPermit->email,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'activitiy_type_id','required' => '1','label'=>__('permit.activitiy_type_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('activitiy_type_id',$modelPermit->activitiy_type_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'permit_start_date','required' => '1','label'=>__('permit.permit_start_date')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('permit_start_date',$modelPermit->permit_start_date,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'permit_edit_date','required' => '1','label'=>__('permit.permit_edit_date')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('permit_edit_date',$modelPermit->permit_edit_date,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'purchase_purpose','required' => '1','label'=>__('permit.purchase_purpose')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('purchase_purpose',$modelPermit->purchase_purpose,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'activity_state_id','required' => '1','label'=>__('permit.activity_state_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('activity_state_id',$modelPermit->activity_state_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'activiti_address','required' => '1','label'=>__('permit.activiti_address')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('activiti_address',$modelPermit->activiti_address,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'branch_id','required' => '1','label'=>__('permit.branch_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('branch_id',$modelPermit->branch_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'permit_no','required' => '1','label'=>__('permit.permit_no')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('permit_no',$modelPermit->permit_no,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'permit_status_id','required' => '1','label'=>__('permit.permit_status_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('permit_status_id',$modelPermit->permit_status_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'oilco_id','required' => '1','label'=>__('permit.oilco_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('oilco_id',$modelPermit->oilco_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_id','required' => '1','label'=>__('permit.fuelstation_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('fuelstation_id',$modelPermit->fuelstation_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_state_id','required' => '1','label'=>__('permit.fuelstation_state_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('fuelstation_state_id',$modelPermit->fuelstation_state_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_city_id','required' => '1','label'=>__('permit.fuelstation_city_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('fuelstation_city_id',$modelPermit->fuelstation_city_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_name','required' => '1','label'=>__('permit.fuelstation_name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('fuelstation_name',$modelPermit->fuelstation_name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_address','required' => '1','label'=>__('permit.fuelstation_address')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('fuelstation_address',$modelPermit->fuelstation_address,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'certifier_name','required' => '1','label'=>__('permit.certifier_name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('certifier_name',$modelPermit->certifier_name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'certifier_mykad','required' => '1','label'=>__('permit.certifier_mykad')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('certifier_mykad',$modelPermit->certifier_mykad,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'application_date','required' => '1','label'=>__('permit.application_date')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('application_date',$modelPermit->application_date,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('permit.active')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('active',$modelPermit->active,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit/show_form.blade.php ENDPATH**/ ?>