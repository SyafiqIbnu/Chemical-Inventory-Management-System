@component('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('branch.code')]) 
@slot('field')
	{!! Form::text('code',null,['class'=>'form-control','required','placeholder'=>__('branch.code_placeholder'),'maxlength'=>10])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('branch.name')]) 
@slot('field')
	{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>__('branch.name_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('branch.state_id')]) 
@slot('field')
    {!! Form::select('state_id',$state_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'state_id','name'=>'state_id']) !!}
@endslot 
@endcomponent



@component('layouts.components.edit_modal_one_column',['for' => 'shortname','required' => '1','label'=>__('branch.shortname')]) 
@slot('field')
	{!! Form::text('shortname',null,['class'=>'form-control','required','placeholder'=>__('branch.shortname_placeholder'),'maxlength'=>30])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'is_hq','required' => '1','label'=>__('branch.is_hq')]) 
@slot('field')
    {!! Form::select('is_hq',['1'=>__('general.yes'),'2'=>__('general.no')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'is_hq','name'=>'is_hq']) !!}
@endslot 
@endcomponent



@component('layouts.components.edit_modal_one_column',['for' => 'addr1','required' => '1','label'=>__('branch.addr1')]) 
@slot('field')
	{!! Form::text('addr1',null,['class'=>'form-control','required','placeholder'=>__('branch.addr1_placeholder'),'maxlength'=>500])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'addr2','required' => '1','label'=>__('branch.addr2')]) 
@slot('field')
	{!! Form::text('addr2',null,['class'=>'form-control','required','placeholder'=>__('branch.addr2_placeholder'),'maxlength'=>500])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'addr3','required' => '1','label'=>__('branch.addr3')]) 
@slot('field')
	{!! Form::text('addr3',null,['class'=>'form-control','required','placeholder'=>__('branch.addr3_placeholder'),'maxlength'=>500])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'postcode','required' => '1','label'=>__('branch.postcode')]) 
@slot('field')
	{!! Form::text('postcode',null,['onkeypress'=>'return isInteger(event)', 'class'=>'form-control','required','placeholder'=>__('branch.postcode_placeholder'),'maxlength'=>10])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'city','required' => '1','label'=>__('branch.city')]) 
@slot('field')
	{!! Form::text('city',null,['class'=>'form-control','required','placeholder'=>__('branch.city_placeholder'),'maxlength'=>50])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('branch.phone')]) 
@slot('field')
	{!! Form::text('phone',null,['class'=>'form-control','required','placeholder'=>__('branch.phone_placeholder'),'maxlength'=>30])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'fax','required' => '1','label'=>__('branch.fax')]) 
@slot('field')
	{!! Form::text('fax',null,['class'=>'form-control','required','placeholder'=>__('branch.fax_placeholder'),'maxlength'=>30])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('branch.email')]) 
@slot('field')
	{!! Form::text('email',null,['class'=>'form-control','required','placeholder'=>__('branch.email_placeholder'),'maxlength'=>255])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('branch.active')]) 
@slot('field')
    {!! Form::select('active',['1'=>__('general.yes'),'2'=>__('general.no')],null,['class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'active','name'=>'active']) !!}
@endslot 
@endcomponent



