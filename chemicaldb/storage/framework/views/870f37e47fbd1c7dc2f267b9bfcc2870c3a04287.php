<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('faculty.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('faculty.name_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/faculty/create_form.blade.php ENDPATH**/ ?>