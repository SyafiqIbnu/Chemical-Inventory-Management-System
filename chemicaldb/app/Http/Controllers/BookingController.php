<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Booking;
use App\BookingVehicle;
use App\BookingApplication;
use App\VehicleType;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;
//use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasBookingView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').' Confirmed '.__('general.booking');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','booking_application_id','numVehicles','costRateVehicles','overallCostByType','overallCost',];
            foreach($fields as $key => $field){
                $language = 'booking.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'booking.booking','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Booking::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('booking.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Booking::where('user_id',Auth::user()->getKey())->get();
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

	/**
     * return data of the resource in datatable format
     *
     * @return  Datatable
     */
	public function returnindexAjax(Request $request,$dataModels) {
		$modelDatatables = Datatables::of($dataModels)->with('bookingApplication')
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
        ->addColumn('created_at', function($query) use($request){
            //$confirm_date=Carbon::createFromFormat("d/m/Y", $query->created_at)->toDateString();
            return $query->created_at;
        })
        ->addColumn('origin', function($query) use($request){
            return $query->bookingApplication->origin;
        })
        ->addColumn('destination', function($query) use($request){
            return $query->bookingApplication->destination;
        })
        ->addColumn('vehicle_type_id', function($query) use($request){
            return $query->vehicleType->name;
        })
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('booking/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('booking/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('booking.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";
            $buttonInvoice = "<a title='Invoice' type='button' class='btn btn-xs btn-info' href='".url('bookinginvoice/'.$query->getKey())."'><i class='fa fa-print'></i></a>";

            /*
			if(!PermissionHelper::hasBookingView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasBookingEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasBookingDelete(false)){
				$buttonDelete='';
			}	*/			
				
			return $buttonInvoice.' '.$buttonEdit.' '.$buttonDelete;
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
		if(!PermissionHelper::hasBookingCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelBooking = new Booking();
		
        return view('booking.create',compact('modelBooking','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasBookingCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'booking_application_id' => 'required|unique:bookings',
																					'numVehicles' => 'required',
																					'costRateVehicles' => 'required',
																					'overallCostByType' => 'required',
																					'overallCost' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelBooking = new Booking();
        $modelBooking->fill($data);
        //$modelBooking->id = Convert::uuid('bookings');
		$modelBooking->created_by = Auth::user()->getKey();
        $modelBooking->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("bookings",$modelBooking->getKey(),$modelBooking->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("booking")."/".$modelBooking->getKey());
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
	
		if(!PermissionHelper::hasBookingView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBooking = Booking::findOrFail($id); 
        $title=__('booking.title_show').__('booking.title');
        return view('booking.show',compact('title','modelBooking','request'));
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
		if(!PermissionHelper::hasBookingEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBooking = Booking::findOrFail($id);    
        $booking_application_id=$modelBooking->booking_application_id;
        $modelBookingApplication= BookingApplication::find($modelBooking->booking_application_id);
        $bookingVehicles=BookingVehicle::where('booking_id',$id)->get();
        $vehicle_types=VehicleType::pluck('name','id');
        $cargo_quantity=\App\BookingCargo::where('booking_application_id',$booking_application_id)->sum('unit');
        

        return view('booking.edit',compact('modelBooking','request','modelBookingApplication',
        'bookingVehicles','vehicle_types','booking_application_id','cargo_quantity'));
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
		if(!PermissionHelper::hasBookingEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelBooking = Booking::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				
			 						 									'delivery_date' => 'required',
													 									
										        ]);     
        //Rule::unique('bookings')->ignore($modelBooking->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelBooking -> delivery_date=$request->delivery_date;
        $modelBooking->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("bookings",$modelBooking->getKey(),$modelBooking->toArray());
        $modelBooking -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("booking"));	
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
		if(!PermissionHelper::hasBookingDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelBooking = Booking::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("bookings",$modelBooking->getKey(),$modelBooking->toArray());
		$modelBooking->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("booking"));		 
	}

    public function testLogin(Request $request){
        
        //using javascript
        return view('booking.testlogin');

    }

    public function testOptimizer(Request $request){
        
        //using javascript
        return view('booking.testoptimizer');

    }

    public function getMsg(){
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function showInvoice($id){
        $printdate= Carbon::now();
       $booking = Booking::find($id);
       $bookingApplication= \App\BookingApplication::find($booking->booking_application_id);
       $bookingCargos= \App\BookingCargo::where('booking_application_id',$id)->get();
       $cargo_quantity=\App\BookingCargo::where('booking_application_id',$id)->sum('unit');

       return view('booking.invoice',compact('booking','bookingApplication','printdate','bookingCargos',
        'cargo_quantity'));

    }


}
