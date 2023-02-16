<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'bank_name','required' => '1','label'=>__('user_bankaccount.bank_name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('bank_name',null,['class'=>'form-control','required','placeholder'=>__('user_bankaccount.bank_name_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'account_name','required' => '1','label'=>__('user_bankaccount.account_name')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('account_name',null,['class'=>'form-control','required','placeholder'=>__('user_bankaccount.account_name_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'account_no','required' => '1','label'=>__('user_bankaccount.account_no')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('account_no',null,['class'=>'form-control','required','placeholder'=>__('user_bankaccount.account_no_placeholder'),'maxlength'=>254]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('user_bankaccount.active')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('active',['1'=>__('general.yes'),'2'=>__('general.no')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/user_bankaccount/create_form.blade.php ENDPATH**/ ?>