@php $id='modal-proceed'; @endphp
<div id="{{ $id }}" class="modal fade" style="display: none;z-index: 1101;">
    <div class="modal-dialog">
        <div class="modal-content">
            
            {!! Form::open(['url' => '','method' => 'POST']) !!}
            <div class="modal-header bg-yellow">                                
                <h4 class="modal-title">{{__('general.confirmation')}}</h4>
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">     
                <span aria-hidden="true"> x </span></button>
            </div>
            <div class="modal-body">
                <p><span class="modal-message"><br>{{__('general.confirm_submit')}}</p></span>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-danger pull-left" type="button">{{__('general.cancel')}}</button>
                {!! Form::hidden('urlReturn','') !!}
                {!! Form::button('<i class="fa fa-send"></i> '.__('general.submit').'',['class'=>'btn btn-success','type'=>'submit','id'=>'submitButton']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).on("click", "a[data-{{ $id }}]", function(e){
            e.preventDefault();
            var route = $(this).data("route");
            $("#{{ $id }} form").attr("action", route); //id hash, div/form/p tag
            var urlReturn = $(this).data("urlreturn");
            $("#{{ $id }} form input[name='urlReturn']").attr("value", urlReturn); //id hash, div/form/p tag
            
            var message = $(this).data("message");
            if(message !=null){
                var modalMessage = $("#{{ $id }}").find(".modal-message");
                modalMessage.html(message);
            }

            var title = $(this).data("title");
            if(title !=null){
                var modalTitle = $("#{{ $id }}").find(".modal-title");
                modalTitle.html(title);
            }

        });  
    </script>
@endpush