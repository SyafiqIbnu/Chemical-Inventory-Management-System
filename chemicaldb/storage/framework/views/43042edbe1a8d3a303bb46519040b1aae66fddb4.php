<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'order_id','required' => '1','label'=>__('order_product.order_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('order_id',$modelOrderProduct->order_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'product_id','required' => '1','label'=>__('order_product.product_id')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('product_id',$modelOrderProduct->product_id,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'quantity','required' => '1','label'=>__('order_product.quantity')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('quantity',$modelOrderProduct->quantity,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'price','required' => '1','label'=>__('order_product.price')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('price',$modelOrderProduct->price,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'amount','required' => '1','label'=>__('order_product.amount')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('amount',$modelOrderProduct->amount,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/order_product/show_form.blade.php ENDPATH**/ ?>