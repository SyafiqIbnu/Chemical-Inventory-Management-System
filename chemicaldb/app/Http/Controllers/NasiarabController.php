<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Products;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class NasiarabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        /*
		if(!PermissionHelper::hasNasiarabView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
		
        $title=__('general.title_index').__('general.nasiarab');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name','price','description','image','is_addon',];
            foreach($fields as $key => $field){
                $language = 'nasiarab.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'nasiarab.nasiarab','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Products::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('nasiarab.index', compact('title' ));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Products::where('product_type',1);
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

	/**
     * return data of the resource in datatable format
     *
     * @return  Datatable
     */
	public function returnindexAjax(Request $request,$dataModels) {
		$modelDatatables = Datatables::of($dataModels)->with('productcategory','foodgroup')
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
        ->addColumn('product_category', function($query) use($request){
            return $query->productcategory->name;
        })
        ->addColumn('food_group', function($query) use($request){
            return $query->foodgroup->name;
        })
        ->addColumn('image_path', function ($query) {
            $url=asset('images/'.$query->image_path) ;
            return '<img src='.$url.' border="0" width="100" class="img-rounded" align="center"></img>';   
        
        })->rawColumns(['image_path', 'action'])
        
        
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('nasiarab/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('nasiarab/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('nasiarab.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

            /*
			if(!PermissionHelper::hasNasiarabView(false)){
				$buttonView='';
			}

			if(!PermissionHelper::hasNasiarabEdit(false)){
				$buttonEdit='';
			}*/

            /*
			if(!PermissionHelper::hasNasiarabDelete(false)){
				$buttonDelete='';
			}*/				
				
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
		if(!PermissionHelper::hasNasiarabCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelNasiarab = new Products();
        $product_categories=\App\ProductCategory::pluck('name','id');
        $food_group_list=\App\FoodGroup::pluck('name','id');
		
        return view('nasiarab.create',compact('modelNasiarab','request','product_categories','food_group_list'));
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
		if(!PermissionHelper::hasNasiarabCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'name' => 'required|unique:products|max:254',
																					'price' => 'required',
																					'description' => 'required|max:65535',
																					//'image' => 'required|max:65535',
																					'product_category' => 'required',
                                                                                    'pax_no' => 'required',
                                                                                    'has_condiments' => 'required',
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $modelNasiarab = new Products();
        $modelNasiarab->fill($data);
        $modelNasiarab->product_type=1;
        //$modelNasiarab->id = Convert::uuid('nasiarabs');
        $modelNasiarab->name=strtoupper($request->name);
		$modelNasiarab->created_by = Auth::user()->getKey();

        //dd($data);

        //base 64 image- tak boleh pakai sebab ada limit char length
        if($request->filepath!=null)
        {
            $dirName="public/uploads/nasiarab";
            $file=$request->filepath->store($dirName);
            $modelNasiarab->image_path= $file;
            //$data = file_get_contents(storage_path("/app/".$file));
            //$type = pathinfo($file, PATHINFO_EXTENSION);
            //$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            //$modelNasiarab->image=$base64;
            //echo "Base64 is ".$base64;
            //unlink(storage_path("/app/".$file));
        }

        $modelNasiarab->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("products",$modelNasiarab->getKey(),$modelNasiarab->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("nasiarab")."/".$modelNasiarab->getKey());
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
		if(!PermissionHelper::hasNasiarabView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelNasiarab = Products::findOrFail($id); 
        $title=__('nasiarab.title_show').__('nasiarab.title');
        return view('nasiarab.show',compact('title','modelNasiarab','request'));
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
		if(!PermissionHelper::hasNasiarabEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $modelNasiarab = Products::findOrFail($id);    
        $product_categories=\App\ProductCategory::pluck('name','id');
        $food_group_list=\App\FoodGroup::pluck('name','id');
		
        return view('nasiarab.edit',compact('modelNasiarab','request','product_categories','food_group_list'));
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
		if(!PermissionHelper::hasNasiarabEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $data = $request->all();
        $modelNasiarab = Products::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('products')->ignore($modelNasiarab->id),
				],
                'price' => 'required',
                'description' => 'required|max:65535',
                //'image' => 'required|max:65535',
                'product_category' => 'required',
                'pax_no' => 'required',
                'has_condiments' => 'required',
			]);     
        //Rule::unique('nasiarabs')->ignore($modelNasiarab->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        if($request->filepath!=null)
        {
            $dirName="public/uploads/nasiarab";
            $file=$request->filepath->store($dirName);
            $modelNasiarab->image_path= $file;
            //unlink prev image
            
        }
       
        $modelNasiarab -> fill($data);
        $modelNasiarab->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("products",$modelNasiarab->getKey(),$modelNasiarab->toArray());
        $modelNasiarab -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("nasiarab"));	
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
		if(!PermissionHelper::hasNasiarabDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}		*/

		$modelNasiarab = Products::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("products",$modelNasiarab->getKey(),$modelNasiarab->toArray());
		$modelNasiarab->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("nasiarab"));		 
	}

    
}
