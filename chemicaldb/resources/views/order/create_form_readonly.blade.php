
@component('layouts.components.edit_modal_one_column',['for' => 'pickup_date','required' => '1','label'=>__('order.pickup_date')]) 
@slot('field')
{!! Form::text('pickup_date',date_format(new DateTime($modelOrder->pickup_date),'d - M - Y'),['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.pickup_date')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'user_id','required' => '1','label'=>__('order.linked_user')]) 
@slot('field')
	{!! Form::text('user_id',$modelOrder->linkeduser->name,['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.linked_user_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'location_id','required' => '1','label'=>__('order.location_id')]) 
@slot('field')
	{!! Form::text('location_id',$modelOrder->linkeduser->location->name,['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.linked_user_placeholder')])  !!}
@endslot 
@endcomponent

@if($modelOrder->status!=0)
@component('layouts.components.edit_modal_one_column',['for' => 'status','required' => '1','label'=>__('order.status')]) 
@slot('field')
	{!! Form::text('status',$modelOrder->orderstatus->name.' (Tarikh & Masa : '. date_format(new DateTime($modelOrder->updated_at),'d - M - Y & G:i:s') .')',['class'=>'form-control','required','readonly'=>true,'placeholder'=>__('order.status')])  !!}
@endslot 
@endcomponent
@else
@endif

