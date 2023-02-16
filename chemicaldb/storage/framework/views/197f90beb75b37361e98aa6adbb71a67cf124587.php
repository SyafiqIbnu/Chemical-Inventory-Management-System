<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'uid','required' => '1','label'=>__('user.uid')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('uid',null,['class'=>'form-control','required','placeholder'=>__('user.uid_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('user.email')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('email',null,['class'=>'form-control','required','placeholder'=>__('user.email_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'mykad','required' => '1','label'=>__('user.mykad')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('mykad',null,['class'=>'form-control','required','placeholder'=>__('user.mykad_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('phone',null,['class'=>'form-control','required','placeholder'=>__('user.phone_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php if(Route::currentRouteName()=='user.create'): ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]); ?> 
	<?php $__env->slot('field'); ?>
		<input id="password" type="password" class="form-control" name="password" required autofocus="autofocus" placeholder="<?php echo e(__('user.password_placeholder')); ?>" maxlength="16">
	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>


	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password_confirm','required' => '1','label'=>__('user.password_confirm')]); ?> 
	<?php $__env->slot('field'); ?>
	<input id="password_confirm" type="password" class="form-control" name="password_confirm" required autofocus="autofocus" placeholder="<?php echo e(__('user.password_confirm_placeholder')); ?>" maxlength="16">
	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('user.active')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('active',['1'=>__('general.active'),'0'=>__('general.inactive')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user.roles','required' => '1','label'=>__('general.role')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('roles[]',$roles_list,null,['multiple'=>'multiple', 'class'=>'form-control select2','required','data-placeholder'=>__('general.please_select'),'id'=>'roles[]','name'=>'roles[]']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scriptsDocumentReadyBottom'); ?>
	hideAllUserOrg();
	<?php if(isset($modelUser->id)): ?>
		onSelectUserType(<?php echo e($modelUser->user_type_id); ?>);
	<?php endif; ?>

	$('#user_type_id').on('select2:select', function (e) {
  		// Do something
		var data = e.params.data;
    	console.log(data);
		hideAllUserOrg();
		onSelectUserType(data.id);
		
	});

	function onSelectUserType(selected_id){
		if(selected_id==5){
			$('#kitchen_id_div').show();
		}else {
			$('#location_id_div').show();
		
		}
	}

	function hideAllUserOrg(){
		$('#location_id_div').hide();
		$('#kitchen_id_div').hide();
			
	}

<?php $__env->stopPush(); ?>

<?php /**PATH C:\wamp64\www\factohub\resources\views/user/edit_form.blade.php ENDPATH**/ ?>