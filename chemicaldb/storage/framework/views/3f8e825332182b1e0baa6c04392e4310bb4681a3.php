
<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'company_name','required' => '1','label'=>__('Nama Agensi')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('company_name',null,['class'=>'form-control','required','placeholder'=>__('Nama Agensi'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'agency_dept_id','required' => '1','label'=>__('Jabatan Agensi')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('agency_dept_id',$agency_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'agency_dept_id','name'=>'agency_dept_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>


<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'agency_type_id','required' => '1','label'=>__('Jenis Agensi')]); ?> 
<?php $__env->slot('field'); ?>
    <?php echo Form::select('agency_type_id',$agency_type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'agency_type_id','name'=>'agency_type_id']); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone_no','required' => '1','label'=>__('No. Telefon')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('phone_no',null,['class'=>'form-control','required','placeholder'=>__('No Telefon'),'maxlength'=>12]); ?>

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



<?php /**PATH C:\wamp64\www\permitkhas\resources\views/account_application_agency/create_form.blade.php ENDPATH**/ ?>