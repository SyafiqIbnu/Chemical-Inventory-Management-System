
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('user.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('user.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'upline_name','required' => '1','label'=>__('user.upline_name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('upline_name',$modelUplineUser->name,['class'=>'form-control','readonly'=>true,'required','placeholder'=>__('user.uid_placeholder')]); ?>

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

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'location_id','required' => '0','label'=>__('user.location_id'),'id'=>'location_id_div']); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('location_id',$location_list,null,[ 'class'=>'form-control select2','placeholder'=>__('general.please_select'),'id'=>'location_id','name'=>'location_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php if(Route::currentRouteName()=='user.create_refer_agent'): ?>
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

<?php echo Form::hidden('upline_id',$modelUplineUser->id); ?>





<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/user/create_form_refer_agent.blade.php ENDPATH**/ ?>