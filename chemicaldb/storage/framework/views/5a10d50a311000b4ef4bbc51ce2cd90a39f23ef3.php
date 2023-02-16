<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('document_type.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('document_type.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'mandatory','required' => '1','label'=>__('document_type.mandatory')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('mandatory',['0'=>'No','1'=>'Yes'],null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'mandatory','name'=>'mandatory']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\wamp64\www\permitkhas\resources\views/document_type/create_form.blade.php ENDPATH**/ ?>