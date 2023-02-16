<div id="{{ $id }}" class="modal fade" style="display: none;z-index: 1101;">
    <div id="modal_select2" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-aqua">
                <button aria-label="Close" data-dismiss="modal" class="close" type="button">
                    <span aria-hidden="true"> x </span></button>
                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scriptsDocumentReadyTop')
    $(document).on("click", "a[data-modal]", function(e){
        e.preventDefault();
        var route = $(this).data("route");
        $("#{{ $id }} form").attr("action", route); //id hash, div/form/p tag
        @if(isset($script))
            {{ $script }}
        @endif
    });
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