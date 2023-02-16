<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\BookingApplication;
use App\Booking;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class BookingApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasBookingApplicationView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.booking_application');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','user_id','account_holder_id','origin','destination','distance','durationHrs','durationMins','quantity','weight','length','width','height','area','volume','numVehicles','costRateVehicles','overallCostByType','overallCost','isConfirmed','confirmed_at','confirmed_id',];
            foreach($fields as $key => $field){
                $language = 'booking_application.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'booking_application.booking_application','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = BookingApplication::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('booking_application.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=BookingApplication::where('user_id',Auth::user()->getKey())->get();
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
        ->addColumn('isConfirmed', function($query) use($request){
            if($query->isConfirmed==1){
                return "Yes";
            }else{
                return "No";
            }
        })
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('booking_application/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('booking_application/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('booking_application.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

            if($query->isConfirmed==1){
                $buttonEdit='';
            }
            

            /*
			if(!PermissionHelper::hasBookingApplicationView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasBookingApplicationEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasBookingApplicationDelete(false)){
				$buttonDelete='';
			}				
				*/
			return $buttonEdit.' '.$buttonDelete;
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
		if(!PermissionHelper::hasBookingApplicationCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBookingApplication = new BookingApplication();
		
        return view('booking_application.create',compact('modelBookingApplication','request' ));
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
		if(!PermissionHelper::hasBookingApplicationCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        
        $validator = Validator::make($request->all(), [
														//'user_id' => 'required|unique:booking_applications',
																					//'account_holder_id' => 'required',
																					'origin' => 'required|max:254',
																					'destination' => 'required|max:254',
																					'distance' => 'required',
																					/*'durationHrs' => 'required',
																					'durationMins' => 'required',
																					'quantity' => 'required',
																					'weight' => 'required',
																					'length' => 'required',
																					'width' => 'required',
																					'height' => 'required',
																					'area' => 'required',
																					'volume' => 'required',
																					'numVehicles' => 'required',
																					'costRateVehicles' => 'required',
																					'overallCostByType' => 'required',
																					'overallCost' => 'required',
																					'isConfirmed' => 'required',
																					'confirmed_at' => 'required',
																					'confirmed_id' => 'required|max:30',*/
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }

        $data = $request->all();
        
        $modelBookingApplication = new BookingApplication();
        $modelBookingApplication->fill($data);
        //$modelBookingApplication->id = Convert::uuid('booking_applications');
		$modelBookingApplication->created_by = Auth::user()->getKey();
        $modelBookingApplication->user_id=Auth::user()->getKey();

        $modelBookingApplication->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("booking_applications",$modelBookingApplication->getKey(),$modelBookingApplication->toArray());
        
        //dd($modelBookingApplication);
        Session::flash('success', __('general.success_create'));
        return redirect(url("booking_application")."/".$modelBookingApplication->id."/edit");
    }

    public function confirm($booking_vehicle_id){

        $booking_vehicle=\App\BookingVehicle::findOrFail($booking_vehicle_id);
        $booking_application_id=$booking_vehicle->booking_application_id;

        $modelBookingApplication = BookingApplication::findOrFail($booking_application_id);
        $modelBookingApplication->isConfirmed=1;
        $modelBookingApplication->confirmed_at= Carbon::now();
        $modelBookingApplication->save();

        //create booking

        $modelBooking= Booking::where('booking_application_id',$booking_application_id)->first();
        if($modelBooking!=null){
            $modelBooking->vehicle_type_id=$booking_vehicle->vehicle_type_id;
            $modelBooking->numVehicles=$booking_vehicle->quantity;
            $modelBooking->costRateVehicles=$booking_vehicle->cost;
            $modelBooking->save();
        }else{
            $modelBooking = new Booking();
            $modelBooking->user_id= Auth::user()->getKey();
            $modelBooking->booking_application_id= $booking_application_id;
            $modelBooking->vehicle_type_id=$booking_vehicle->vehicle_type_id;
            $modelBooking->numVehicles=$booking_vehicle->quantity;
            $modelBooking->costRateVehicles=$booking_vehicle->cost;
            $modelBooking->save();
        }

        

        Session::flash('success', __('general.success_update'));
		return view('booking.edit',compact('modelBookingApplication',
        'booking_application_id','modelBooking'));
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
		if(!PermissionHelper::hasBookingApplicationView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBookingApplication = BookingApplication::findOrFail($id); 
        $title=__('booking_application.title_show').__('booking_application.title');
        return view('booking_application.show',compact('title','modelBookingApplication','request'));
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
		if(!PermissionHelper::hasBookingApplicationEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBookingApplication = BookingApplication::findOrFail($id);
        $booking_application_id= $id;   
		
        return view('booking_application.edit',compact('modelBookingApplication','request','booking_application_id' ));
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
		if(!PermissionHelper::hasBookingApplicationEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelBookingApplication = BookingApplication::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'user_id' => [
					'required',
					Rule::unique('booking_applications')->ignore($modelBookingApplication->id),
				],
			 						 									'account_holder_id' => 'required',
													 									'origin' => 'required|max:254',
													 									'destination' => 'required|max:254',
													 									'distance' => 'required',
													 									'durationHrs' => 'required',
													 									'durationMins' => 'required',
													 									'quantity' => 'required',
													 									'weight' => 'required',
													 									'length' => 'required',
													 									'width' => 'required',
													 									'height' => 'required',
													 									'area' => 'required',
													 									'volume' => 'required',
													 									'numVehicles' => 'required',
													 									'costRateVehicles' => 'required',
													 									'overallCostByType' => 'required',
													 									'overallCost' => 'required',
													 									'isConfirmed' => 'required',
													 									'confirmed_at' => 'required',
													 									'confirmed_id' => 'required|max:30',
										        ]);     
        //Rule::unique('booking_applications')->ignore($modelBookingApplication->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelBookingApplication -> fill($data);
        $modelBookingApplication->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("booking_applications",$modelBookingApplication->getKey(),$modelBookingApplication->toArray());
        $modelBookingApplication -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("booking_application"));	
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
		if(!PermissionHelper::hasBookingApplicationDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelBookingApplication = BookingApplication::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("booking_applications",$modelBookingApplication->getKey(),$modelBookingApplication->toArray());
		$modelBookingApplication->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("booking_application"));		 
	}

    public function getDistance($addressFrom,$addressTo,$unit){
        /*
        $addressFrom=$request->addressFrom;
        $addressTo=$request->addressTo;
        $unit=$request->unit;
*/

        $apiKey=env('GOOGLE_MAPS_API_KEY');
        $formattedAddrFrom=str_replace(' ','+',$addressFrom);
        $formattedAddrTo=str_replace(' ','+',$addressTo);

        //geocoding API request with start address
        $geoCodeFrom=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'sensor=false&key='.$apiKey);
        $outputFrom=json_decode($geoCodeFrom);
        if(!empty($outputFrom->error_message)){
            return $outputFrom->error_message;
        }
        //dd($outputFrom);

        //geocoding API request with end address
        $geoCodeTo=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'sensor=false&key='.$apiKey);
        $outputTo=json_decode($geoCodeTo);
        if(!empty($outputTo->error_message)){
            return $outputTo->error_message;
        }

        dd($outputTo);

        //get latitude and longitude from the geodata
        $latitudeFrom=$outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom=$outputFrom->results[0]->geometry->location->lng;
        $latitudeTo=$outputTo->results[0]->geometry->location->lat;
        $longitudeTo=$outputTo->results[0]->geometry->location->lng;

        //calculate distance between latitude and longitude
        $theta=$longitudeFrom - $longitudeTo;
        $dist=sin(deg2rad($latitudeFrom))*sin(deg2rad($latitudeTo))+cos(deg2rad($latitudeFrom))+cos(deg2rad($latitudeTo))*cos(deg2rad($theta));
        $dist=acos($dist);
        $dist=rad2deg($dist);
        $miles=$dist*60*1.1515;

        //convert unit and return distance
        $distance="";
        $unit=strtoupper($unit);
        if($unit=="K"){
            $distance= round($miles*1.609344,2).' km';
        }elseif($unit=="M"){
            $distance= round($miles*1609.344,2).' m';
        }else{
            $distance= round($miles,2).' miles';
        }

        return json_encode($distance);

    }

    public function calculateOptimizer(Request $request,$id){

        //check if no cargo
        $bookingCargo= \App\BookingCargo::where('booking_application_id',$id)->first();
        if($bookingCargo==null){
            return back()->withErrors('Please insert cargo items');
        }

        $parameters=array();
        $modelBookingApplication= BookingApplication::find($id);

        //get details
        $travelData=array();
        $travelData['originAddr']= $modelBookingApplication->origin;
        $travelData['destinationAddr'] = $modelBookingApplication->destination;
        $travelData['distance']= $modelBookingApplication->distance;
        $parameters['travelData']=$travelData;
        
        $bookingCargoSum= \App\BookingCargo::where('booking_application_id',$id)->sum('unit');
        $parameters['cargoQuantity']=$bookingCargoSum;
        $cargoData=array();
        $bookingCargos= \App\BookingCargo::where('booking_application_id',$id)->get();
        foreach($bookingCargos as $cargo){
            $cargoItem = array();
            $cargoItem['cargoWeight'] = $cargo->weight;
            $cargoItem['cargoLength'] = $cargo->length;
            $cargoItem['cargoWidth'] = $cargo->width;
            $cargoItem['cargoHeight'] = $cargo->height;
            $cargoItem['cargoRadius'] = $cargo->radius;
            $cargoItem['cargoDiameter'] = $cargo->diameter;
            $cargoData[] = $cargoItem;
        }

        $parameters['cargoData']=$cargoData;
        
        //call optimizer
        $result = \App\Services\FactoHubAzureWebService::optimize($parameters);

       
        //set result in main
        if($request['data']!=null){
            //$modelBookingApplication->numVehicles="";
            //$modelBookingApplication->costEachVehicles="";
        }

        //store result in vehicles
       //check if results already exist
       $booking_vehicles= \App\BookingVehicle::where('booking_application_id',$id)->first();
       if($booking_vehicles!=null){
            //dd($request);
            foreach($booking_vehicles as $bookingvehicle){
                //set result
            }
       }else{
           $vehicletypes= \App\VehicleType::all();
           foreach($vehicletypes as $vehicletype){
                $bookingVehicle= new \App\BookingVehicle;
                $bookingVehicle->booking_application_id=$id;
                //set result
                $bookingVehicle->vehicle_type_id=$vehicletype->id;
                $bookingVehicle->cost=0.00;
                $bookingVehicle->save();
           }
            
            
       }

        $booking_application_id=$id;
        return view('booking_application.edit',compact('modelBookingApplication','request','booking_application_id' ));

    }
}
