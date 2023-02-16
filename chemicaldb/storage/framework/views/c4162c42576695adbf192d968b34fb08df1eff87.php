<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('actitivy_type.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('actitivy_type.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\wamp64\www\permitkhas\resources\views/actitivy_type/create_form.blade.php ENDPATH**/ ?>