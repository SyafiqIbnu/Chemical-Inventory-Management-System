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

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('user.phone')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('phone',null,['class'=>'form-control','required','placeholder'=>__('user.phone_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('password',null,['class'=>'form-control','required','placeholder'=>__('user.password_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'passwordmd5','required' => '1','label'=>__('user.passwordmd5')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('passwordmd5',null,['class'=>'form-control','required','placeholder'=>__('user.passwordmd5_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'is_admin','required' => '1','label'=>__('user.is_admin')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('is_admin',null,['class'=>'form-control','required','placeholder'=>__('user.is_admin_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/user/create_form.blade.php ENDPATH**/ ?>