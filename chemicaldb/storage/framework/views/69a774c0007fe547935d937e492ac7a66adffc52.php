<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('nasiarab.name')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('name',$modelNasiarab->name,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'price','required' => '1','label'=>__('nasiarab.price')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('price',$modelNasiarab->price,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'description','required' => '1','label'=>__('nasiarab.description')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('description',$modelNasiarab->description,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'image','required' => '1','label'=>__('nasiarab.image')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('image',$modelNasiarab->image,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'is_addon','required' => '1','label'=>__('nasiarab.is_addon')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php echo Form::text('is_addon',$modelNasiarab->is_addon,['class'=>'form-control','required','readonly'=>'readonly']); ?>

	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/nasiarab/show_form.blade.php ENDPATH**/ ?>