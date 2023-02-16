<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'bank_name','required' => '1','label'=>__('user_bankaccount.bank_name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('bank_name',$modelUserBankaccount->bank_name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'account_name','required' => '1','label'=>__('user_bankaccount.account_name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('account_name',$modelUserBankaccount->account_name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'account_no','required' => '1','label'=>__('user_bankaccount.account_no')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('account_no',$modelUserBankaccount->account_no,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('user_bankaccount.active')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('active',$modelUserBankaccount->active,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/user_bankaccount/show_form.blade.php ENDPATH**/ ?>