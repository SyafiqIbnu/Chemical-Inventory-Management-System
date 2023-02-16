<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\FoodGroup;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class FoodGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasFoodGroupView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.food_group');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'food_group.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'food_group.food_group','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = FoodGroup::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('food_group.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=FoodGroup::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('food_group/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('food_group/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('food_group.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasFoodGroupView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasFoodGroupEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasFoodGroupDelete(false)){
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
		if(!PermissionHelper::hasFoodGroupCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelFoodGroup = new FoodGroup();
		
        return view('food_group.create',compact('modelFoodGroup','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasFoodGroupCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:food_groups|max:30',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelFoodGroup = new FoodGroup();
        $modelFoodGroup->fill($data);
        //$modelFoodGroup->id = Convert::uuid('food_groups');
		$modelFoodGroup->created_by = Auth::user()->getKey();
        $modelFoodGroup->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("food_groups",$modelFoodGroup->getKey(),$modelFoodGroup->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("food_group")."/".$modelFoodGroup->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::hasFoodGroupView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelFoodGroup = FoodGroup::findOrFail($id); 
        $title=__('food_group.title_show').__('food_group.title');
        return view('food_group.show',compact('title','modelFoodGroup','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasFoodGroupEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelFoodGroup = FoodGroup::findOrFail($id);    
		
        return view('food_group.edit',compact('modelFoodGroup','request' ));
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
		if(!PermissionHelper::hasFoodGroupEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelFoodGroup = FoodGroup::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('food_groups')->ignore($modelFoodGroup->id),
				],
			 			        ]);     
        //Rule::unique('food_groups')->ignore($modelFoodGroup->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelFoodGroup -> fill($data);
        $modelFoodGroup->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("food_groups",$modelFoodGroup->getKey(),$modelFoodGroup->toArray());
        $modelFoodGroup -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("food_group"));	
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
		if(!PermissionHelper::hasFoodGroupDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelFoodGroup = FoodGroup::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("food_groups",$modelFoodGroup->getKey(),$modelFoodGroup->toArray());
		$modelFoodGroup->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("food_group"));		 
	}
}
