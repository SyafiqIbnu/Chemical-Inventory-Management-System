<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\OrderDocument;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class OrderDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasOrderDocumentView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.order_document');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','order_id','name','document_types_id','path','original_name','active',];
            foreach($fields as $key => $field){
                $language = 'order_document.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'order_document.order_document','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = OrderDocument::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('order_document.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=OrderDocument::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('order_document/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('order_document/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('order_document.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasOrderDocumentView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasOrderDocumentEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasOrderDocumentDelete(false)){
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
		if(!PermissionHelper::hasOrderDocumentCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelOrderDocument = new OrderDocument();
		
        return view('order_document.create',compact('modelOrderDocument','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasOrderDocumentCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'order_id' => 'required|unique:order_documents',
																					'name' => 'required|max:255',
																					'document_types_id' => 'required',
																					'path' => 'required|max:255',
																					'original_name' => 'required|max:255',
																					'active' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelOrderDocument = new OrderDocument();
        $modelOrderDocument->fill($data);
        //$modelOrderDocument->id = Convert::uuid('order_documents');
		$modelOrderDocument->created_by = Auth::user()->getKey();
        $modelOrderDocument->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("order_documents",$modelOrderDocument->getKey(),$modelOrderDocument->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("order_document")."/".$modelOrderDocument->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::hasOrderDocumentView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelOrderDocument = OrderDocument::findOrFail($id); 
        $title=__('order_document.title_show').__('order_document.title');
        return view('order_document.show',compact('title','modelOrderDocument','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasOrderDocumentEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelOrderDocument = OrderDocument::findOrFail($id);    
		
        return view('order_document.edit',compact('modelOrderDocument','request' ));
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
		if(!PermissionHelper::hasOrderDocumentEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelOrderDocument = OrderDocument::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'order_id' => [
					'required',
					Rule::unique('order_documents')->ignore($modelOrderDocument->id),
				],
			 						 									'name' => 'required|max:255',
													 									'document_types_id' => 'required',
													 									'path' => 'required|max:255',
													 									'original_name' => 'required|max:255',
													 									'active' => 'required',
										        ]);     
        //Rule::unique('order_documents')->ignore($modelOrderDocument->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelOrderDocument -> fill($data);
        $modelOrderDocument->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("order_documents",$modelOrderDocument->getKey(),$modelOrderDocument->toArray());
        $modelOrderDocument -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("order_document"));	
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
		if(!PermissionHelper::hasOrderDocumentDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelOrderDocument = OrderDocument::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("order_documents",$modelOrderDocument->getKey(),$modelOrderDocument->toArray());
		$modelOrderDocument->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("order_document"));		 
	}
}
