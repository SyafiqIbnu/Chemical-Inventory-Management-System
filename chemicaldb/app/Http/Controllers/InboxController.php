<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Inbox;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasInboxView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.inbox');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','user_id','from','message','read',];
            foreach($fields as $key => $field){
                $language = 'inbox.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'inbox.inbox','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Inbox::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('inbox.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Inbox::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('inbox/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('inbox/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('inbox.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasInboxView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasInboxEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasInboxDelete(false)){
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

	/**
     * Display create form of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		if(!PermissionHelper::hasInboxCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelInbox = new Inbox();
		
        return view('inbox.create',compact('modelInbox','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasInboxCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'user_id' => 'required|unique:inboxes',
																					'from' => 'required|max:255',
																					'message' => 'required|max:255',
																					'read' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelInbox = new Inbox();
        $modelInbox->fill($data);
        //$modelInbox->id = Convert::uuid('inboxes');
		$modelInbox->created_by = Auth::user()->getKey();
        $modelInbox->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("inboxes",$modelInbox->getKey(),$modelInbox->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("inbox")."/".$modelInbox->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::hasInboxView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelInbox = Inbox::findOrFail($id); 
        $title=__('inbox.title_show').__('inbox.title');
        return view('inbox.show',compact('title','modelInbox','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasInboxEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelInbox = Inbox::findOrFail($id);    
		
        return view('inbox.edit',compact('modelInbox','request' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		if(!PermissionHelper::hasInboxEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelInbox = Inbox::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'user_id' => [
					'required',
					Rule::unique('inboxes')->ignore($modelInbox->id),
				],
			 						 									'from' => 'required|max:255',
													 									'message' => 'required|max:255',
													 									'read' => 'required',
										        ]);     
        //Rule::unique('inboxes')->ignore($modelInbox->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelInbox -> fill($data);
        $modelInbox->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("inboxes",$modelInbox->getKey(),$modelInbox->toArray());
        $modelInbox -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("inbox"));	
    }
	
	/**
     * Delete the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
	public function destroy(Request $request, $id)
	{
		if(!PermissionHelper::hasInboxDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelInbox = Inbox::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("inboxes",$modelInbox->getKey(),$modelInbox->toArray());
		$modelInbox->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("inbox"));		 
	}
}
