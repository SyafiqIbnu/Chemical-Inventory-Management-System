<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'date_buka','required' => '1','label'=>__('coba.date_buka')]); ?> 
<?php $__env->slot('field'); ?>
		<?php echo Form::text('date_buka',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'date_buka','data-target'=>'#date_buka','required','placeholder'=>__('coba.date_buka_placeholder')]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/coba/create_form.blade.php ENDPATH**/ ?>