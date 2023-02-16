<?php $__env->startComponent('layouts.components.table', ['tname' => 'permission_table']); ?> 
		<?php $__env->slot('options'); ?>
			searching: false, paging: false, sorting: false,
		<?php $__env->endSlot(); ?>

		<?php $__env->slot('thead'); ?>
			<th style='width: 30px;'><?php echo e(__('general.number')); ?></th>
			<th><?php echo e(__('permission_group.name')); ?></th>
			<th><?php echo e(__('permission_group.is_view')); ?></th>
			<th><?php echo e(__('permission_group.is_create')); ?></th>
			<th><?php echo e(__('permission_group.is_edit')); ?></th>
			<th><?php echo e(__('permission_group.is_delete')); ?></th>
		<?php $__env->endSlot(); ?> 

		<?php $__env->slot('tbody'); ?>
			<?php $__currentLoopData = $permissionGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modelPermissionGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td> </td>
				<td><?php echo e($modelPermissionGroup->name); ?></td>
				
					<td>
						<?php if(isset($modelPermissionGroup->is_view)): ?>
							<?php if($modelPermissionGroup->is_view==1): ?>		
								<?php echo Form::checkbox($modelPermissionGroup->prefix."_view",1,isset($modelRoleHasPermission[$modelPermissionGroup->prefix.'_view'])); ?>

							<?php endif; ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($modelPermissionGroup->is_create)): ?>
							<?php if($modelPermissionGroup->is_create==1): ?>
								<?php echo Form::checkbox($modelPermissionGroup->prefix."_create",1,isset($modelRoleHasPermission[$modelPermissionGroup->prefix.'_create'])); ?>

							<?php endif; ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if(isset($modelPermissionGroup->is_edit)): ?>
							<?php if($modelPermissionGroup->is_edit==1): ?>
								<?php echo Form::checkbox($modelPermissionGroup->prefix."_edit",1,isset($modelRoleHasPermission[$modelPermissionGroup->prefix.'_edit'])); ?>

							<?php endif; ?>
						<?php endif; ?>									
					</td>
					<td>
						<?php if(isset($modelPermissionGroup->is_delete)): ?>
							<?php if($modelPermissionGroup->is_delete==1): ?>
								<?php echo Form::checkbox($modelPermissionGroup->prefix."_delete",1,isset($modelRoleHasPermission[$modelPermissionGroup->prefix.'_delete'])); ?>

							<?php endif; ?>
						<?php endif; ?>									
					</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php $__env->endSlot(); ?> <?php $__env->slot('firstScript'); ?>
	"paging": false,
<?php $__env->endSlot(); ?> <?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/role_has_permission/edit_form.blade.php ENDPATH**/ ?>