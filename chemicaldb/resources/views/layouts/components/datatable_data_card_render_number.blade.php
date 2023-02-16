@php
    if(! isset($name)){
        $name="id";
    }
@endphp

{data: '{{$name}}',title: "{{__('general.number')}}", orderable: false, searchable: false,visible: true,
render: function (data, type, full, meta) { 
    var table = $('#{{$table_name}}').DataTable(); 
    var info = table.page.info(); 
    var title = $('#{{$table_name}}').DataTable().column(meta.col).header(); 
    return parseInt((info.page *info.length) + meta.row+1);
    //return 1;
    } 
}