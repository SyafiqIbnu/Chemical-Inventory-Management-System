<div id="{{ $id }}" class="modal fade" style="display: none;z-index: 1101;">
    <div id="modal_select2" class="modal-dialog">
        <div class="modal-content">
                {{ $route }}
                <div class="modal-header bg-aqua"> 
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                        <span aria-hidden="true"> x </span></button>
                    <h4 class="modal-title">{{ $title }}</h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
                        {{ $content }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default pull-left" type="button">Close</button>
                    &nbsp;
					@if(isset($button))
						{{ $button }}
					@else
						{!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-reset','type'=>'reset']) !!}
						{!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success','type'=>'submit','id'=>'submitButton']) !!}
					@endif
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#{{ $id }} .modal-body .select2').select2({
                dropdownParent: $('#{{ $id }} .modal-body'),
                width: '100%'
            });
        });
    </script>
@endpush