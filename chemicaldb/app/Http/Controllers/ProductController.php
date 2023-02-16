<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Product;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasProductView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.product');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','product_type','product_category','name','price','description','image','image_path','pax_no','active',];
            foreach($fields as $key => $field){
                $language = 'product.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'product.product','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Product::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('product.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Product::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('product/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('product/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('product.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasProductView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasProductEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasProductDelete(false)){
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
		if(!PermissionHelper::hasProductCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelProduct = new Product();
		
        return view('product.create',compact('modelProduct','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasProductCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'product_type' => 'required|unique:products',
																					'product_category' => 'required',
																					'name' => 'required|max:254',
																					'price' => 'required',
																					'description' => 'required|max:65535',
																					'image' => 'required|max:65535',
																					'image_path' => 'required|max:254',
																					'pax_no' => 'required',
																					'active' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelProduct = new Product();
        $modelProduct->fill($data);
        //$modelProduct->id = Convert::uuid('products');
		$modelProduct->created_by = Auth::user()->getKey();
        $modelProduct->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("products",$modelProduct->getKey(),$modelProduct->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("product")."/".$modelProduct->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::hasProductView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelProduct = Product::findOrFail($id); 
        $title=__('product.title_show').__('product.title');
        return view('product.show',compact('title','modelProduct','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasProductEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelProduct = Product::findOrFail($id);    
		
        return view('product.edit',compact('modelProduct','request' ));
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
		if(!PermissionHelper::hasProductEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelProduct = Product::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'product_type' => [
					'required',
					Rule::unique('products')->ignore($modelProduct->id),
				],
			 						 									'product_category' => 'required',
													 									'name' => 'required|max:254',
													 									'price' => 'required',
													 									'description' => 'required|max:65535',
													 									'image' => 'required|max:65535',
													 									'image_path' => 'required|max:254',
													 									'pax_no' => 'required',
													 									'active' => 'required',
										        ]);     
        //Rule::unique('products')->ignore($modelProduct->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelProduct -> fill($data);
        $modelProduct->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("products",$modelProduct->getKey(),$modelProduct->toArray());
        $modelProduct -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("product"));	
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
		if(!PermissionHelper::hasProductDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelProduct = Product::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("products",$modelProduct->getKey(),$modelProduct->toArray());
		$modelProduct->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("product"));		 
	}
}
