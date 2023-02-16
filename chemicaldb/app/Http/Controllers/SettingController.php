<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Setting;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasSettingView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.setting');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name','label','value','uitype',];
            foreach($fields as $key => $field){
                $language = 'setting.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'setting.setting','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Setting::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('setting.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Setting::orderBy('rank','asc');
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('setting/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('setting/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('setting.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasSettingView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasSettingEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasSettingDelete(false)){
				$buttonDelete='';
			}				
				
            //return $buttonView.' '.$buttonEdit.' '.$buttonDelete;
            return $buttonEdit;
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
		if(!PermissionHelper::hasSettingCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelSetting = new Setting();
		
        return view('setting.create',compact('modelSetting','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasSettingCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:settings|max:50',
																					'label' => 'required|max:50',
																					'value' => 'required|max:254',
																					'uitype' => 'required|max:255',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelSetting = new Setting();
        $modelSetting->fill($data);
        //$modelSetting->id = Convert::uuid('settings');
		$modelSetting->created_by = Auth::user()->getKey();
        $modelSetting->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("settings",$modelSetting->getKey(),$modelSetting->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("setting")."/".$modelSetting->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::hasSettingView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelSetting = Setting::findOrFail($id); 
        $title=__('setting.title_show').__('setting.title');
        return view('setting.show',compact('title','modelSetting','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasSettingEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelSetting = Setting::findOrFail($id);    
		
        return view('setting.edit',compact('modelSetting','request' ));
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
		if(!PermissionHelper::hasSettingEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelSetting = Setting::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('settings')->ignore($modelSetting->id),
				],
			 						 									'label' => 'required|max:50',
													 									'value' => 'required|max:254',
													 									'uitype' => 'required|max:255',
										        ]);     
        //Rule::unique('settings')->ignore($modelSetting->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelSetting -> fill($data);
        $modelSetting->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("settings",$modelSetting->getKey(),$modelSetting->toArray());
        $modelSetting -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("setting"));	
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
		if(!PermissionHelper::hasSettingDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelSetting = Setting::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("settings",$modelSetting->getKey(),$modelSetting->toArray());
		$modelSetting->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("setting"));		 
	}
}
