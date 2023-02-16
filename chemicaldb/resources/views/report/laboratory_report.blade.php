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
        @component('layouts.components.edit_modal_one_column',['for' => 'faculty','required' => '1','label'=>__('laboratory.faculty')]) 
        @slot('field')
            {!! Form::select('faculty',$faculty_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'faculty','name'=>'faculty']) !!}
        @endslot 
        @endcomponent
        
        @component('layouts.components.edit_modal_one_column',['for' => 'type','required' => '1','label'=>__('laboratory.type')]) 
        @slot('field')
            {!! Form::select('type',$type_list,null,[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'type','name'=>'type']) !!}
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
            @include('report.laboratory_report_table')
        @endslot 
        @slot('cardFooter')
        @endslot
@endcomponent
</div>


@endsection

@push('scriptsDocumentReady')
	setMenuActive('menu-laboratory-report'); 
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
        var faculty_id = $('#faculty').val();
        var type_id = $('#type').val();
        // var date1 = document.getElementById("date1").value;
        // var date2 = document.getElementById("date2").value;
        // window.location.href = "?date1=" + date1+ "&date2=" + date2;
        window.location.href = "?faculty_id=" + faculty_id+ "&type_id=" + type_id;
    }

    function downloadcsv(){
        var date1 = document.getElementById("date1").value;
        var date2 = document.getElementById("date2").value;
        window.location.href = "?date1=" + date1+ "&date2=" + date2+ "&option=downloadcsv";
    }
    
</script>