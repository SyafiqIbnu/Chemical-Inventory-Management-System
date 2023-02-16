<div id="{{ $id }}" class="modal fade" style="display: none;z-index: 1101;">
    <div id="modal_select2" class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['url' => $route, 'enctype' => 'multipart/form-data']) !!}
                <div class="modal-header bg-green"> 
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                        <span aria-hidden="true"> x </span></button>
                    <h4 class="modal-title">{{ $title }}</h4>
                </div>
                <div class="modal-body">
                    <div class='box-body row'>
                        {{ $content }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-reset pull-left" type="button"><i class="fa fa-times-circle"></i> {{__('general.close')}}</button>
                    &nbsp;
                    {!! Form::button('<i class="fa fa-refresh"></i> '.__('general.reset').'',['class'=>'btn btn-warning','type'=>'reset']) !!}
                    {!! Form::button('<i class="fa fa-floppy-o"></i> '.__('general.save').'',['class'=>'btn btn-success','type'=>'submit','id'=>'submitButton']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@push('scriptsDocumentReadyTop')
    @if(isset($urlReturn))
        $(document).on("click", "a[data-modal]", function(f){
            f.preventDefault();
            var urlReturn = $(this).data("urlreturn");
            $("#{{ $id }} form input[name='urlReturn']").attr("value", {{ $urlReturn }}); //id hash, div/form/p tag
        });  
    @endif
@endpush
@push('scriptsDocumentReady')
    $('#{{ $id }} .modal-body .select2').select2({
        dropdownParent: $('#{{ $id }} .modal-body'),
        width: '100%'
    });
    @if(isset($scriptsDocumentReady))
        {{ $scriptsDocumentReady }}
    @endif
@endpush