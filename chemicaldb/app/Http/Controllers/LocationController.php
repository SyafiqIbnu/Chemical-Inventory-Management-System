<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Location;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasLocationView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.location');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name','code','address','kitchen_id','state_id','active',];
            foreach($fields as $key => $field){
                $language = 'location.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'location.location','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Location::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			$kitchen_id_list=\App\Kitchen::all()->pluck('name','id');
$state_id_list=\App\State::all()->pluck('name','id');

			return view('location.index', compact('title' ,'kitchen_id_list','state_id_list'));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Location::query();
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
        ->addColumn('kitchen_id', function($query) use($request){
            return $query->kitchen->name;
        })
        ->addColumn('state_id', function($query) use($request){
            return $query->state->name;
        })
        ->addColumn('active', function($query) use($request){
			if($query->active==1){
                return "YA";
            }else{
                return "TIDAK";
            }
			
		})
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('location/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('location/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('location.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";
/*
			if(!PermissionHelper::hasLocationView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasLocationEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasLocationDelete(false)){
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
		if(!PermissionHelper::hasLocationCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelLocation = new Location();
		$kitchen_id_list=\App\Kitchen::all()->pluck('name','id');
$state_id_list=\App\State::all()->pluck('name','id');

        return view('location.create',compact('modelLocation','request' ,'kitchen_id_list','state_id_list'));
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
		if(!PermissionHelper::hasLocationCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:locations|max:254',
																					//'code' => 'required|max:10',
																					//'address' => 'required|max:65535',
																					'kitchen_id' => 'required',
																					'state_id' => 'required',
																					'active' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelLocation = new Location();
        $modelLocation->fill($data);
        //$modelLocation->id = Convert::uuid('locations');
		$modelLocation->created_by = Auth::user()->getKey();
        $modelLocation->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("locations",$modelLocation->getKey(),$modelLocation->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("location")."/".$modelLocation->getKey());
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
		if(!PermissionHelper::hasLocationView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelLocation = Location::findOrFail($id); 
        $title=__('location.title_show').__('location.title');
        return view('location.show',compact('title','modelLocation','request'));
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
		if(!PermissionHelper::hasLocationEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelLocation = Location::findOrFail($id);    
		$kitchen_id_list=\App\Kitchen::all()->pluck('name','id');
$state_id_list=\App\State::all()->pluck('name','id');

        return view('location.edit',compact('modelLocation','request' ,'kitchen_id_list','state_id_list'));
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
		if(!PermissionHelper::hasLocationEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelLocation = Location::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('locations')->ignore($modelLocation->id),
				],
			 						 									'code' => 'required|max:10',
													 									'address' => 'required|max:65535',
													 									'kitchen_id' => 'required',
													 									'state_id' => 'required',
													 									'active' => 'required',
										        ]);     
        //Rule::unique('locations')->ignore($modelLocation->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelLocation -> fill($data);
        $modelLocation->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("locations",$modelLocation->getKey(),$modelLocation->toArray());
        $modelLocation -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("location"));	
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
        /*
		if(!PermissionHelper::hasLocationDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}*/		

		$modelLocation = Location::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("locations",$modelLocation->getKey(),$modelLocation->toArray());
		$modelLocation->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("location"));		 
	}
}
