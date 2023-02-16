<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use App\MailMessage;
use App\Helpers\Convert;
use \App\Helpers\PermissionHelper;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use App\Helpers\SendMailMessage;
use Illuminate\Mail\Markdown;

class MailMessageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request, $type = "html") {
        if(!PermissionHelper::hasEmailView()){
            abort(403, __('general.unauthorizedAction.'));
        }
        $title=__('mail_message.title_index');
        if(in_array($type,['excel','pdf'])){
            $request->merge(['start' => null, 'length' => null]);
            $fields=['id', 'module', 'mail_subject', 'mail_text',];
            foreach($fields as $key => $field){
                $language = 'mail_message.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'mail_message.mail_message','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
            $results = MailMessage::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
            return view('mail_message.index', compact('title'));
        }
    }

    /**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
    private function getIndexData(Request $request){
        $dataModels=MailMessage::query();
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

    /**
     * return data of the resource in datatable format
     *
     * @return  Datatable
     */
    public function returnindexAjax(Request $request,$dataModels) {
        $modelDatatables = Datatables::of($dataModels)
        ->orderColumn('id', '-id $1')
        ->addIndexColumn()
        ->filter(function ($query) use($request){
            if(!empty($request->input('f_start_date'))){
                $request->f_start_date = Carbon::createFromFormat("d/m/Y", $request->f_start_date)->toDateString();
                $query->where('created_at', '>=', $request->f_start_date);
            }
            if(!empty($request->input('f_end_date'))){
                $request->f_end_date = Carbon::createFromFormat("d/m/Y", $request->f_end_date)->toDateString();
                $query->where('created_at', '<=', $request->f_end_date);
            }
        },true)
        ->addColumn('action', function($query) use($request){
            $buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('mail_message/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
            $buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('mail_message/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
            $buttonDelete = "<a title='Padam' data-modal data-route='". route('mail_message.destroy', $query->getKey()) ."' 
                    data-toggle='modal' data-target='#modal-delete' 
                    type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
            </a>";

            if(!PermissionHelper::hasEmailView(false)){
                $buttonView='';
            }

            if(!PermissionHelper::hasEmailEdit(false)){
                $buttonEdit='';
            }

            if(!PermissionHelper::hasEmailDelete(false)){
                $buttonDelete='';
            }               
                
            return $buttonView.' '.$buttonEdit.' '.$buttonDelete;
        });
        
        return $modelDatatables;
    }

    /**
     * Get a listing of the resource using ajax
     *
     * @return  \Illuminate\Http\Response
     */
    public function indexAjax(Request $request) {
        $dataTableModels=$this->getIndexData($request);
        return $dataTableModels->make(true);
    }

    public function create(Request $request) {
        if(!PermissionHelper::hasEmailCreate()){
            abort(403, __('general.unauthorizedAction.'));
        }
        $modelMailMessage = new MailMessage();
        return view('mail_message.create', compact('modelMailMessage', 'request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(!PermissionHelper::hasEmailCreate()){
            abort(403, __('general.unauthorizedAction.'));
        }
        $data = $request->all();
        $modelMailMessage = new MailMessage();
        $modelMailMessage->fill($data);
        $modelMailMessage->created_by = Auth::user()->id;
        $modelMailMessage->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("mail_messages", $modelMailMessage->id, $modelMailMessage->toArray());

        Session::flash('success', 'Berjaya Ditambah');
        return redirect(url("mail_message/$modelMailMessage->id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        if(!PermissionHelper::hasEmailView()){
            abort(403, __('general.unauthorizedAction.'));
        }
        $modelMailMessage = MailMessage::findOrFail($id);
        $title = __('mail_message.title');
        $title2 = __('mail_message.title_show') . __('mail_message.title');
        return view('mail_message.show', compact('title','title2', 'modelMailMessage', 'request'));
    }
    
    public function preview(Request $request, $id) {
        $modelMailMessage = MailMessage::findOrFail($id);
        $modelMessage = collect(['email', 'mail_subject', 'mail_text']);
        $modelMessage->email = '';
        $modelMessage->mail_subject = '';
        $modelMessage->mail_text = $modelMailMessage->mail_text;
        return new \App\Mail\PermitKhasMail($modelMessage);
    }

    public function edit(Request $request, $id) {
        if(!PermissionHelper::hasEmailEdit()){
            abort(403, __('general.unauthorizedAction.'));
        }

        $modelMailMessage = MailMessage::findOrFail($id);

        return view('mail_message.edit', compact('modelMailMessage', 'request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if(!PermissionHelper::hasEmailEdit()){
            abort(403, __('general.unauthorizedAction.'));
        }
        $data = $request->all();
        $modelMailMessage = MailMessage::findOrFail($id);

        $modelMailMessage->fill($data);
        $modelMailMessage->updated_by = Auth::user()->id;
        \App\Classes\AuditTrailHelper::logAuditUpdate("mail_messages", $modelMailMessage->id, $modelMailMessage->toArray());
        $modelMailMessage->save();
        Session::flash('success', 'Berjaya Dikemaskini');
        return back();
    }

    public function showRecordSaved(Request $request) {
        return view('mail_message.success', compact('request'));
    }

    public function destroy(Request $request, $id) {
        if(!PermissionHelper::hasEmailDelete()){
            abort(403, __('general.unauthorizedAction.'));
        }
        $modelMailMessage = MailMessage::findOrFail($id);
        \App\Classes\AuditTrailHelper::logAuditDelete("mail_messages", $modelMailMessage->id, $modelMailMessage->toArray());
        $modelMailMessage->delete();
        Session::flash('success', 'Berjaya Dipadam');
        return redirect(url("mail_message"));
    }

}
