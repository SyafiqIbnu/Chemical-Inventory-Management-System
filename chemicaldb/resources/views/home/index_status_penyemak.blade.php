<div class="card direct-chat direct-chat-primary">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
      <h3 class="card-title"></h3>

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

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Tugasan Baru</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Tugasan Semasa</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Tugasan Selesai</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                    <div class="col-md-11 table-responsive" style="border: none;margin: auto;">
                      @component('layouts.components.table_ajax', ['route'=>'home','tname' => 'statusPenyemak_table_ajax','bgColor'=>'bg-red']) 

                      @slot('url')
                              {{ route('home.indexAjaxPenyemak')}}
                          @endslot 

                      @slot('thead')
                        <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>Syarikat/Pertubuhan/Individu</th>
                        <th>No. Pendaftaran</th>
                        <th>No. Fail Permohonan</th>
                        <th>Status</th>
                        <th>Cawangan</th>
                        <th>Tarikh Permohonan</th>
                      @endslot 

                      @slot('tbody')
                        @include('layouts.components.datatable_data_card_render_number',['table_name'=>'statusPenyemak_table_ajax']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak_table_ajax','name'=>'company_name','title'=>'Syarikat/Pertubuhan/Individu']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak_table_ajax','name'=>'registration_no','title'=>'No. Pendaftaran']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak_table_ajax','name'=>'pbt_no','title'=>'No. Fail Permohonan']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak_table_ajax','name'=>'permit_application_status_id','title'=>'Status']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak_table_ajax','name'=>'branch_id','title'=>'Cawangan']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak_table_ajax','name'=>'application_date','title'=>'Tarikh Permohonan']),
                      @endslot 

                      @slot('filter_parameter')
                      @endslot 

                      @slot('firstScript')
                      @endslot 

                      @slot('secondScript')
                      @endslot

                      @endcomponent
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <div class="col-md-11 table-responsive" style="border: none;margin: auto;">
                      @component('layouts.components.table_ajax', ['route'=>'home','tname' => 'statusPenyemak2_table_ajax','bgColor'=>'bg-red']) 

                      @slot('url')
                              {{ route('home.indexAjaxPenyemak2')}}
                          @endslot 

                      @slot('thead')
                        <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>Syarikat/Pertubuhan/Individu</th>
                        <th>No. Pendaftaran</th>
                        <th>No. Fail Permohonan</th>
                        <th>Status</th>
                        <th>Cawangan</th>
                        <th>Tarikh Permohonan</th>
                      @endslot 

                      @slot('tbody')
                        @include('layouts.components.datatable_data_card_render_number',['table_name'=>'statusPenyemak2_table_ajax']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak2_table_ajax','name'=>'company_name','title'=>'Syarikat/Pertubuhan/Individu']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak2_table_ajax','name'=>'registration_no','title'=>'No. Pendaftaran']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak2_table_ajax','name'=>'pbt_no','title'=>'No. Fail Permohonan']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak2_table_ajax','name'=>'permit_application_status_id','title'=>'Status']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak2_table_ajax','name'=>'branch_id','title'=>'Cawangan']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak2_table_ajax','name'=>'application_date','title'=>'Tarikh Permohonan']),
                      @endslot 

                      @slot('filter_parameter')
                      @endslot 

                      @slot('firstScript')
                      @endslot 

                      @slot('secondScript')
                      @endslot

                      @endcomponent
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="settings">
                    <div class="col-md-11 table-responsive" style="border: none;margin: auto;">
                      @component('layouts.components.table_ajax', ['route'=>'home','tname' => 'statusPenyemak3_table_ajax','bgColor'=>'bg-red']) 

                      @slot('url')
                              {{ route('home.indexAjaxPenyemak3')}}
                          @endslot 

                      @slot('thead')
                        <th style='width: 30px;'>{{__('general.number')}}</th>
                        <th>Syarikat/Pertubuhan/Individu</th>
                        <th>No. Pendaftaran</th>
                        <th>No. Fail Permohonan</th>
                        <th>Status</th>
                        <th>Cawangan</th>
                        <th>Tarikh Keputusan</th>
                        <th style="width:80px;"></th>
                      @endslot 

                      @slot('tbody')
                        @include('layouts.components.datatable_data_card_render_number',['table_name'=>'statusPenyemak3_table_ajax']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak3_table_ajax','name'=>'company_name','title'=>'Syarikat/Pertubuhan/Individu']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak3_table_ajax','name'=>'registration_no','title'=>'No. Pendaftaran']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak3_table_ajax','name'=>'pbt_no','title'=>'No. Fail Permohonan']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak3_table_ajax','name'=>'permit_application_status_id','title'=>'Status']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak3_table_ajax','name'=>'branch_id','title'=>'Cawangan']),
                        @include('layouts.components.datatable_data_card_render', ['table_name'=>'statusPenyemak3_table_ajax','name'=>'approve_date','title'=>'Tarikh Keputusan']),
                        @include('layouts.components.datatable_data_card_render_action'),
                      @endslot 

                      @slot('filter_parameter')
                      @endslot 

                      @slot('firstScript')
                      @endslot 

                      @slot('secondScript')
                      @endslot

                      @endcomponent
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          
</div></div>