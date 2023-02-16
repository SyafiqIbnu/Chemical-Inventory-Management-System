<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\BookingVehicle;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class BookingVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasBookingVehicleView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.booking_vehicle');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','booking_id','vehicle_type_id','cost',];
            foreach($fields as $key => $field){
                $language = 'booking_vehicle.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'booking_vehicle.booking_vehicle','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = BookingVehicle::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			$vehicle_type_id_list=\App\VehicleType::all()->pluck('name','id');

			return view('booking_vehicle.index', compact('title' ,'vehicle_type_id_list'));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request,$id){
        $dataModels=BookingVehicle::where('booking_application_id',$id)
        ->orderBy('vehicle_type_id','asc')->get();
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
		//->orderColumn('id', '-id $1')
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
        ->addColumn('vehicle_type_id', function($query) use($request){
            return $query->vehicleType->name;
        })
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('booking_vehicle/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('booking_vehicle/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('booking_vehicle.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";
            $buttonConfirm = "<a title='Select This' type='button' class='btn btn-warning' href='".url('booking_application/'.$query->getKey())."/confirm'><i class='fa fa-check'></i></a>";
/*
			if(!PermissionHelper::hasBookingVehicleView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasBookingVehicleEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasBookingVehicleDelete(false)){
				$buttonDelete='';
			}				
				*/
			return $buttonConfirm;
		});
        
        return $modelDatatables;
	}

	/**
     * Get a listing of the resource using ajax
     *
     * @return  \Illuminate\Http\Response
     */
    public function indexAjax(Request $request,$id) {
		$dataTableModels=$this->getIndexData($request,$id);
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
		if(!PermissionHelper::hasBookingVehicleCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBookingVehicle = new BookingVehicle();
		$vehicle_type_id_list=\App\VehicleType::all()->pluck('name','id');

        return view('booking_vehicle.create',compact('modelBookingVehicle','request' ,'vehicle_type_id_list'));
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
		if(!PermissionHelper::hasBookingVehicleCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'booking_id' => 'required',
																					'vehicle_type_id' => 'required',
																					'cost' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelBookingVehicle = new BookingVehicle();
        $modelBookingVehicle->fill($data);
        //$modelBookingVehicle->id = Convert::uuid('booking_vehicles');
		$modelBookingVehicle->created_by = Auth::user()->getKey();
        $modelBookingVehicle->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("booking_vehicles",$modelBookingVehicle->getKey(),$modelBookingVehicle->toArray());
        
        Session::flash('success', __('general.success_create'));
        //return redirect(url("booking_vehicle")."/".$modelBookingVehicle->getKey());
        return redirect(url("booking")."/".$modelBookingVehicle->booking_id."/edit");
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
	
		if(!PermissionHelper::hasBookingVehicleView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBookingVehicle = BookingVehicle::findOrFail($id); 
        $title=__('booking_vehicle.title_show').__('booking_vehicle.title');
        return view('booking_vehicle.show',compact('title','modelBookingVehicle','request'));
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
		if(!PermissionHelper::hasBookingVehicleEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBookingVehicle = BookingVehicle::findOrFail($id);    
		$vehicle_type_id_list=\App\VehicleType::all()->pluck('name','id');

        return view('booking_vehicle.edit',compact('modelBookingVehicle','request' ,'vehicle_type_id_list'));
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
		if(!PermissionHelper::hasBookingVehicleEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelBookingVehicle = BookingVehicle::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'booking_id' => [
					'required',
					Rule::unique('booking_vehicles')->ignore($modelBookingVehicle->id),
				],
			 						 									'vehicle_type_id' => 'required',
													 									'cost' => 'required',
										        ]);     
        //Rule::unique('booking_vehicles')->ignore($modelBookingVehicle->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelBookingVehicle -> fill($data);
        $modelBookingVehicle->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("booking_vehicles",$modelBookingVehicle->getKey(),$modelBookingVehicle->toArray());
        $modelBookingVehicle -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("booking_vehicle"));	
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
		if(!PermissionHelper::hasBookingVehicleDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelBookingVehicle = BookingVehicle::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("booking_vehicles",$modelBookingVehicle->getKey(),$modelBookingVehicle->toArray());
		$modelBookingVehicle->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("booking_vehicle"));		 
	}
}
