<div class='form-group col-md-12' {{isset($id) ? 'id='.$id : null}} {{isset($style) ? 'style='.$style : null}}>
    <div class="row">
        <div class='col-md-3'>
            <label for="{{ $for }}">{{ $label }} @if($required == 1)<span class="required"></span>@endif</label>
        </div>
        <div class='col-md-9'>
            {{ $field }}
        </div>
    </div>
</div>