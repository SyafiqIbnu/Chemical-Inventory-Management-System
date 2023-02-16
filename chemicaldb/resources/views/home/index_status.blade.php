<!-- <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
</style> -->


<div class="card direct-chat direct-chat-primary">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
      <h3 class="card-title">Status Permohonan</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="card-body" style="display: block;">
      <table width="90%" cellspacing="1" cellpadding="3" border="0" align="center">
        <tbody><tr> 
          <td class="fontbiasa">Nama</td>
          <td class="fontbiasa" align="center">:</td>
          <td class="fontbiasa">{{$modelUser->name}}</td>
        </tr>
        <tr> 
          <td class="fontbiasa" width="38%">Nombor KP/ Nombor Pendaftaran Syarikat</td>
          <td class="fontbiasa" width="1%" align="center">:</td>
          <td class="fontbiasa" width="61%">@if(isset($modelUser->mykad)) {{$modelUser->mykad}} @else {{$modelUser->cpy_reg_no}} @endif</td>
        </tr>
      </tbody></table>

      <div class="col-md-11 table-responsive" style="border: none;margin: auto;">
        @component('layouts.components.table_ajax', ['route'=>'home','tname' => 'status_table_ajax','bgColor'=>'bg-red']) 

        @slot('url')
                {{ route('home.indexAjax')}}
            @endslot 

        @slot('thead')
          <th style='width: 30px;'>{{__('general.number')}}</th>
          <th>Tarikh Permohonan</th>
          <th>Pejabat Pengeluar</th>
          <th>Status</th>
          <th>No Rujukan</th>
          <th>Tempoh Permit</th>
          <th style="width:80px;"></th>
        @endslot 

        @slot('tbody')
          @include('layouts.components.datatable_data_card_render_number',['table_name'=>'status_table_ajax']),
          @include('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'application_date','title'=>'Tarikh Permohonan']),
          @include('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'branch_id','title'=>'Pejabat Pengeluar']),
          @include('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'permit_application_status_id','title'=>'Status']),
          @include('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'permit_no','title'=>'No Rujukan']),
          @include('layouts.components.datatable_data_card_render', ['table_name'=>'status_table_ajax','name'=>'permit_period','title'=>'Tempoh Permit']),
          @include('layouts.components.datatable_data_card_render_action'),
        @endslot 

        @slot('filter_parameter')
        @endslot 

        @slot('firstScript')
          'paging':false,
          'searching': false,
          'info': false, 
        @endslot 

        @slot('secondScript')
        @endslot

        @endcomponent
        </div>

        <div style="text-align:center;">
          <a title='Papar' type='button' class='btn btn-info' href="{{ url('permit_application/create') }}">PERMOHONAN BARU</a>
        </div>
        <br/><br/>

    </div>
    
  </div>