<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		  <label for="<?php echo e($col->COLUMN_NAME); ?>">__('<?php echo e($table); ?>.<?php echo e($col->COLUMN_NAME); ?>')</label>
			<input id="<?php echo e($col->COLUMN_NAME); ?>" type="text" class="form-control" name="<?php echo e($col->COLUMN_NAME); ?>" maxlength="255" required>
		    @#if (\$errors->has('<?php echo e($col->COLUMN_NAME); ?>'))<span class="help-block"><strong>\{\{ \$errors->first('<?php echo e($col->COLUMN_NAME); ?>') \}\}</strong></span>@#endif
		</div>
	</div>
</div>
<?php /**PATH C:\wamp64\www\permitkhas\resources\views/generator/components/TextField.blade.php ENDPATH**/ ?>