<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\BookingCargo;
use App\BookingApplication;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class BookingCargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$id,$type="html")
    {
        /*
		if(!PermissionHelper::hasBookingCargoView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.booking_cargo');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','booking_application_id','weight','length','width','height','radius','diameter',];
            foreach($fields as $key => $field){
                $language = 'booking_cargo.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'booking_cargo.booking_cargo','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request,$id);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = BookingCargo::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			$modelBookingApplication = BookingApplication::findOrFail($id);
            $booking_application_id=$modelBookingApplication->id;
			return view('booking_cargo.index', compact('title','modelBookingApplication','booking_application_id'));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request,$id){
        $dataModels=BookingCargo::where('booking_application_id',$id);
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
        ->addColumn('cargo_type', function($query) use($request){
            return $query->cargoType->name;
        })
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('booking_cargo/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('booking_cargo/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('booking_cargo.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";
/*
			if(!PermissionHelper::hasBookingCargoView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasBookingCargoEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasBookingCargoDelete(false)){
				$buttonDelete='';
			}		*/		
				
			return $buttonView.' '.$buttonEdit.' '.$buttonDelete;
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
    public function create(Request $request,$id)
    {
        /*
		if(!PermissionHelper::hasBookingCargoCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}
*/

        $modelBookingCargo = new BookingCargo();
        $modelBookingApplication=BookingApplication::find($id);
        $booking_application_id =$id;
        $cargo_type_list = \App\CargoType::pluck('name','id');
		
        return view('booking_cargo.create',compact('modelBookingCargo','request',
        'modelBookingApplication','booking_application_id','cargo_type_list'));
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
		if(!PermissionHelper::hasBookingCargoCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'booking_application_id' => 'required',
																					'weight' => 'required',
																					'height' => 'required',
																					'unit' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelBookingCargo = new BookingCargo();
        $modelBookingCargo->fill($data);
        //$modelBookingCargo->id = Convert::uuid('booking_cargos');
		$modelBookingCargo->created_by = Auth::user()->getKey();
        $modelBookingCargo->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("booking_cargos",$modelBookingCargo->getKey(),$modelBookingCargo->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("booking_application")."/".$modelBookingCargo->booking_application_id."/edit");
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
		if(!PermissionHelper::hasBookingCargoView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBookingCargo = BookingCargo::findOrFail($id); 
        $title=__('booking_cargo.title_show').__('booking_cargo.title');
        return view('booking_cargo.show',compact('title','modelBookingCargo','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasBookingCargoEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelBookingCargo = BookingCargo::findOrFail($id);    
		
        return view('booking_cargo.edit',compact('modelBookingCargo','request' ));
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
		if(!PermissionHelper::hasBookingCargoEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelBookingCargo = BookingCargo::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'booking_application_id' => [
					'required',
					Rule::unique('booking_cargos')->ignore($modelBookingCargo->id),
				],
			 						 									'weight' => 'required',
													 									'length' => 'required',
													 									'width' => 'required',
													 									'height' => 'required',
													 									'radius' => 'required',
													 									'diameter' => 'required',
										        ]);     
        //Rule::unique('booking_cargos')->ignore($modelBookingCargo->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelBookingCargo -> fill($data);
        $modelBookingCargo->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("booking_cargos",$modelBookingCargo->getKey(),$modelBookingCargo->toArray());
        $modelBookingCargo -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("booking_cargo"));	
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
		if(!PermissionHelper::hasBookingCargoDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelBookingCargo = BookingCargo::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("booking_cargos",$modelBookingCargo->getKey(),$modelBookingCargo->toArray());
		$modelBookingCargo->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("booking_cargo"));		 
	}
}
