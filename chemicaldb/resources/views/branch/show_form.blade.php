@component('layouts.components.edit_modal_one_column',['for' => 'code','required' => '1','label'=>__('branch.code')]) 
	@slot('field')
		{!! Form::text('code',$modelBranch->code,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'name','required' => '1','label'=>__('branch.name')]) 
	@slot('field')
		{!! Form::text('name',$modelBranch->name,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'state_id','required' => '1','label'=>__('branch.state_id')]) 
	@slot('field')
		{!! Form::text('state_id',$modelBranch->state_id,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'shortname','required' => '1','label'=>__('branch.shortname')]) 
	@slot('field')
		{!! Form::text('shortname',$modelBranch->shortname,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'is_hq','required' => '1','label'=>__('branch.is_hq')]) 
	@slot('field')
		{!! Form::text('is_hq',$modelBranch->is_hq,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'addr1','required' => '1','label'=>__('branch.addr1')]) 
	@slot('field')
		{!! Form::text('addr1',$modelBranch->addr1,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'addr2','required' => '1','label'=>__('branch.addr2')]) 
	@slot('field')
		{!! Form::text('addr2',$modelBranch->addr2,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'addr3','required' => '1','label'=>__('branch.addr3')]) 
	@slot('field')
		{!! Form::text('addr3',$modelBranch->addr3,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'postcode','required' => '1','label'=>__('branch.postcode')]) 
	@slot('field')
		{!! Form::text('postcode',$modelBranch->postcode,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'city','required' => '1','label'=>__('branch.city')]) 
	@slot('field')
		{!! Form::text('city',$modelBranch->city,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'phone','required' => '1','label'=>__('branch.phone')]) 
	@slot('field')
		{!! Form::text('phone',$modelBranch->phone,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'fax','required' => '1','label'=>__('branch.fax')]) 
	@slot('field')
		{!! Form::text('fax',$modelBranch->fax,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'email','required' => '1','label'=>__('branch.email')]) 
	@slot('field')
		{!! Form::text('email',$modelBranch->email,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'active','required' => '1','label'=>__('branch.active')]) 
	@slot('field')
		{!! Form::text('active',$modelBranch->active,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

