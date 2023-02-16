<table id="{{ $tname }}" class="table display table-hover" width="100%">
    @if(isset($filter))
    <div class='col-md-10'>				
        <div class='row'>
            {{ $filter }}
        </div>
    </div>
    <div class='col-md-2'>
        <button class='col-md-12 btn btn-success form-group' style='margin-top: 23px' id='btn_filter'><i class='fa fa-search' style='margin-right: 5px'></i>Lihat</button> 
    </div>
    @endif
    <thead>
        <tr class='bg-blue'>
            {{ $thead }}
        </tr>
    </thead>
</table>
@if(Request()->session()->get('platform') == 'mobile')
    <div class="dt-more-container">
        <button id="btn-{{ $tname }}-load-more" style="display:none">Load More</button>
        <button id="btn-{{ $tname }}-reload">Reset</button>
     </div>
@endif
@if(isset($pushModalEditAjaxTop))
    @push('modalEditAjaxTop')
        var {{ $tname }} = $('#{{ $tname }}').DataTable({
            @if(Request()->session()->get('platform') == 'mobile')
                "sDom": '<"row "<"col-md-4" f ><"col-md-4" l ><"col-md-4"<"pull-right dom-button"<B>>>>rti',
            @endif
            processing: true,
            retrieve: true,
            destroy: true,
            data:[],
            @if(isset($firstScript))
                {{ $firstScript }}
            @endif
            rowCallback: function (row, data) {},
            drawCallback: function(){
                $('#btn-{{ $tname }}-load-more').toggle(this.api().page.hasMore());
            },      
            columns: [
                {{ $tbody }}
            ],
        });
        {{ $tname }}.on('order.dt search.dt', function () {
            {{ $tname }}.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, {{ $tname }}) {
                cell.innerHTML = {{ $tname }} + 1;
            });
        }).draw();
        @if(isset($secondScript))
            {{ $secondScript }}
        @endif
        @if(isset($filter_parameter))
            $("#btn_filter").click(function() {
                {{ $tname }}.ajax.reload();
            });
        @endif
        @if(Request()->session()->get('platform') == 'mobile')
            $('#btn-{{ $tname }}-load-more').on('click', function(){  
                {{ $tname }}.page.loadMore();
            });
            $('#btn-{{ $tname }}-reload').on('click', function(){
                $('#{{ $tname }}').DataTable().page.len(10).draw();
            });
        @endif
    @endpush
@else
    @push('scriptsDocumentReady')
        var {{ $tname }} = $('#{{ $tname }}').DataTable({
            @if(Request()->session()->get('platform') == 'mobile')
                "sDom": '<"row "<"col-md-4" f ><"col-md-4" l ><"col-md-4"<"pull-right dom-button"<B>>>>rti',
            @endif
            processing: true,
            @if(!isset($no_serverside))
                serverSide: true,
            @endif
            stateSave: true,
            @if(isset($firstScript))
                {{ $firstScript }}
            @endif
            ajax:{
                "url": "{{ $url }}",
                "data": function(dt) {
                        @if(isset($filter_parameter))
                        {{ $filter_parameter }}
                        @endif
                },
                "dataType": "json",
                "type": "GET",
                "timeout": 30000,
                @if(env('APP_DEBUG') != 1)
                    "error": function(e){
                        {{ $tname }}.ajax.reload();
                    },
                @endif
            },
            drawCallback: function(){
                $('#btn-{{ $tname }}-load-more').toggle(this.api().page.hasMore());
            },      
            columns: [
                {{ $tbody }}
            ],
            "columnDefs": [
                {
                    "render": function ( data, type, row ) {
                        return data +' ('+ row[3]+')';
                    },
                    "targets": 1
                },
                { "visible": false,  "targets": [ 3 ] }
            ]
        });
        {{ $tname }}.on('order.dt search.dt', function () {
            {{ $tname }}.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, {{ $tname }}) {
                cell.innerHTML = {{ $tname }} + 1;
            });
        }).draw();
        @if(isset($secondScript))
            {{ $secondScript }}
        @endif
        @if(isset($filter_parameter))
            $("#btn_filter").click(function() {
                {{ $tname }}.ajax.reload();
            });
        @endif
        @if(Request()->session()->get('platform') == 'mobile')
            $('#btn-{{ $tname }}-load-more').on('click', function(){  
                {{ $tname }}.page.loadMore();
            });
            $('#btn-{{ $tname }}-reload').on('click', function(){
                $('#{{ $tname }}').DataTable().page.len(10).draw();
            });
        @endif
    @endpush
@endif
@if(isset($mthead))
    @push('styles')
        <style>
            @media only screen and (max-width: 800px) {

            /* Force table to not be like tables anymore */
                #{{ $tname }} table, 
                #{{ $tname }} thead, 
                #{{ $tname }} tbody, 
                #{{ $tname }} th, 
                #{{ $tname }} td, 
                #{{ $tname }} tr { 
                        display: block; 
                }

                /* Hide table headers (but not display: none;, for accessibility) */
                #{{ $tname }} thead tr { 
                        position: absolute;
                        top: -9999px;
                        left: -9999px;
                }

                #{{ $tname }} tr {
                    margin-left: -15px;
                    margin-right: -15px;
                    border: 1px solid #ccc; 
                }

                #{{ $tname }} td { 
                        /* Behave  like a "row" */
                        border: none;
                        border-bottom: 1px solid #eee; 
                        position: relative;
                        padding-left: 50%; 
                        white-space: normal;
                        text-align:left;
                }

                #{{ $tname }} td:before { 
                        /* Now like a table header */
                        position: absolute;
                        /* Top/left values mimic padding */
                        top: 6px;
                        left: 6px;
                        width: 45%; 
                        padding-right: 10px; 
                        white-space: nowrap;
                        text-align:left;
                        font-weight: bold;
                        overflow: hidden;
                }

                /*
                Label the data
                */
                {{ $mthead }}
            }
        </style>
    @endpush
@endif