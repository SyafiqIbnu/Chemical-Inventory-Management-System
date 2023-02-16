<div class='col-md-12 form-group'>
    <label for="@if(isset($for)){{ $for }}@endif">@if(isset($label)){{ $label }}@endif @if($required == 1)<span class="required"></span>@endif</label>
    @if(isset($field)){{ $field }}@endif
</div>