<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Faculty;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		// if(!PermissionHelper::hasFacultyView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }
		
        $title=__('general.title_index').__('general.faculty');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'faculty.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'faculty.faculty','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Faculty::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('faculty.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Faculty::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('faculty/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('faculty/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('faculty.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			// if(!PermissionHelper::hasFacultyView(false)){
			// 	$buttonView='';
			// }

			// if(!PermissionHelper::hasFacultyEdit(false)){
			// 	$buttonEdit='';
			// }

			// if(!PermissionHelper::hasFacultyDelete(false)){
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
		// if(!PermissionHelper::hasFacultyCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelFaculty = new Faculty();
		
        return view('faculty.create',compact('modelFaculty','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		// if(!PermissionHelper::hasFacultyCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:faculties|max:254',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelFaculty = new Faculty();
        $modelFaculty->fill($data);
        //$modelFaculty->id = Convert::uuid('faculties');
		$modelFaculty->created_by = Auth::user()->getKey();
        $modelFaculty->updated_by = Auth::user()->getKey();
        $modelFaculty->created_at = carbon::now();
        $modelFaculty->updated_at = carbon::now();
        $modelFaculty->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("faculties",$modelFaculty->getKey(),$modelFaculty->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("faculty"));
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		// if(!PermissionHelper::hasFacultyView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelFaculty = Faculty::findOrFail($id); 
        $title=__('faculty.title_show').__('faculty.title');
        return view('faculty.show',compact('title','modelFaculty','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		// if(!PermissionHelper::hasFacultyEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelFaculty = Faculty::findOrFail($id);    
		
        return view('faculty.edit',compact('modelFaculty','request' ));
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
		// if(!PermissionHelper::hasFacultyEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $modelFaculty = Faculty::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('faculties')->ignore($modelFaculty->id),
				],
			 			        ]);     
        //Rule::unique('faculties')->ignore($modelFaculty->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelFaculty -> fill($data);
        $modelFaculty->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("faculties",$modelFaculty->getKey(),$modelFaculty->toArray());
        $modelFaculty -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("faculty"));	
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
		// if(!PermissionHelper::hasFacultyDelete()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }		

		$modelFaculty = Faculty::findOrFail($id);
        var_dump($modelFaculty);
		\App\Classes\AuditTrailHelper::logAuditDelete("faculties",$modelFaculty->getKey(),$modelFaculty->toArray());
		$modelFaculty->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("faculty"));		 
	}
}
