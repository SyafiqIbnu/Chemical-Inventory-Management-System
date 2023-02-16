<?php $__env->startSection('page_title'); ?>
<?php echo e(__('general.edit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_description'); ?>
<?php echo e(__('general.edit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
	<li class="breadcrumb-item"><a href="#"><?php echo e(__('general.home')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('general.edit')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="col-md-12">
	<div class="card card-primary">
	  <div class="card-header">
		<h3 class="card-title"><?php echo e(__('user.title')); ?></h3>
	  </div>
		
	<div class="card-body">
		<div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">User Information</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Tukar Kata Laluan</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <?php echo Form::model($modelUser, ['route' => ['user.update', $modelUser->id],'method'=>'PUT','id'=>'myAppForm']); ?>

					<?php echo $__env->make('user.edit_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('user')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
						<?php echo Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']); ?> 
						<?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>


					<?php echo Form::close(); ?>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <?php echo Form::model($modelUser, ['route' => ['user.updatepwd', $modelUser->id],'method'=>'PUT','id'=>'myAppForm1']); ?>

					
					<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password','required' => '1','label'=>__('user.password')]); ?> 
					<?php $__env->slot('field'); ?>
						<input id="password" type="password" class="form-control" name="password" autofocus="autofocus" placeholder="<?php echo e(__('user.password_placeholder')); ?>" maxlength="16">
					<?php $__env->endSlot(); ?> 
					<?php echo $__env->renderComponent(); ?>


					<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'password_confirm','required' => '1','label'=>__('user.password_confirm')]); ?> 
					<?php $__env->slot('field'); ?>
					<input id="password_confirm" type="password" class="form-control" name="password_confirm" autofocus="autofocus" placeholder="<?php echo e(__('user.password_confirm_placeholder')); ?>" maxlength="16">
					<?php $__env->endSlot(); ?> 
					<?php echo $__env->renderComponent(); ?>

					<a type="button" class="btn btn-danger"	onClick="location.href='<?php echo e(url('user')); ?>'"><i class="fa fa-close"></i> <?php echo e(__('general.cancel')); ?></a>
						<?php echo Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']); ?> 
						<?php echo Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success pull-right','type'=>'submit','id'=>'submitButton']); ?>


					<?php echo Form::close(); ?>

                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.menu_active', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\factohub\resources\views/user/edit.blade.php ENDPATH**/ ?>