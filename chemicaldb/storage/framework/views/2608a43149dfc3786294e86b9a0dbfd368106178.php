<?php $__env->startComponent('layouts.components.crud_card'); ?>
    <?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_activity_place')); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('cardColor'); ?> card-danger <?php $__env->endSlot(); ?>
    <?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
    <?php $__env->slot('borderColor'); ?> border-danger <?php $__env->endSlot(); ?>
    
    <?php $__env->slot('cardBody'); ?>

        <?php echo Form::hidden('permit_application_id',$permit_application_id); ?>


        <?php echo Form::hidden('permit_application_type_id',null); ?>


        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'activity_state_id','required' => '1','label'=>__('permit_application_activity.activity_state_id')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('activity_state_id',$activity_state_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'activity_state_id','name'=>'activity_state_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'activity_address','required' => '1','label'=>__('permit_application_activity.activity_address')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::textArea('activity_address',null,['rows'=>'5','class'=>'form-control','required','placeholder'=>__('permit_application_activity.activity_address_placeholder'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
    
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('cardFooter'); ?>
    <?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.crud_card'); ?>
    <?php $__env->slot('cardTitle'); ?> <?php echo e(__('Checklist Dokumen')); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('cardColor'); ?> card-warning <?php $__env->endSlot(); ?>
    <?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
    <?php $__env->slot('borderColor'); ?> border-warning <?php $__env->endSlot(); ?>
    
    <?php $__env->slot('cardBody'); ?>
        <div class="table-responsive">

            <table class="table table-bordered table-hover">
                <thead bgcolor="#E8EBE8">
                    <tr>
                        <th>No</th>
                        <th width="70%">Nama Dokumen</th>
                        <th>Mandatori</th>
                        <th>Bilangan Dimuatnaik</th>
                    </tr>
                </thead>
                <?php $bil=0; ?>
                <?php $__currentLoopData = $document_types_id_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $bil++; ?>
                <tr>
                    <td><?php echo e($bil); ?></td>
                    <td><?php echo e($docList->getDocumentType->name); ?></td>
                    <td><?php echo e($docList->getDocumentType->mandatory); ?></td>
                    <td><?php echo e($docList->docCount); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('cardFooter'); ?>
        <?php if($notCompleted): ?> SILA MUATNAIK SEMUA DOKUMEN MANDATORI SEBELUM HANTAR PERMOHONAN <?php endif; ?> 
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('layouts.components.crud_card'); ?>
    <?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_issue_branch')); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
    <?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
    <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
    
    <?php $__env->slot('cardBody'); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'branch_id','required' => '1','label'=>__('permit_application_activity.branch_id')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('branch_id',$branch_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'branch_id','name'=>'branch_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>
    
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('cardFooter'); ?>
    <?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.crud_card'); ?>
    <?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.permit_fuelstation')); ?> <?php $__env->endSlot(); ?>
    <?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
    <?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
    <?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
    
    <?php $__env->slot('cardBody'); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'oilco_id','required' => '1','label'=>__('permit_application_activity.oilco_id')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('oilco_id',$oilco_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'oilco_id','name'=>'oilco_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_state_id','required' => '1','label'=>__('permit_application_activity.fuelstation_state_id')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('fuelstation_state_id',$fuelstation_state_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'fuelstation_state_id','name'=>'fuelstation_state_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_city_id','required' => '1','label'=>__('permit_application_activity.fuelstation_city_id')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::select('fuelstation_city_id',$fuelstation_city_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'fuelstation_city_id','name'=>'fuelstation_city_id']); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_name','required' => '1','label'=>__('permit_application_activity.fuelstation_name')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('fuelstation_name',null,['class'=>'form-control','required','placeholder'=>__('permit_application_activity.fuelstation_name_placeholder'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'fuelstation_address','required' => '1','label'=>__('permit_application_activity.fuelstation_address')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::textArea('fuelstation_address',null,['rows'=>'5','class'=>'form-control','required','placeholder'=>__('permit_application_activity.fuelstation_address_placeholder'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('cardFooter'); ?>
    <?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.crud_card'); ?>
<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.applicant_info')); ?> <?php $__env->endSlot(); ?>
<?php $__env->slot('cardColor'); ?> card-info <?php $__env->endSlot(); ?>
<?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
<?php $__env->slot('borderColor'); ?> border-primary <?php $__env->endSlot(); ?>
    

    <?php $__env->slot('cardBody'); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'certifier_name','required' => '1','label'=>__('permit_application_activity.certifier_name')]); ?> 
        <?php $__env->slot('field'); ?>

            <?php echo Form::text('certifier_name',$user->name,['class'=>'form-control','required','placeholder'=>__('permit_application_activity.certifier_name_placeholder'),'maxlength'=>255]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'certifier_mykad','required' => '1','label'=>__('permit_application_activity.certifier_mykad')]); ?> 
        <?php $__env->slot('field'); ?>
            <?php echo Form::text('certifier_mykad',$user->mykad,['class'=>'form-control','required','placeholder'=>__('permit_application_activity.certifier_mykad_placeholder'),'maxlength'=>30]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'application_date','required' => '1','label'=>__('permit_application_activity.application_date')]); ?> 
        <?php $__env->slot('field'); ?>
                <?php echo Form::text('application_date',$datenow,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'application_date','data-target'=>'#application_date','required','placeholder'=>__('permit_application_activity.application_date_placeholder')]); ?>

        <?php $__env->endSlot(); ?> 
        <?php echo $__env->renderComponent(); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('cardFooter'); ?>
    <?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_activity/create_form.blade.php ENDPATH**/ ?>