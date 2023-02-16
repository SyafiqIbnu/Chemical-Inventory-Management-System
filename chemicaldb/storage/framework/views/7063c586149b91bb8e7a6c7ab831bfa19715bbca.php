<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'faculty','required' => '1','label'=>__('laboratory.faculty')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('faculty',$faculty_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'faculty','name'=>'faculty']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'type','required' => '1','label'=>__('laboratory.type')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('type',$type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'type','name'=>'type']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/report/report_filter.blade.php ENDPATH**/ ?>