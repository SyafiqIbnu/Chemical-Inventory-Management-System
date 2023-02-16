<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\VehicleType;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasVehicleTypeView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.vehicle_type');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'vehicle_type.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'vehicle_type.vehicle_type','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = VehicleType::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('vehicle_type.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=VehicleType::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('vehicle_type/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('vehicle_type/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('vehicle_type.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

            /*
			if(!PermissionHelper::hasVehicleTypeView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasVehicleTypeEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasVehicleTypeDelete(false)){
				$buttonDelete='';
			}	*/			
				
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
        /*
		if(!PermissionHelper::hasVehicleTypeCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelVehicleType = new VehicleType();
		
        return view('vehicle_type.create',compact('modelVehicleType','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		/*
		if(!PermissionHelper::hasVehicleTypeCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:vehicle_types|max:254',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelVehicleType = new VehicleType();
        $modelVehicleType->fill($data);
        //$modelVehicleType->id = Convert::uuid('vehicle_types');
		$modelVehicleType->created_by = Auth::user()->getKey();
        $modelVehicleType->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("vehicle_types",$modelVehicleType->getKey(),$modelVehicleType->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("vehicle_type")."/".$modelVehicleType->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	/*
		if(!PermissionHelper::hasVehicleTypeView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelVehicleType = VehicleType::findOrFail($id); 
        $title=__('vehicle_type.title_show').__('vehicle_type.title');
        return view('vehicle_type.show',compact('title','modelVehicleType','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        /*
		if(!PermissionHelper::hasVehicleTypeEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelVehicleType = VehicleType::findOrFail($id);    
		
        return view('vehicle_type.edit',compact('modelVehicleType','request' ));
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
        /*
		if(!PermissionHelper::hasVehicleTypeEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelVehicleType = VehicleType::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('vehicle_types')->ignore($modelVehicleType->id),
				],
			 			        ]);     
        //Rule::unique('vehicle_types')->ignore($modelVehicleType->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelVehicleType -> fill($data);
        $modelVehicleType->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("vehicle_types",$modelVehicleType->getKey(),$modelVehicleType->toArray());
        $modelVehicleType -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("vehicle_type"));	
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
		if(!PermissionHelper::hasVehicleTypeDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelVehicleType = VehicleType::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("vehicle_types",$modelVehicleType->getKey(),$modelVehicleType->toArray());
		$modelVehicleType->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("vehicle_type"));		 
	}
}
