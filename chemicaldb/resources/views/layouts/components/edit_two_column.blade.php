<div class='col-md-6 form-group'>
    <div class="row">
        <div class='col-md-3'>
            <label for="@if(isset($for)){{ $for }}@endif">@if(isset($label)){{ $label }}@endif @if($required == 1)<span class="required"></span>@endif</label>
        </div>
        <div class='col-md-9'>
            @if(isset($field)){{ $field }}@endif
        </div>
    </div>
</div>