<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Staff;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasStaffView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.staff');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name','staff_no',];
            foreach($fields as $key => $field){
                $language = 'staff.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'staff.staff','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Staff::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('staff.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Staff::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('staff/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('staff/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('staff.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasStaffView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasStaffEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasStaffDelete(false)){
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
		if(!PermissionHelper::hasStaffCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelStaff = new Staff();
		
        return view('staff.create',compact('modelStaff','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasStaffCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:staffs|max:45',
																					'staff_no' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelStaff = new Staff();
        $modelStaff->fill($data);
        //$modelStaff->id = Convert::uuid('staffs');
		$modelStaff->created_by = Auth::user()->getKey();
        $modelStaff->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("staffs",$modelStaff->getKey(),$modelStaff->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("staff")."/".$modelStaff->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::hasStaffView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelStaff = Staff::findOrFail($id); 
        $title=__('staff.title_show').__('staff.title');
        return view('staff.show',compact('title','modelStaff','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasStaffEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelStaff = Staff::findOrFail($id);    
		
        return view('staff.edit',compact('modelStaff','request' ));
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
		if(!PermissionHelper::hasStaffEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelStaff = Staff::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('staffs')->ignore($modelStaff->id),
				],
			 						 									'staff_no' => 'required',
										        ]);     
        //Rule::unique('staffs')->ignore($modelStaff->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelStaff -> fill($data);
        $modelStaff->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("staffs",$modelStaff->getKey(),$modelStaff->toArray());
        $modelStaff -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("staff"));	
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
		if(!PermissionHelper::hasStaffDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelStaff = Staff::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("staffs",$modelStaff->getKey(),$modelStaff->toArray());
		$modelStaff->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("staff"));		 
	}
}
