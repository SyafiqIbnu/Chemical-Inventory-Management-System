<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Kitchen;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasKitchenView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.kitchen');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'kitchen.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'kitchen.kitchen','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Kitchen::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('kitchen.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Kitchen::query();
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

	/**
     * return data of the resource in datatable format
     *
     * @return  Datatable
     */
	public function returnindexAjax(Request $request,$dataModels) {
		$modelDatatables = Datatables::of($dataModels)->with('state','kitchen')
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
        ->addColumn('active', function($query) use($request){
			if($query->active==1){
                return "YA";
            }else{
                return "TIDAK";
            }
			
		})
       
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('kitchen/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('kitchen/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('kitchen.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

            /*
			if(!PermissionHelper::hasKitchenView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasKitchenEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasKitchenDelete(false)){
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
    {/*
		if(!PermissionHelper::hasKitchenCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelKitchen = new Kitchen();
		
        return view('kitchen.create',compact('modelKitchen','request' ));
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
		if(!PermissionHelper::hasKitchenCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:kitchens|max:254',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelKitchen = new Kitchen();
        $modelKitchen->fill($data);
        //$modelKitchen->id = Convert::uuid('kitchens');
		$modelKitchen->created_by = Auth::user()->getKey();
        $modelKitchen->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("kitchens",$modelKitchen->getKey(),$modelKitchen->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("kitchen")."/".$modelKitchen->getKey());
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
		if(!PermissionHelper::hasKitchenView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelKitchen = Kitchen::findOrFail($id); 
        $title=__('kitchen.title_show').__('kitchen.title');
        return view('kitchen.show',compact('title','modelKitchen','request'));
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
		if(!PermissionHelper::hasKitchenEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelKitchen = Kitchen::findOrFail($id);    
		
        return view('kitchen.edit',compact('modelKitchen','request' ));
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
		if(!PermissionHelper::hasKitchenEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelKitchen = Kitchen::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('kitchens')->ignore($modelKitchen->id),
				],
			 			        ]);     
        //Rule::unique('kitchens')->ignore($modelKitchen->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelKitchen -> fill($data);
        $modelKitchen->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("kitchens",$modelKitchen->getKey(),$modelKitchen->toArray());
        $modelKitchen -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("kitchen"));	
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
		if(!PermissionHelper::hasKitchenDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}*/		

		$modelKitchen = Kitchen::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("kitchens",$modelKitchen->getKey(),$modelKitchen->toArray());
		$modelKitchen->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("kitchen"));		 
	}
}
