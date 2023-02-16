<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\LaboratoryType;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class LaboratoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		// if(!PermissionHelper::hasLaboratoryTypeView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }
		
        $title=__('general.title_index').__('general.laboratory_type');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'laboratory_type.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'laboratory_type.laboratory_type','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = LaboratoryType::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('laboratory_type.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=LaboratoryType::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('laboratory_type/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('laboratory_type/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('laboratory_type.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			// if(!PermissionHelper::hasLaboratoryTypeView(false)){
			// 	$buttonView='';
			// }

			// if(!PermissionHelper::hasLaboratoryTypeEdit(false)){
			// 	$buttonEdit='';
			// }

			// if(!PermissionHelper::hasLaboratoryTypeDelete(false)){
			// 	$buttonDelete='';
			// }				
				
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
		// if(!PermissionHelper::hasLaboratoryTypeCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelLaboratoryType = new LaboratoryType();
		
        return view('laboratory_type.create',compact('modelLaboratoryType','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		// if(!PermissionHelper::hasLaboratoryTypeCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:laboratory_types|max:254',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelLaboratoryType = new LaboratoryType();
        $modelLaboratoryType->fill($data);
        //$modelLaboratoryType->id = Convert::uuid('laboratory_types');
		$modelLaboratoryType->created_by = Auth::user()->getKey();
        $modelLaboratoryType->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("laboratory_types",$modelLaboratoryType->getKey(),$modelLaboratoryType->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("laboratory_type")."/".$modelLaboratoryType->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		// if(!PermissionHelper::hasLaboratoryTypeView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelLaboratoryType = LaboratoryType::findOrFail($id); 
        $title=__('laboratory_type.title_show').__('laboratory_type.title');
        return view('laboratory_type.show',compact('title','modelLaboratoryType','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		// if(!PermissionHelper::hasLaboratoryTypeEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelLaboratoryType = LaboratoryType::findOrFail($id);    
		
        return view('laboratory_type.edit',compact('modelLaboratoryType','request' ));
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
		// if(!PermissionHelper::hasLaboratoryTypeEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $modelLaboratoryType = LaboratoryType::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('laboratory_types')->ignore($modelLaboratoryType->id),
				],
			 			        ]);     
        //Rule::unique('laboratory_types')->ignore($modelLaboratoryType->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelLaboratoryType -> fill($data);
        $modelLaboratoryType->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("laboratory_types",$modelLaboratoryType->getKey(),$modelLaboratoryType->toArray());
        $modelLaboratoryType -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("laboratory_type"));	
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
		// if(!PermissionHelper::hasLaboratoryTypeDelete()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }		

		$modelLaboratoryType = LaboratoryType::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("laboratory_types",$modelLaboratoryType->getKey(),$modelLaboratoryType->toArray());
		$modelLaboratoryType->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("laboratory_type"));		 
	}
}
