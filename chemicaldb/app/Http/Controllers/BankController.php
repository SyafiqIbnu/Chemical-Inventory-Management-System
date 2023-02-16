<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Bank;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasBankView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		*/
        $title=__('general.title_index').__('general.bank');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'bank.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'bank.bank','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Bank::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('bank.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Bank::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('bank/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('bank/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('bank.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

            /*
			if(!PermissionHelper::hasBankView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasBankEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasBankDelete(false)){
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
		if(!PermissionHelper::hasBankCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBank = new Bank();
		
        return view('bank.create',compact('modelBank','request' ));
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
		if(!PermissionHelper::hasBankCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:banks|max:254',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelBank = new Bank();
        $modelBank->fill($data);
        //$modelBank->id = Convert::uuid('banks');
		$modelBank->created_by = Auth::user()->getKey();
        $modelBank->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("banks",$modelBank->getKey(),$modelBank->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("bank")."/".$modelBank->getKey());
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
		if(!PermissionHelper::hasBankView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelBank = Bank::findOrFail($id); 
        $title=__('bank.title_show').__('bank.title');
        return view('bank.show',compact('title','modelBank','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasBankEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelBank = Bank::findOrFail($id);    
		
        return view('bank.edit',compact('modelBank','request' ));
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
		if(!PermissionHelper::hasBankEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelBank = Bank::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('banks')->ignore($modelBank->id),
				],
			 			        ]);     
        //Rule::unique('banks')->ignore($modelBank->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelBank -> fill($data);
        $modelBank->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("banks",$modelBank->getKey(),$modelBank->toArray());
        $modelBank -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("bank"));	
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
		if(!PermissionHelper::hasBankDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelBank = Bank::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("banks",$modelBank->getKey(),$modelBank->toArray());
		$modelBank->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("bank"));		 
	}
}
