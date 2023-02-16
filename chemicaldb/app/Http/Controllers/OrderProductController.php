<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\OrderProduct;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasOrderProductView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.order_product');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','order_id','product_id','quantity','price','amount',];
            foreach($fields as $key => $field){
                $language = 'order_product.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'order_product.order_product','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = OrderProduct::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('order_product.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=OrderProduct::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('order_product/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('order_product/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('order_product.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";
/*
			if(!PermissionHelper::hasOrderProductView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasOrderProductEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasOrderProductDelete(false)){
				$buttonDelete='';
			}				
				*/
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
		if(!PermissionHelper::hasOrderProductCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelOrderProduct = new OrderProduct();
		
        return view('order_product.create',compact('modelOrderProduct','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasOrderProductCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'order_id' => 'required|unique:order_products',
																					'product_id' => 'required',
																					'quantity' => 'required',
																					'price' => 'required',
																					'amount' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelOrderProduct = new OrderProduct();
        $modelOrderProduct->fill($data);
        //$modelOrderProduct->id = Convert::uuid('order_products');
		$modelOrderProduct->created_by = Auth::user()->getKey();
        $modelOrderProduct->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("order_products",$modelOrderProduct->getKey(),$modelOrderProduct->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("order_product")."/".$modelOrderProduct->getKey());
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
		if(!PermissionHelper::hasOrderProductView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelOrderProduct = OrderProduct::findOrFail($id); 
        $title=__('order_product.title_show').__('order_product.title');
        return view('order_product.show',compact('title','modelOrderProduct','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasOrderProductEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelOrderProduct = OrderProduct::findOrFail($id);    
		
        return view('order_product.edit',compact('modelOrderProduct','request' ));
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
		if(!PermissionHelper::hasOrderProductEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelOrderProduct = OrderProduct::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'order_id' => [
					'required',
					Rule::unique('order_products')->ignore($modelOrderProduct->id),
				],
			 						 									'product_id' => 'required',
													 									'quantity' => 'required',
													 									'price' => 'required',
													 									'amount' => 'required',
										        ]);     
        //Rule::unique('order_products')->ignore($modelOrderProduct->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelOrderProduct -> fill($data);
        $modelOrderProduct->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("order_products",$modelOrderProduct->getKey(),$modelOrderProduct->toArray());
        $modelOrderProduct -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("order_product"));	
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
		if(!PermissionHelper::hasOrderProductDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        

		$modelOrderProduct = OrderProduct::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("order_products",$modelOrderProduct->getKey(),$modelOrderProduct->toArray());
		$modelOrderProduct->delete();
        $orderid=$modelOrderProduct->order_id;
        //Session::flash('success', __('general.success_deletes'));
		//return redirect(url("order_product"));		 
        return redirect(url("orderlinked")."/".$orderid."/products");
	}
}
