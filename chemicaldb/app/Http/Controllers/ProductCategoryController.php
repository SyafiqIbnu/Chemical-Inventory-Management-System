<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\ProductCategory;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasProductCategoryView()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.product_category');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name',];
            foreach($fields as $key => $field){
                $language = 'product_category.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'product_category.product_category','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = ProductCategory::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('product_category.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=ProductCategory::query();
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
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('product_category/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('product_category/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('product_category.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasProductCategoryView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasProductCategoryEdit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasProductCategoryDelete(false)){
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
		if(!PermissionHelper::hasProductCategoryCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelProductCategory = new ProductCategory();
		
        return view('product_category.create',compact('modelProductCategory','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::hasProductCategoryCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:product_categories|max:254',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelProductCategory = new ProductCategory();
        $modelProductCategory->fill($data);
        //$modelProductCategory->id = Convert::uuid('product_categories');
		$modelProductCategory->created_by = Auth::user()->getKey();
        $modelProductCategory->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("product_categories",$modelProductCategory->getKey(),$modelProductCategory->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("product_category")."/".$modelProductCategory->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::hasProductCategoryView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelProductCategory = ProductCategory::findOrFail($id); 
        $title=__('product_category.title_show').__('product_category.title');
        return view('product_category.show',compact('title','modelProductCategory','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasProductCategoryEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelProductCategory = ProductCategory::findOrFail($id);    
		
        return view('product_category.edit',compact('modelProductCategory','request' ));
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
		if(!PermissionHelper::hasProductCategoryEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelProductCategory = ProductCategory::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('product_categories')->ignore($modelProductCategory->id),
				],
			 			        ]);     
        //Rule::unique('product_categories')->ignore($modelProductCategory->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelProductCategory -> fill($data);
        $modelProductCategory->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("product_categories",$modelProductCategory->getKey(),$modelProductCategory->toArray());
        $modelProductCategory -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("product_category"));	
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
		if(!PermissionHelper::hasProductCategoryDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$modelProductCategory = ProductCategory::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("product_categories",$modelProductCategory->getKey(),$modelProductCategory->toArray());
		$modelProductCategory->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("product_category"));		 
	}
}
