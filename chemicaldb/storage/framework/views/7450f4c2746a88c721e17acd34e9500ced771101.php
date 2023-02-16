<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('agency_type.code')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('agency_type.code_placeholder'),'maxlength'=>5]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('agency_type.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('agency_type.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('agency_type.active')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('active',['1'=>__('general.active'),'2'=>__('general.inactive')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\wamp64\www\permitkhas\resources\views/agency_type/create_form.blade.php ENDPATH**/ ?>