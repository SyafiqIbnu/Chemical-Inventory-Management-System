<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('city.code')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('city.code_placeholder'),'maxlength'=>30]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('city.name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('city.name_placeholder'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('city.state_id')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('state_id',$state_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'state_id','name'=>'state_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'isactive','required' => '1','label'=>__('city.isactive')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('isactive',['1'=>__('general.active'),'2'=>__('general.inactive')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'isactive','name'=>'isactive']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\wamp64\www\permitkhas\resources\views/city/create_form.blade.php ENDPATH**/ ?>