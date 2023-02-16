<?php $__env->startComponent('layouts.components.crud_card',['showMessage'=>false]); ?>
    <?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_info')); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
    <?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
    <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
        
    <?php $__env->slot('cardBody'); ?>
        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'activitiy_type_id','required' => '1','label'=>__('Aktiviti')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('activitiy_type_id',$activitiy_type_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'activitiy_type_id','name'=>'activitiy_type_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'permit_start_date','required' => '1','label'=>__('Tarikh Mula Permit')]); ?> 
        <?php $__env->slot('field'); ?>
                <?php echo Form::text('permit_start_date',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'permit_start_date','data-target'=>'#permit_start_date','required','placeholder'=>__('Tarikh Mula Permit')]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'permit_end_date','required' => '1','label'=>__('Tarikh Tamat Permit')]); ?> 
        <?php $__env->slot('field'); ?>
                <?php echo Form::text('permit_end_date',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'permit_end_date','data-target'=>'#permit_end_date','required','placeholder'=>__('Tarikh Tamat Permit')]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'purchase_purpose','required' => '1','label'=>__('Tujuan Permit')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::textArea('purchase_purpose',null,['rows'=>'5','class'=>'form-control','required','placeholder'=>__('Tujuan Permit'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('cardFooter'); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scriptsDocumentReadyBottom'); ?>

    
        $('.permit_start_date').change(function() {
        var date2 = $('.permit_start_date').datepicker('getDate', '+1d'); 
        date2.setDate(date2.getDate()+1); 
        $('.permit_end_date').datepicker('setDate', date2);
        });
        $('permit_end_date').val(date2);
    
<?php $__env->stopPush(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application/create_form_permit_info.blade.php ENDPATH**/ ?>