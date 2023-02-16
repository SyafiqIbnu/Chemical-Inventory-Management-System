@extends('layouts.app_auth')

@section('page_title')
{{$title ?? null}}
@endsection

@section('page_description')
{{$title ?? null}}
@endsection

@section('breadcrumb')
    <li><a href="{{ url('/')}}"><i class="fa fa-gears"></i>{{__('general.home')}}</a></li>
    <li><a href="#">{{$title ?? null}}</a></li>
@endsection

@section('main-content')
    @include('layouts.components.session_message')
    {!! Form::open(['route'=>'generator.index',$table]) !!}
        <div class="col-md-10">
            @component('layouts.components.edit_one_column',['for' => 'table_list','required' => '1','label'=>'Table']) @slot('field')
                {!! Form::select('table_list',$list,$request->table_list,['class'=>'form-control select2','required','placeholder'=>__('general.please_select')]) !!}
            @endslot @endcomponent
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o">&nbsp;Submit</i></button>
        </div>
    {!! Form::close() !!}
    <div class="col-md-12">
        {{$request->table_list}}
		{{ route('generator.generate',['table'=>$request->table_list])}}
        {!! Form::open(['route'=>['generator.generate',$request->table_list],'method'=>'POST']) !!}
            @component('layouts.components.table', ['tname' => 'generator_table']) @slot('thead')
                <th style='width: 30px;'>{{__('general.number')}}</th>
                <td>Column</td>
                <td>Types</td>
                <td></td>
            @endslot @slot('tbody')
                @foreach($columns as $col)
                <tr id="{{$col->COLUMN_NAME}}_row">
                    <td> </td>
                    <td>{{$col->COLUMN_NAME}}</td>
                    <td>{{ $col->uitype}}</td>      
                    <td class="{{$col->COLUMN_NAME}}">
                        <div id="{{$col->COLUMN_NAME}}_details">            
                        </div>
                    </td>
                </tr>
                @endforeach
            @endslot @slot('firstScript')
                paging: false,
                searching: false,
            @endslot @endcomponent
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-floppy-o">&nbsp;Generate</i></button>
        {!! Form::close() !!}
        {!! Form::open(['route'=>'generator.index',$table]) !!}
            {!! Form::hidden('revoke',1) !!}
            {!! Form::hidden('table_list',$request->table_list) !!}
            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o">&nbsp;Revoke</i></button>
        {!! Form::close() !!}
    </div>
    @push('scripts')
    <script>
        function showTables() {
            var table = $('#table_list option:selected').val();
            var path = "{{url('/generator')}}/" + table;
            location.href = path;
        }

        function uiTypeChanged(colName) {
            var uiTypeName = colName + "_UITypes";
            var selection = $("#" + uiTypeName).val();
            if (selection == "ComboBoxTable") {

                $.ajax({
                    method: "GET",
                    url: "{{url('/generator/getDropdownOptions/')}}/" + colName,
                })
                        .done(function (msg) {
                            var n = "#" + colName + "_details";
                            var o = $(n);
                            o.html(msg);
                            //alert( "Data Saved: " + msg );
                        });
            } else {
                var n = "#" + colName + "_details";
                var o = $(n);
                if (o) {
                    o.html("");
                }
            }
        }
        function getDropdownTableOptions(colName) {
            var uiTypeName = "#" + colName + "_dropdown";
            var o = $(uiTypeName);
            $.ajax({
                method: "GET",
                url: "{{url('/generator/getDropdownTableOptions/')}}/" + o.val() + "/" + colName,
            })
                    .done(function (msg) {
                        var n = "#" + colName + "_dropdown_table_option_div";
                        var o = $(n);
                        if (o) {
                            o.html(msg);
                        }
                    });
        }
    </script>
    @endpush
@endsection






