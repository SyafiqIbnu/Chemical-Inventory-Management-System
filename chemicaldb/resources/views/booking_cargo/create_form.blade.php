{!! Form::hidden('booking_application_id',$booking_application_id)  !!}

@component('layouts.components.edit_modal_one_column',['for' => 'weight','required' => '1','label'=>__('booking_cargo.weight')]) 
@slot('field')
	{!! Form::text('weight',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','required','placeholder'=>__('booking_cargo.weight_placeholder')])  !!}
@endslot 
@endcomponent

@component('layouts.components.edit_modal_one_column',['for' => 'height','required' => '1','label'=>__('booking_cargo.height')]) 
@slot('field')
	{!! Form::text('height',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','required','placeholder'=>__('booking_cargo.height_placeholder')])  !!}
@endslot 
@endcomponent

<!-- pilih cubic/cylinder -->

@component('layouts.components.edit_modal_one_column',['for' => 'cargo_type','required' => '1','label'=>__('Cargo Type')]) 
@slot('field')
	{!! Form::select('cargo_type',$cargo_type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'cargo_type','name'=>'cargo_type']) !!}
@endslot 
@endcomponent

<!-- cube -->

<div id='width'>
@component('layouts.components.edit_modal_one_column',['for' => 'width','required' => '0','label'=>__('booking_cargo.width')]) 
@slot('field')
	{!! Form::text('width',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','placeholder'=>__('booking_cargo.width_placeholder'),'id'=>'width'])  !!}
@endslot 
@endcomponent
</div>

<div id='length'>
@component('layouts.components.edit_modal_one_column',['for' => 'length','required' => '0','label'=>__('booking_cargo.length')]) 
@slot('field')
	{!! Form::text('length',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','placeholder'=>__('booking_cargo.length_placeholder'),'id'=>'length'])  !!}
@endslot 
@endcomponent
</div>

<!-- cylinder -->

<div id='diameter'>
@component('layouts.components.edit_modal_one_column',['for' => 'diameter','required' => '0','label'=>__('booking_cargo.diameter')]) 
@slot('field')
	{!! Form::text('diameter',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','placeholder'=>__('booking_cargo.diameter_placeholder'),'id'=>'diameter'])  !!}
@endslot 
@endcomponent
</div>

<div id='radius'>
@component('layouts.components.edit_modal_one_column',['for' => 'radius','required' => '0','label'=>__('booking_cargo.radius')]) 
@slot('field')
	{!! Form::text('radius',null,['onkeypress'=>'return isDoubleRound(event,this,2)', 'class'=>'form-control','placeholder'=>__('booking_cargo.radius_placeholder'),'id'=>'radius'])  !!}
@endslot 
@endcomponent
</div>



@component('layouts.components.edit_modal_one_column',['for' => 'unit','required' => '1','label'=>__('booking_cargo.unit')]) 
@slot('field')
	{!! Form::text('unit',null,['onkeypress'=>'return isInteger(event,this)', 'class'=>'form-control','required','placeholder'=>__('booking_cargo.unit')])  !!}
@endslot 
@endcomponent

@push('scriptsDocumentReady') 

$("#cargo_type").on("change", function () {
		//alert( $("#cargo_type").val());
        var cargo_type=$("#cargo_type").val();
		var width = document.getElementById('width');
		var length = document.getElementById('length');
		var radius = document.getElementById('radius');
		var diameter = document.getElementById('diameter');

		if(cargo_type==1){
			radius.style.display = 'none';
			diameter.style.display = 'none';
			width.style.display = 'block';
			length.style.display = 'block';
		}else{
			width.style.display = 'none';
			length.style.display = 'none';
			radius.style.display = 'block';
			diameter.style.display = 'block';
		}
		        
    });

$("#diameter").on("change", function () {
	var diameter = $("#diameter").val();
	var radius = diameter/2;
	document.getElementById('radius').Value = radius;

});

@endpush