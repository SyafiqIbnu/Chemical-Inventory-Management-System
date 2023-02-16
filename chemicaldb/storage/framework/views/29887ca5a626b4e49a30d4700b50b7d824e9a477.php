<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user.name_placeholder'),'maxlength'=>255]); ?>

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

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'general.state_id','required' => '1','label'=>__('general.state')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('state_id',$state_list,null,['class'=>'form-control select2','required','data-placeholder'=>__('general.please_select'),'id'=>'state_id','name'=>'state_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'branch_id','required' => '0','label'=>__('staff.branch_id'),'id'=>'branch_id_div']); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('branch_id',$branch_id_list,null,[ 'class'=>'form-control select2','placeholder'=>__('general.please_select'),'id'=>'branch_id','name'=>'branch_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'user.roles','required' => '1','label'=>__('general.role')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('roles[]',$roles_list,null,['class'=>'form-control select2','required','data-placeholder'=>__('general.please_select'),'id'=>'roles[]','name'=>'roles[]']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php if(Route::currentRouteName()=='user.createKpdnUser'): ?>
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

<?php $__env->startPush('scriptsDocumentReadyBottom'); ?>
	

	$('#state_id').on('select2:select', function (e) {
  		// Do something
		var data = e.params.data;
    	console.log(data);
		
		
	});

	



<?php $__env->stopPush(); ?>
<?php /**PATH C:\wamp64\www\permitkhas\resources\views/user/create_form_kpdnuser.blade.php ENDPATH**/ ?>