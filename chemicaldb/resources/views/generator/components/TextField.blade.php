<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		  <label for="{{$col->COLUMN_NAME}}">__('{{$table}}.{{$col->COLUMN_NAME}}')</label>
			<input id="{{$col->COLUMN_NAME}}" type="text" class="form-control" name="{{$col->COLUMN_NAME}}" maxlength="255" required>
		    @#if (\$errors->has('{{$col->COLUMN_NAME}}'))<span class="help-block"><strong>\{\{ \$errors->first('{{$col->COLUMN_NAME}}') \}\}</strong></span>@#endif
		</div>
	</div>
</div>
