<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('cargo_type.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('cargo_type.name_placeholder'),'maxlength'=>30]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php /**PATH D:\xampp\htdocs\zonkargo\resources\views/cargo_type/create_form.blade.php ENDPATH**/ ?>