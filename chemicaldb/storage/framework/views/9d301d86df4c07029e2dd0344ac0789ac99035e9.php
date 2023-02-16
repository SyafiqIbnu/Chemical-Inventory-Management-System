<?php echo $__env->make('layouts.components.modal_proceed',['id'=>'modal_enable_tfa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'use2fa','required' => '1','label'=>__('general.use2fa')]); ?> 
	<?php $__env->slot('field'); ?>
		<?php
			$tfaStatus=$userModel->use2fa ? __('general.enabled'):__('general.disabled');
			$tfaBadge=$userModel->use2fa ? "badge-success": "badge-danger";
			$tfaButtonText=$userModel->use2fa ? __('tfa.disable'):__('tfa.enable');
			$tfaButtonClass=$userModel->use2fa ? 'btn-danger':'btn-success';
			$tfaButtonRegenText=$userModel->use2fa ? __('general.regenerate-tfa-key'): '' ;
			$tfaShowQrCode=$userModel->use2fa ? true : false;
		?>
		<span class="badge <?php echo e($tfaBadge); ?>"><?php echo e($tfaStatus); ?></span>		
	<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'use2fa','required' => '1','label'=>'']); ?> 
	<?php $__env->slot('field'); ?>
		<a data-modal_enable_tfa data-toggle="modal" data-message="Teruskan?" data-title="<?php echo e($tfaButtonText); ?> TFA" data-target="#modal_enable_tfa" data-route="<?php echo e(url('/tfa/toggle_tfa')); ?>"><button type="button" class="btn <?php echo e($tfaButtonClass); ?>">
		  <?php echo e($tfaButtonText); ?>

		</button>
		</a>
	<?php $__env->endSlot(); ?> 
<?php echo $__env->renderComponent(); ?>

<?php if($tfaShowQrCode): ?>
	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'use2fa','required' => '1','label'=>__('general.qrcode')]); ?> 
		<?php $__env->slot('field'); ?>
			<?php echo $qrCode; ?>

			<br>
			Gunakan perisian Google Authenticator / Microsoft Authenticator<br>
			Scan Qr Code di atas. Gunakan TAC yang dijana sebagai kod TFA.
		<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

	<?php $__env->startComponent('layouts.components.edit_modal_one_column',['for' => 'use2fa','required' => '1','label'=>__('general.regenerate-tfa-key')]); ?> 
		<?php $__env->slot('field'); ?>
			Jika kod QR TFA anda telah terdedah, sila jana semula kekunci kod QR FTA anda.<br>
			Anda perlu masukkan kod yang baru pada perisian Google Authenticator / Microsoft Authenticator<br><br>
			<a data-modal_enable_tfa data-toggle="modal" data-message="Teruskan?" data-title="<?php echo e($tfaButtonRegenText); ?>" data-target="#modal_enable_tfa" data-route="<?php echo e(url('/tfa/regen_tfa')); ?>"><button type="button" class="btn btn-primary">
			  <?php echo e($tfaButtonRegenText); ?>

			</button>
			</a>
		<?php $__env->endSlot(); ?> 
	<?php echo $__env->renderComponent(); ?>

<?php endif; ?>
<?php /**PATH C:\wamp64\www\permitkhas\resources\views/tfa/show_form.blade.php ENDPATH**/ ?>