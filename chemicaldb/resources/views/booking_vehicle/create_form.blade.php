{!! Form::hidden('booking_id',null)  !!}

@component('layouts.components.edit_modal_one_column',['for' => 'vehicle_type_id','required' => '1','label'=>__('booking_vehicle.vehicle_type_id')]) 
@slot('field')
    {!! Form::select('vehicle_type_id',$vehicle_type_id_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'vehicle_type_id','name'=>'vehicle_type_id']) !!}
@endslot 
@endcomponent



@component('layouts.components.edit_modal_one_column',['for' => 'cost','required' => '1','label'=>__('booking_vehicle.cost')]) 
@slot('field')
	{!! Form::text('cost',null,['class'=>'form-control','required','placeholder'=>__('booking_vehicle.cost_placeholder')])  !!}
@endslot 
@endcomponent

