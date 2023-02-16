

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'company_name','required' => '1','label'=>__('Nama Syarikat')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('company_name',null,['class'=>'form-control','required','placeholder'=>__('Nama Syarikat'),'maxlength'=>255]); ?>

<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<div class='form-group col-md-12' <?php echo e(isset($id) ? 'id='.$id : null); ?> <?php echo e(isset($style) ? 'style='.$style : null); ?>>
    <div class="row">
	
	
        <div class='col-md-3'>
			<label><input checked=true type="radio" value="1" onchange="handleChange1();" name="myRadios"></label>
            <label for="registration_no">No Pend. Syarikat</label>
        </div>
        <div class='col-md-2'>
			<?php echo Form::text('registration_no_1',null,['class'=>'form-control','required','maxlength'=>10,'id'=>'registration_no_1']); ?>

        </div> -
		<div class='col-md-1'>
			<?php echo Form::text('registration_no_2',null,['class'=>'form-control','required','maxlength'=>1,'id'=>'registration_no_2']); ?>

        </div>
		
		<div class='col-md-2'>
		<label><input type="radio" value="2" onchange="handleChange2();" name="myRadios"></label>
            <label for="registration_no">No PBT</label>
        </div>
        <div class='col-md-2'>
			<?php echo Form::text('pbt_no',null,['class'=>'form-control','required','maxlength'=>10,'id'=>'pbt_no','disabled'=>'true']); ?>

        </div> 
		
    </div>
</div>



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

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('Email')]); ?> 
<?php $__env->slot('field'); ?>
	<?php echo Form::text('email',null,['class'=>'form-control','required','placeholder'=>__('Email'),'maxlength'=>255]); ?>

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

<script>

    function myfunction(event) {
		if(event.target.value==1){
			document.getElementById("pbt_no").disabled = true;
			document.getElementById("pbt_no").value='';
			document.getElementById("registration_no_1").disabled = false;
			document.getElementById("registration_no_2").disabled = false;
		}else{
			document.getElementById("registration_no_1").disabled = true;
			document.getElementById("registration_no_2").disabled = true;
			document.getElementById("registration_no_1").value='';
			document.getElementById("registration_no_2").value='';
			document.getElementById("pbt_no").disabled = false;
		}
        //alert('Checked radio with ID = ' + event.target.value);
    }
    document.querySelectorAll("input[name='myRadios']").forEach((input) => {
        input.addEventListener('change', myfunction);
    });
</script>

<?php /**PATH C:\wamp64\www\permitkhas\resources\views/account_application/create_form.blade.php ENDPATH**/ ?>