<?php $__env->startSection('page_title'); ?>
View Document
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
View Document

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active">Upload Item Sheet</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <?php $__env->startComponent('layouts.components.crud_card'); ?>
        <?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.chemical')); ?> <?php $__env->endSlot(); ?>
        <?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
        
        <?php $__env->slot('cardBody'); ?>
        <div class="row">
          
            <div class="col-md-6">
                
                <iframe height="600" width="1550" src="uploads/itemsheet/<?php echo e($data->file); ?>"></iframe>
            </div>   
        </div>
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('cardFooter'); ?>
            <a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('chemical')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
            <?php echo Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']); ?> 
            <?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>

            <?php echo Form::close(); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('chemical.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/chemicalgeneral/viewfile.blade.php ENDPATH**/ ?>