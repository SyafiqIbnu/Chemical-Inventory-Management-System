<div class='form-group col-md-6'>
    <div class="row">
        <div class='col-md-4'>
            <label for="{{ $for }}">{{ $label }} @if($required == 1)<span class="required"></span>@endif</label>
        </div>
        <div class='col-md-8'>
            {{ $field }}
        </div>
    </div>
</div>