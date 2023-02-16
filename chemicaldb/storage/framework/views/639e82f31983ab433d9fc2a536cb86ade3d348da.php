<?php $__env->startSection('page_title'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active">Permohonan Permit #<?php echo e($permit_application_id); ?></li>
    <li class="breadcrumb-item active"><?php echo e($title); ?></li>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<?php $__env->startComponent('shared.permit_application_tabs',['permit_application_id'=>$permit_application_id,
    'modelPermitApplication'=>$modelPermitApplication,'canEdit'=>$canEdit]); ?>
            <?php $__env->slot('selectedTab'); ?>
                document
            <?php $__env->endSlot(); ?>

            <?php $__env->slot('content'); ?>

            
            
            
            <?php $__env->startPush('modals'); ?>
                <?php if(\App\Helpers\PermissionHelper::hasPermitApplicationDocumentDelete(false)): ?>
                    <?php echo $__env->make('layouts.components.modal_delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php $__env->stopPush(); ?>

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
                                    <th width="50%">Nama Dokumen</th>
                                    <th>Mandatori</th>
                                    <th>Bil. Dimuatnaik</th>
                                    <th width="20%">Lihat Fail</th>
                                    <th>Muatnaik</th>
                                </tr>
                            </thead>
                            <?php $bil=0; ?>
                            <?php $__currentLoopData = $document_checklist_id_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $bil++; ?>
                            <tr>
                                <td><?php echo e($bil); ?></td>
                                <td><?php echo e($docList->getDocumentType->name); ?></td>
                                <td><?php if($docList->getDocumentType->mandatory==1): ?>Ya <?php else: ?> Tidak <?php endif; ?></td>
                                <td><?php echo e($docList->docCount); ?></td>
                                <td>
                                <?php $__currentLoopData = $docList->uploadedDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a target='_blank' title='Papar' type='button' class='btn btn-xs btn-info' 
                                href="<?php echo asset('storage/'.$doc->original_name); ?>"><i class='fa fa-file'></i></a>
                                <a title='Padam' data-modal data-route="<?php echo route('permit_application_document.destroy',[$doc->getKey()]); ?>"
                                    data-toggle='modal' data-target='#modal-delete' 
                                    type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
                                </a>
                                </br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                
                                    <?php echo Form::open(['route'=>'permit_application_document.store','id'=>'myAppForm','enctype'=>'multipart/form-data']); ?>

                                    <?php echo Form::file('Pilih Fail', ['class' => 'btn btn-primary','name'=>'filepath']); ?>

                                    <?php echo Form::hidden('document_types_id',$docList->document_type_id); ?>

                                    <?php echo Form::hidden('permit_application_id',$permit_application_id); ?>

                                    <?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.upload').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

                                    <?php echo Form::close(); ?>

                                </td>
                                
                            </tr>
                            

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                    
                <?php $__env->endSlot(); ?>

                

                <?php $__env->slot('cardFooter'); ?>
                    
                <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
<!--
        <?php $__env->startComponent('layouts.components.crud_card'); ?>
                <?php $__env->slot('cardTitle'); ?> <?php echo e(__('Muatnaik Dokumen')); ?> <?php $__env->endSlot(); ?>
                <?php $__env->slot('cardColor'); ?> card-warning <?php $__env->endSlot(); ?>
                <?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
                <?php $__env->slot('borderColor'); ?> border-warning <?php $__env->endSlot(); ?>
                <?php $__env->slot('cardBody'); ?>
                    <?php echo Form::open(['route'=>'permit_application_document.store','id'=>'myAppForm','enctype'=>'multipart/form-data']); ?>

                    
                    <?php echo $__env->make('permit_application_document.create_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.upload').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

                    <?php echo Form::close(); ?>

                <?php $__env->endSlot(); ?>
                <?php $__env->slot('cardFooter'); ?>
                    
                <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>

        <?php $__env->startComponent('layouts.components.crud_card'); ?>
                <?php $__env->slot('cardTitle'); ?> <?php echo e(__('Senarai Dokumen')); ?> <?php $__env->endSlot(); ?>
                <?php $__env->slot('cardColor'); ?> card-warning <?php $__env->endSlot(); ?>
                <?php $__env->slot('collapsible'); ?> false <?php $__env->endSlot(); ?>
                <?php $__env->slot('borderColor'); ?> border-warning <?php $__env->endSlot(); ?>

                <?php $__env->slot('cardBody'); ?>
                            <div class="col-md-12 table-responsive" style="border: none;">
                        <?php $__env->startComponent('layouts.components.table_ajax', ['route'=>'permit_application_document','tname' => 'permit_application_document_table_ajax','bgColor'=>'bg-red']); ?> 

                        <?php $__env->slot('url'); ?>
                        <?php echo e(route('permit_application_document.indexAjax',$permit_application_id)); ?>

                        <?php $__env->endSlot(); ?> 
                        <?php $__env->slot('thead'); ?>
                            <th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
                                        <th><?php echo e(__('permit_application_document.name')); ?></th>
                                        <th><?php echo e(__('permit_application_document.document_types_id')); ?></th>
                                        <th><?php echo e(__('permit_application_document.original_name')); ?></th>
                                        <th><?php echo e(__('permit_application_document.uploaded_at')); ?></th>
                                        <th><?php echo e(__('permit_application_document.active')); ?></th>
                                        <th style="width:80px;"><?php echo e(__('general.action')); ?></th>
                        <?php $__env->endSlot(); ?> 

                        <?php $__env->slot('tbody'); ?>
                            <?php echo $__env->make('layouts.components.datatable_data_card_render_number',['table_name'=>'permit_application_document_table_ajax'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_document_table_ajax','name'=>'name','title'=>__('permit_application_document.name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_document_table_ajax','name'=>'document_types_id','title'=>__('permit_application_document.document_types_id')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_document_table_ajax','name'=>'original_name','title'=>__('permit_application_document.original_name')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_document_table_ajax','name'=>'created_at','title'=>__('permit_application_document.uploaded_at')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                                    
                                                    <?php echo $__env->make('layouts.components.datatable_data_card_render', ['table_name'=>'permit_application_document_table_ajax','name'=>'active','title'=>__('permit_application_document.active')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                                        <?php echo $__env->make('layouts.components.datatable_data_card_render_action', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>,
                        <?php $__env->endSlot(); ?> 

                        <?php $__env->slot('filter_parameter'); ?>
                            //dt.f_start_date = $('input[name=f_start_date]').val();
                            //dt.f_end_date = $('input[name=f_end_date]').val();
                        <?php $__env->endSlot(); ?> 

                    <?php echo $__env->renderComponent(); ?>
                    </div>

                <?php $__env->endSlot(); ?>
                <?php $__env->slot('cardFooter'); ?>
                    
                <?php $__env->endSlot(); ?>

        <?php echo $__env->renderComponent(); ?>
-->
        
        <?php echo $__env->make('permit_application.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->endSlot(); ?> 
    <?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\permitkhas\resources\views/permit_application_document/index.blade.php ENDPATH**/ ?>