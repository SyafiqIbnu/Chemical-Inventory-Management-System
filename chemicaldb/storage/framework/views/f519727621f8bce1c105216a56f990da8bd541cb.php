<?php echo Form::hidden('permit_application_id',$permit_application_id); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('permit_application_document.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('permit_application_document.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('Pilih Fail')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::file('Pilih Fail', ['class' => 'btn btn-primary','name'=>'filepath']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('permit_application_usage.active')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('active',['1'=>__('general.active'),'2'=>__('general.inactive')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_document/create_form.blade.php ENDPATH**/ ?>