<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\CargoType;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class CargoTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		// if(!PermissionHelper::hasCargoTypeView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }
		
        $title=__('general.title_index').__('general.cargo_type');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'cargo_type.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'cargo_type.cargo_type','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = CargoType::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('cargo_type.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=CargoType::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('cargo_type/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('cargo_type/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('cargo_type.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			// if(!PermissionHelper::hasCargoTypeView(false)){
			// 	$buttonView='';
			// }

			// if(!PermissionHelper::hasCargoTypeEdit(false)){
			// 	$buttonEdit='';
			// }

			// if(!PermissionHelper::hasCargoTypeDelete(false)){
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
		// if(!PermissionHelper::hasCargoTypeCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelCargoType = new CargoType();
		
        return view('cargo_type.create',compact('modelCargoType','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		// if(!PermissionHelper::hasCargoTypeCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:cargo_types|max:30',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelCargoType = new CargoType();
        $modelCargoType->fill($data);
        //$modelCargoType->id = Convert::uuid('cargo_types');
		$modelCargoType->created_by = Auth::user()->getKey();
        $modelCargoType->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("cargo_types",$modelCargoType->getKey(),$modelCargoType->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("cargo_type")."/".$modelCargoType->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		// if(!PermissionHelper::hasCargoTypeView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelCargoType = CargoType::findOrFail($id); 
        $title=__('cargo_type.title_show').__('cargo_type.title');
        return view('cargo_type.show',compact('title','modelCargoType','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		// if(!PermissionHelper::hasCargoTypeEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelCargoType = CargoType::findOrFail($id);    
		
        return view('cargo_type.edit',compact('modelCargoType','request' ));
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
		// if(!PermissionHelper::hasCargoTypeEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $modelCargoType = CargoType::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('cargo_types')->ignore($modelCargoType->id),
				],
			 			        ]);     
        //Rule::unique('cargo_types')->ignore($modelCargoType->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelCargoType -> fill($data);
        $modelCargoType->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("cargo_types",$modelCargoType->getKey(),$modelCargoType->toArray());
        $modelCargoType -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("cargo_type"));	
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
		// if(!PermissionHelper::hasCargoTypeDelete()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }		

		$modelCargoType = CargoType::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("cargo_types",$modelCargoType->getKey(),$modelCargoType->toArray());
		$modelCargoType->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("cargo_type"));		 
	}
}
