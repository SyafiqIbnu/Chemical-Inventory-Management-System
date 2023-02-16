<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('account_holder.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('account_holder.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'registration_no','required' => '1','label'=>__('account_holder.registration_no')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('registration_no',null,['class'=>'form-control','required','placeholder'=>__('account_holder.registration_no_placeholder'),'maxlength'=>45]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'remark','required' => '1','label'=>__('account_holder.remark')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('remark',null,['class'=>'form-control','required','placeholder'=>__('account_holder.remark_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fc_quota_basic','required' => '1','label'=>__('account_holder.fc_quota_basic')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('fc_quota_basic',null,['class'=>'form-control','required','placeholder'=>__('account_holder.fc_quota_basic_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fc_quota_additional','required' => '1','label'=>__('account_holder.fc_quota_additional')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('fc_quota_additional',null,['class'=>'form-control','required','placeholder'=>__('account_holder.fc_quota_additional_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/account_holder/create_form.blade.php ENDPATH**/ ?>