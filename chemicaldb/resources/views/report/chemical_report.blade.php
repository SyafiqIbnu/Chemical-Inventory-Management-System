@extends('layouts.app')

@section('htmlheader_title')Report @endsection

@section('contentheader_title')Report @endsection

@section('main-content')
<section class="content-header">
    <h1>
        @yield('contentheader_title', '')
        <small>@yield('contentheader_description')</small>
    </h1>
</section>

<div class="clearfix"></div>
@component('layouts.components.crud_card')
		@slot('cardTitle') Filter Box @endslot
		@slot('cardColor') card-success @endslot
		@slot('cardBody') 
        @component('layouts.components.edit_modal_one_column',['for' => 'expiration_date','required' => '1','label'=>__('chemical.expiration_date')]) 
        @slot('field')
                {!! Form::text('expiration_date',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'expiration_date','data-target'=>'#expiration_date','required','placeholder'=>__('chemical.expiration_date_placeholder')])  !!}
        @endslot 
        @endcomponent
        @component('layouts.components.edit_modal_one_column',['for' => 'date_opened','required' => '1','label'=>__('chemical.date_opened')]) 
        @slot('field')
                {!! Form::text('date_opened',null,['class'=>'form-control datetimepicker-input date-field','data-toggle'=>'datetimepicker','id'=>'date_opened','data-target'=>'#date_opened','required','placeholder'=>__('chemical.date_opened_placeholder')])  !!}
        @endslot 
        @endcomponent
        @component('layouts.components.edit_modal_one_column',['for' => 'item_location','required' => '1','label'=>__('chemical.item_location')]) 
        @slot('field')
            {!! Form::text('item_location',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_location_placeholder'),'maxlength'=>254])  !!}
        @endslot 
        @endcomponent
        @component('layouts.components.edit_modal_one_column',['for' => 'item_brand','required' => '1','label'=>__('chemical.item_brand')]) 
        @slot('field')
            {!! Form::text('item_brand',null,['class'=>'form-control','required','placeholder'=>__('chemical.item_brand_placeholder'),'maxlength'=>64])  !!}
        @endslot 
        @endcomponent
        @component('layouts.components.edit_modal_one_column',['for' => 'laboratory_id','required' => '1','label'=>__('chemical.laboratory_id')]) 
        @slot('field')
            {!! Form::select('faculty',$laboratory_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'laboratory_id','name'=>'laboratory_id']) !!}
        @endslot 
        @endcomponent
        @component('layouts.components.edit_modal_one_column',['for' => 'staff_id','required' => '1','label'=>__('chemical.staff_id')]) 
        @slot('field')
            {!! Form::select('faculty',$staff_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'staff_id','name'=>'staff_id']) !!}
        @endslot 
        @endcomponent
        @endslot
		@slot('cardFooter')
			<a class="btn btn-info" onclick="datesearch()" id="btn2" href="#">Generate Report</a>
            <a class="btn btn-info" onClick="printreceipt('receipt');" id="btn2" href="#">Cetak Report</a>
            <a class="btn btn-info" onClick="downloadcsv()" id="btn3" href="#">Download CSV</a>
            {!! Form::close() !!}
		@endslot
@endcomponent
<div id="receipt">
@component('layouts.components.crud_card')
        @slot('cardTitle') 
            
        @endslot
		@slot('cardColor') card-success @endslot
        @slot('cardBody')
            @include('report.chemical_report_table')
        @endslot 
        @slot('cardFooter')
        @endslot
@endcomponent
</div>


@endsection

@push('scriptsDocumentReady')
	setMenuActive('menu-chemical-report'); 
@endpush


<script language="javascript">
    function printreceipt(printpage)
    {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }


    function datesearch() {
        var expiration_date = $('input[name="expiration_date"]').val();
        var item_location = $('input[name="item_location"]').val();
        var date_opened = $('input[name="date_opened"]').val();
        var item_brand = $('input[name="item_brand"]').val();
        var laboratory_id = $('#laboratory_id').val();
        var staff_id = $('#staff_id').val();
        // var date1 = document.getElementById("date1").value;
        // var date2 = document.getElementById("date2").value;
        // window.location.href = "?date1=" + date1+ "&date2=" + date2;
        // window.location.href = "?laboratory_id=" + laboratory_id+ "&staff_id=" + staff_id;
        window.location.href = "?laboratory_id=" + laboratory_id+ "&staff_id=" + staff_id+"&item_brand=" + item_brand+
         "&item_location=" + item_location+"&date_opened=" + date_opened+"&expiration_date=" + expiration_date;
    }

    function downloadcsv(){
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById("date2").value;
        window.location.href = "?date1=" + date1+ "&date2=" + date2+ "&option=downloadcsv";
    }
    
</script>