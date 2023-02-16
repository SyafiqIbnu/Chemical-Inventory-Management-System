<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Laboratory;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;
use App\Faculty;
use App\LaboratoryType;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		// if(!PermissionHelper::hasLaboratoryView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }
		
        $title=__('general.title_index').__('general.laboratory');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name','location','code','faculty','type',];
            foreach($fields as $key => $field){
                $language = 'laboratory.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'laboratory.laboratory','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Laboratory::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('laboratory.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Laboratory::query();
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
        ->addColumn('faculty', function($query) use($request){
            return $query->getFaculty->name;
        })
        ->addColumn('type', function($query) use($request){
            return $query->getType->name;
        })
		->addColumn('action', function($query) use($request){
            $buttonChemical = "<a title='Chemical' type='button' class='btn btn-xs btn-success' href='".url('chemical/'.$query->getKey())."/chemicalbylab'><i class='fa fa-flask'></i></a>";
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('laboratory/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('laboratory/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('laboratory.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			// if(!PermissionHelper::hasLaboratoryView(false)){
			// 	$buttonView='';
			// }

			// if(!PermissionHelper::hasLaboratoryEdit(false)){
			// 	$buttonEdit='';
			// }

			// if(!PermissionHelper::hasLaboratoryDelete(false)){
			// 	$buttonDelete='';
			// }				
				
			return $buttonChemical.' '.$buttonView.' '.$buttonEdit.' '.$buttonDelete;
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
		// if(!PermissionHelper::hasLaboratoryCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelLaboratory = new Laboratory();
		$faculty_list = Faculty::pluck('name','id');
        $type_list = LaboratoryType::pluck('name','id');
        return view('laboratory.create',compact('modelLaboratory','request','faculty_list','type_list' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		// if(!PermissionHelper::hasLaboratoryCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:laboratories|max:254',
																					'location' => 'required|max:254',
																					'code' => 'required|max:254',
																					'faculty' => 'required|max:15',
																					'type' => 'required|max:15',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelLaboratory = new Laboratory();
        $modelLaboratory->fill($data);
        //$modelLaboratory->id = Convert::uuid('laboratories');
		$modelLaboratory->created_by = Auth::user()->getKey();
		$modelLaboratory->updated_by = Auth::user()->getKey();
        $modelLaboratory->created_at = carbon::now();
        $modelLaboratory->updated_at = carbon::now();
        $modelLaboratory->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("laboratories",$modelLaboratory->getKey(),$modelLaboratory->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("laboratory")."/".$modelLaboratory->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		// if(!PermissionHelper::hasLaboratoryView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelLaboratory = Laboratory::findOrFail($id); 
        $title=__('laboratory.title_show').__('laboratory.title');
        return view('laboratory.show',compact('title','modelLaboratory','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		// if(!PermissionHelper::hasLaboratoryEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelLaboratory = Laboratory::findOrFail($id);    
		$faculty_list = Faculty::pluck('name','id');
        $type_list = LaboratoryType::pluck('name','id');
        return view('laboratory.edit',compact('modelLaboratory','request','faculty_list','type_list' ));
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
		// if(!PermissionHelper::hasLaboratoryEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $modelLaboratory = Laboratory::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('laboratories')->ignore($modelLaboratory->id),
				],
			 						 									'location' => 'required|max:254',
													 									'code' => 'required|max:254',
													 									'faculty' => 'required|max:15',
													 									'type' => 'required|max:15',
										        ]);     
        //Rule::unique('laboratories')->ignore($modelLaboratory->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelLaboratory -> fill($data);
        $modelLaboratory->updated_by=Auth::user()->getKey();
        $modelLaboratory->updated_at=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("laboratories",$modelLaboratory->getKey(),$modelLaboratory->toArray());
        $modelLaboratory -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("laboratory"));	
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
		// if(!PermissionHelper::hasLaboratoryDelete()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }		

		$modelLaboratory = Laboratory::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("laboratories",$modelLaboratory->getKey(),$modelLaboratory->toArray());
		$modelLaboratory->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("laboratory"));		 
	}
}