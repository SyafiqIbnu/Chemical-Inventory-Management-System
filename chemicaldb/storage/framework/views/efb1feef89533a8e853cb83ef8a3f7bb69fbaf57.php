<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('laboratory.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('laboratory.name_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'location','required' => '1','label'=>__('laboratory.location')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('location',null,['class'=>'form-control','required','placeholder'=>__('laboratory.location_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('laboratory.code')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('laboratory.code_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'faculty','required' => '1','label'=>__('laboratory.faculty')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('faculty',$faculty_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'faculty','name'=>'faculty']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'type','required' => '1','label'=>__('laboratory.type')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('type',$type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'type','name'=>'type']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/laboratory/create_form.blade.php ENDPATH**/ ?>