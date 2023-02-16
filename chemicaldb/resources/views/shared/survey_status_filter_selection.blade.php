<div class='col-md-12 form-group'>
    <div class="row">
        <div class='col-md-1'>
            <label for="survey_status_filter">{{__('general.survey_statu')}}</label>
        </div>
        <div class='col-md-10'>
            <div class="row">
                <div class="col-md-9">
                    {!! Form::select('survey_status_filter',$survey_status_id_list,$survey_status_filter,[ 'class'=>'form-control select2','required','id'=>'survey_status_filter','name'=>'survey_status_filter']) !!}
                </div>

                <div class="col-md-3">
                    <button id="btn_survey_status_filter" class="btn btn-secondary btn-sm bg-purple" tabindex="0" aria-controls="survey_table_ajax" type="button"><span><i class="fa fa-filter" aria-hidden="true"></i> {{__('general.view')}}</span></button>
                </div>
            </div>
        </div>
    </div>
</div>