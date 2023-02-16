<?php $__env->startSection('page_title'); ?>
<?php echo e(__('general.show')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.show')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('general.show')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
	<?php $__env->startComponent('layouts.components.crud_card'); ?>
		<?php $__env->slot('cardTitle'); ?> <?php echo e(__('general.chemical')); ?> <?php $__env->endSlot(); ?>
		<?php $__env->slot('cardColor'); ?> card-success <?php $__env->endSlot(); ?>
		
		<?php $__env->slot('cardBody'); ?>
			<?php echo Form::model($modelChemical, ['route' => ['chemical.update', $modelChemical->id],'method'=>'PUT','id'=>'chemicalForm']); ?>

				<?php echo $__env->make('chemical.show_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('cardFooter'); ?>
			<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('chemical')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
			<?php echo Form::close(); ?>

		<?php $__env->endSlot(); ?>
	<?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('chemical.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/chemical/show.blade.php ENDPATH**/ ?>