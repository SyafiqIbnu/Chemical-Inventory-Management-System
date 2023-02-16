


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('Nama Pemohon')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('Nama Pemohon'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'mobile_no','required' => '1','label'=>__('No Telefon (H/P)')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('mobile_no',null,['class'=>'form-control','required','placeholder'=>__('No Telefon (H/P)'),'maxlength'=>12]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'icno','required' => '1','label'=>__('No Kad Pengenalan')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('icno',null,['class'=>'form-control','required','placeholder'=>__('No Kad Pengenalan'),'maxlength'=>12]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('Email')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('email',null,['class'=>'form-control','required','placeholder'=>__('Email'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fax_no','required' => '1','label'=>__('No Fax')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('fax_no',null,['class'=>'form-control','placeholder'=>__('No Fax'),'maxlength'=>12]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'address1','required' => '1','label'=>__('Alamat 1')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('address1',null,['class'=>'form-control','required','placeholder'=>__('Alamat 1'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'address2','required' => '1','label'=>__('Alamat 2')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('address2',null,['class'=>'form-control','placeholder'=>__('Alamat 2'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'postcode','required' => '1','label'=>__('Poskod')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('postcode',null,['class'=>'form-control','required','placeholder'=>__('Poskod'),'maxlength'=>5]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('Negeri')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('state_id',$state_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'state_id','name'=>'state_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'city_id','required' => '1','label'=>__('Bandar')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('city_id',$city_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'city_id','name'=>'city_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'notes','required' => '1','label'=>__('Catatan')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::textArea('notes',null,['rows'=>'5','class'=>'form-control','placeholder'=>__('Catatan'),'maxlength'=>65535]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>





	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]); ?> 
	<?php $__env->slot('field'); ?>
		<input id="password" type="password" class="form-control" name="password" required  placeholder="<?php echo e(__('user.password_placeholder')); ?>" maxlength="16">
	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>


	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password_confirm','required' => '1','label'=>__('user.password_confirm')]); ?> 
	<?php $__env->slot('field'); ?>
	<input id="password_confirm" type="password" class="form-control" name="password_confirm" required  placeholder="<?php echo e(__('user.password_confirm_placeholder')); ?>" maxlength="16">
	<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>





<?php /**PATH C:\wamp64\www\permitkhas\resources\views/account_application_individu/create_form.blade.php ENDPATH**/ ?>