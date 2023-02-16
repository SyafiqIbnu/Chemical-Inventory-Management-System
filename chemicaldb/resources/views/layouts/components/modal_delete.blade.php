<div id="modal-delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['url' => '','method' => 'delete']) !!}
				<div class="modal-header bg-red">
				  <h4 class="modal-title">{{__('general.confirmation')}}</h4>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
                <div class="modal-body">
                    <p>{{__('general.confirm_delete')}}</p>
                    @php
                    	//dd($urlReturn);
                    @endphp
	
                    @if(isset($urlReturn))
                    	{!! Form::hidden('urlReturn',$urlReturn) !!}
                    @else
                    	{!! Form::hidden('urlReturn','') !!}
                    @endif
                </div>
                <div class="modal-footer justify-content-between">
                    <button data-dismiss="modal" class="btn btn-danger pull-left" type="button">{{__('general.close')}}</button>
                    <button class="btn btn-success" type="submit">{{__('general.proceed')}}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).on("click", "a[data-modal]", function(e){
            e.preventDefault();
            var route = $(this).data("route");
            $("#modal-delete form").attr("action", route); //id hash, div/form/p tag
            var urlReturn = $(this).data("urlreturn");
            $("#modal-delete form input[name='urlReturn']").attr("value", urlReturn); //id hash, div/form/p tag
        });  
    </script>
@endpush
