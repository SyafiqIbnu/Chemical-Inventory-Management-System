<?php $__env->startComponent('layouts.components.crud_card'); ?>
    <?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.applicant_info')); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
    <?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
    <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
    
    <?php $__env->slot('cardBody'); ?>
    
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'registration_no','required' => '0','label'=>__('No Pendaftaran Syarikat')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('registration_no',$accountHolder->registration_no ?? null,['class'=>'form-control','placeholder'=>__('No Pendaftaran Syarikat'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'pbt_no','required' => '0','label'=>__('No PBT')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('pbt_no',$accountHolder->pbt_no ?? null,['class'=>'form-control','placeholder'=>__('No PBT'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'company_name','required' => '1','label'=>__('Nama Syarikat/Agensi/Individu')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('company_name',$accountHolder->name,['class'=>'form-control','required','placeholder'=>__('Nama Syarikat/Agensi'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'applicant_category_id','required' => '1','label'=>__('Kategori Pemohon')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('applicant_category_id',$applicant_category_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'applicant_category_id','name'=>'applicant_category_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'address1','required' => '1','label'=>__('Alamat 1')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('address1',$accountHolder->address1,['class'=>'form-control','required','placeholder'=>__('Alamat 2'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'address2','required' => '1','label'=>__('Alamat 2')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('address2',$accountHolder->address2,['class'=>'form-control','required','placeholder'=>__('Alamat 2'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'postcode','required' => '1','label'=>__('Poskod')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('postcode',$accountHolder->postcode,['class'=>'form-control','required','placeholder'=>__('Poskod'),'maxlength'=>5]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('Negeri')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('state_id',$state_id_list,$accountHolder->state_id,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'state_id','name'=>'state_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
        
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'city_id','required' => '1','label'=>__('Bandar')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('city_id',$city_id_list,$accountHolder->city_id,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'city_id','name'=>'city_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'district_id','required' => '1','label'=>__('Daerah')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('district_id',$district_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'district_id','name'=>'district_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?> 

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'phone_no','required' => '1','label'=>__('No Telefon')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('phone_no',$accountHolder->phone_no,['class'=>'form-control','required','placeholder'=>__('No Telefon'),'maxlength'=>30]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fax_no','required' => '1','label'=>__('No Fax')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('fax_no',$accountHolder->fax_no,['class'=>'form-control','required','placeholder'=>__('No Fax'),'maxlength'=>30]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'mobile_no','required' => '1','label'=>__('No Telefon (Mobil)')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('mobile_no',$accountHolder->mobile_no,['class'=>'form-control','required','placeholder'=>__('No Telefon (Mobil)'),'maxlength'=>30]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('Email')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('email',$accountHolder->email,['class'=>'form-control','required','placeholder'=>__('Email'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('cardFooter'); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/create_form_applicant_info.blade.php ENDPATH**/ ?>