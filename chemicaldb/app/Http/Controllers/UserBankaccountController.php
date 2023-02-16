<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\UserBankaccount;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class UserBankaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasUserBankaccountView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.user_bankaccount');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','bank_name','account_name','account_no','active',];
            foreach($fields as $key => $field){
                $language = 'user_bankaccount.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'user_bankaccount.user_bankaccount','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = UserBankaccount::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('user_bankaccount.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=UserBankaccount::where('user_id',Auth::user()->id);
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
        ->addColumn('active', function($query) use($request){
                if($query->active==1){
                    return "YA";
                }else{
                    return "TIDAK";
                }
        })
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('user_bankaccount/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('user_bankaccount/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('user_bankaccount.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

            /*
			if(!PermissionHelper::hasUserBankaccountView(false)){
				$buttonView='';
			}*/

            /*
			if(!PermissionHelper::hasUserBankaccountEdit(false)){
				$buttonEdit='';
			}*/

            /*
			if(!PermissionHelper::hasUserBankaccountDelete(false)){
				$buttonDelete='';
			}			*/	
				
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
		if(!PermissionHelper::hasUserBankaccountCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelUserBankaccount = new UserBankaccount();
		
        return view('user_bankaccount.create',compact('modelUserBankaccount','request' ));
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
		if(!PermissionHelper::hasUserBankaccountCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'bank_name' => 'required|unique:user_bankaccounts|max:254',
																					'account_name' => 'required|max:254',
																					'account_no' => 'required|max:254',
																					'active' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelUserBankaccount = new UserBankaccount();
        $modelUserBankaccount->fill($data);
        //$modelUserBankaccount->id = Convert::uuid('user_bankaccounts');
        $modelUserBankaccount->user_id=Auth::user()->id;
		$modelUserBankaccount->created_by = Auth::user()->getKey();
        $modelUserBankaccount->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("user_bankaccounts",$modelUserBankaccount->getKey(),$modelUserBankaccount->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("user_bankaccount")."/".$modelUserBankaccount->getKey());
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
		if(!PermissionHelper::hasUserBankaccountView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelUserBankaccount = UserBankaccount::findOrFail($id); 
        $title=__('user_bankaccount.title_show').__('user_bankaccount.title');
        return view('user_bankaccount.show',compact('title','modelUserBankaccount','request'));
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
		if(!PermissionHelper::hasUserBankaccountEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelUserBankaccount = UserBankaccount::findOrFail($id);    
		
        return view('user_bankaccount.edit',compact('modelUserBankaccount','request' ));
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
		if(!PermissionHelper::hasUserBankaccountEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelUserBankaccount = UserBankaccount::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'bank_name' => [
					'required',
					Rule::unique('user_bankaccounts')->ignore($modelUserBankaccount->id),
				],
			 						 									'account_name' => 'required|max:254',
													 									'account_no' => 'required|max:254',
													 									'active' => 'required',
										        ]);     
        //Rule::unique('user_bankaccounts')->ignore($modelUserBankaccount->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelUserBankaccount -> fill($data);
        $modelUserBankaccount->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("user_bankaccounts",$modelUserBankaccount->getKey(),$modelUserBankaccount->toArray());
        $modelUserBankaccount -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("user_bankaccount"));	
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
		if(!PermissionHelper::hasUserBankaccountDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}*/		

		$modelUserBankaccount = UserBankaccount::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("user_bankaccounts",$modelUserBankaccount->getKey(),$modelUserBankaccount->toArray());
		$modelUserBankaccount->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("user_bankaccount"));		 
	}
}
