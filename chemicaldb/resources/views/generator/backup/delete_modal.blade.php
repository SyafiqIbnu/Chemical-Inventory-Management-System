<div id="modal-default" class="modal fade " style="display: none;">
  <div class="modal-dialog">
	<div class="modal-content">
	 /{!! Form::open(['route'=>['{{$name}}.destroy','none'],'id'=>'deleteForm','']) !!/}
	 /{/{ method_field('DELETE') /}/}
	  <div class="modal-header bg-red">
		<button aria-label="Close" data-dismiss="modal" class="close" type="button">
		  <span aria-hidden="true"> x </span></button>
		<h4 class="modal-title">{{__('general.delete_confirm')}}</h4>
	  </div>
	  <div class="modal-body">
		<p>{{__('general.delete_confirm_record')}}</p>
	  </div>
	  <div class="modal-footer">
		<button data-dismiss="modal" class="btn btn-default pull-left" type="button">{{__('general.close')}}</button>
		<button class="btn btn-danger" type="submit">{{ucfirst(__('general.delete'))}}</button>
	  </div>
	  /{!! Form::close() !!/}
	</div>
	<!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>