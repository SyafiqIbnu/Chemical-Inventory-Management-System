<div class='col-md-12 form-group'>
    <div class="row">
        <div class='col-md-1'>
            <label for="branch_filter">{{__('general.branch')}}</label>
        </div>
        <div class='col-md-10'>
            <div class="row">
                <div class="col-md-9">
                    @if(\App\Helpers\PermissionHelper::hasCentralOfficerView(false))
                        {!! Form::select('branch_filter',$branch_id_list,$_POST['branch_filter'],[ 'class'=>'form-control select2','required','placeholder'=>__('general.please_select'),'id'=>'branch_filter','name'=>'branch_filter']) !!}
                    @else
                        {!! Form::select('branch_filter',$branch_id_list,$_POST['branch_filter'],[ 'class'=>'form-control select2','required','id'=>'branch_filter','name'=>'branch_filter']) !!}
                    @endif
                </div>

                <div class="col-md-3">
                    <button id="btn_branch_filter" class="btn btn-secondary btn-sm bg-purple" tabindex="0" aria-controls="staff_table_ajax" type="button"><span><i class="fa fa-filter" aria-hidden="true"></i> {{__('general.view')}}</span></button>
                </div>
            </div>
        </div>
    </div>
</div>