<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\OrderStatu;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class OrderStatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasOrderStatuView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.order_statu');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'order_statu.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'order_statu.order_statu','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = OrderStatu::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('order_statu.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=OrderStatu::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('order_statu/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('order_statu/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('order_statu.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasOrderStatuView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasOrderStatuEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasOrderStatuDelete(false)){
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
		if(!PermissionHelper::hasOrderStatuCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelOrderStatu = new OrderStatu();
		
        return view('order_statu.create',compact('modelOrderStatu','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasOrderStatuCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:order_status|max:30',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelOrderStatu = new OrderStatu();
        $modelOrderStatu->fill($data);
        //$modelOrderStatu->id = Convert::uuid('order_status');
		$modelOrderStatu->created_by = Auth::user()->getKey();
        $modelOrderStatu->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("order_status",$modelOrderStatu->getKey(),$modelOrderStatu->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("order_statu")."/".$modelOrderStatu->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::hasOrderStatuView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelOrderStatu = OrderStatu::findOrFail($id); 
        $title=__('order_statu.title_show').__('order_statu.title');
        return view('order_statu.show',compact('title','modelOrderStatu','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasOrderStatuEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelOrderStatu = OrderStatu::findOrFail($id);    
		
        return view('order_statu.edit',compact('modelOrderStatu','request' ));
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
		if(!PermissionHelper::hasOrderStatuEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelOrderStatu = OrderStatu::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('order_status')->ignore($modelOrderStatu->id),
				],
			 			        ]);     
        //Rule::unique('order_status')->ignore($modelOrderStatu->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelOrderStatu -> fill($data);
        $modelOrderStatu->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("order_status",$modelOrderStatu->getKey(),$modelOrderStatu->toArray());
        $modelOrderStatu -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("order_statu"));	
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
		if(!PermissionHelper::hasOrderStatuDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelOrderStatu = OrderStatu::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("order_status",$modelOrderStatu->getKey(),$modelOrderStatu->toArray());
		$modelOrderStatu->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("order_statu"));		 
	}
}
