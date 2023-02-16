<div class='form-group col-md-12' {{isset($id) ? 'id='.$id : null}} {{isset($style) ? 'style='.$style : null}}>
    <div class="row">
        <div class='col-md-3'>
            <label for="{{ $for }}">{{ $label }} @if($required == 1)<span class="required"></span>@endif</label>
        </div>
        <div class='col-md-3'>
            {{ $field1 }}
        </div>
        <div class='col-md-3'>
            {{ $field2 }}
        </div>
        <div class='col-md-3'>
            {{ $field3 }}
        </div>
    </div>
</div>