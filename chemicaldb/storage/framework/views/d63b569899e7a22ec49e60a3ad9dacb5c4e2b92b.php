<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('branch.code')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('code',$modelBranch->code,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('branch.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelBranch->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('branch.state_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('state_id',$modelBranch->state_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'shortname','required' => '1','label'=>__('branch.shortname')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('shortname',$modelBranch->shortname,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'is_hq','required' => '1','label'=>__('branch.is_hq')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('is_hq',$modelBranch->is_hq,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'addr1','required' => '1','label'=>__('branch.addr1')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('addr1',$modelBranch->addr1,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'addr2','required' => '1','label'=>__('branch.addr2')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('addr2',$modelBranch->addr2,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'addr3','required' => '1','label'=>__('branch.addr3')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('addr3',$modelBranch->addr3,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'postcode','required' => '1','label'=>__('branch.postcode')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('postcode',$modelBranch->postcode,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'city','required' => '1','label'=>__('branch.city')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('city',$modelBranch->city,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('branch.phone')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('phone',$modelBranch->phone,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fax','required' => '1','label'=>__('branch.fax')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('fax',$modelBranch->fax,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('branch.email')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('email',$modelBranch->email,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('branch.active')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('active',$modelBranch->active,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/branch/show_form.blade.php ENDPATH**/ ?>