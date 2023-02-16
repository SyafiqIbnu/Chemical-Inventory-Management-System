@component('layouts.components.edit_modal_one_column',['for' => 'pickup_date','required' => '1','label'=>__('order.pickup_date')]) 
	@slot('field')
		{!! Form::text('pickup_date',$modelOrder->pickup_date,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'linked_user','required' => '1','label'=>__('order.linked_user')]) 
	@slot('field')
		{!! Form::text('linked_user',$modelOrder->linked_user,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'link_used','required' => '1','label'=>__('order.link_used')]) 
	@slot('field')
		{!! Form::text('link_used',$modelOrder->link_used,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'status','required' => '1','label'=>__('order.status')]) 
	@slot('field')
		{!! Form::text('status',$modelOrder->status,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'totalamount','required' => '1','label'=>__('order.totalamount')]) 
	@slot('field')
		{!! Form::text('totalamount',$modelOrder->totalamount,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'submitted_at','required' => '1','label'=>__('order.submitted_at')]) 
	@slot('field')
		{!! Form::text('submitted_at',$modelOrder->submitted_at,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'submitted_by','required' => '1','label'=>__('order.submitted_by')]) 
	@slot('field')
		{!! Form::text('submitted_by',$modelOrder->submitted_by,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'checked_at','required' => '1','label'=>__('order.checked_at')]) 
	@slot('field')
		{!! Form::text('checked_at',$modelOrder->checked_at,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'checked_by','required' => '1','label'=>__('order.checked_by')]) 
	@slot('field')
		{!! Form::text('checked_by',$modelOrder->checked_by,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'approved_at','required' => '1','label'=>__('order.approved_at')]) 
	@slot('field')
		{!! Form::text('approved_at',$modelOrder->approved_at,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'approved_by','required' => '1','label'=>__('order.approved_by')]) 
	@slot('field')
		{!! Form::text('approved_by',$modelOrder->approved_by,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'received_at','required' => '1','label'=>__('order.received_at')]) 
	@slot('field')
		{!! Form::text('received_at',$modelOrder->received_at,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent
	@component('layouts.components.edit_modal_one_column',['for' => 'received_by','required' => '1','label'=>__('order.received_by')]) 
	@slot('field')
		{!! Form::text('received_by',$modelOrder->received_by,['class'=>'form-control','required','readonly'=>'readonly'])  !!}
	@endslot 
	@endcomponent

