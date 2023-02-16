<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Chemical;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;
use App\Laboratory;
use App\Staff;
use App\File;

class ChemicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		// if(!PermissionHelper::hasChemicalView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }
		
        $title=__('general.title_index').__('general.chemical');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','item_name','item_brand','item_cas','item_catalog','item_location','item_price','item_quantity','item_amount','item_supplier','date_opened','expiration_date','staff_id','item_sheet',];
            foreach($fields as $key => $field){
                $language = 'chemical.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'chemical.chemical','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Chemical::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('chemical.index', compact('title'));
        }
    }
    public function indexLaboratory(Request $request,$laboratoryid,$type="html" )
    {
		// if(!PermissionHelper::hasChemicalView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }
		
        $title=__('general.title_index').__('general.chemical');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=['id','item_name','item_brand','item_cas','item_catalog','item_location','item_price','item_quantity','item_amount','item_supplier','date_opened','expiration_date','staff_id','item_sheet',];
            foreach($fields as $key => $field){
                $language = 'chemical.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'chemical.chemical','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Chemical::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
            $laboratoryname=Laboratory::find($laboratoryid)->name;
			$title="Chemical list for laboratory : ".$laboratoryname;
			return view('chemical.indexLaboratory', compact('title','laboratoryid'));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=Chemical::query();
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }
    private function getIndexDataLaboratory(Request $request,$laboratoryid){
        $dataModels=Chemical::where('laboratory_id',$laboratoryid);
        $dataTableModels= $this->returnindexAjaxLaboratory($request,$dataModels); 
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
        // ->addColumn('item_sheet', function($query) use($request){
        //     return $query->getFile->name;
        // })
        ->addColumn('laboratory_id', function($query) use($request){
            return $query->getLaboratory->name;
        })
        ->addColumn('staff_id', function($query) use($request){
            return $query->getStaff->name;
        })
		->addColumn('action', function($query) use($request){
            $buttonViewPdf='';
            $itemsheet=File::where('chemical_id',$query->getKey())->first(); 
            if($itemsheet!=null)
            {
            $buttonViewPdf="<a target='_blank' title='Papar' type='button' class='btn btn-xs btn-primary' href='".asset('storage/'.$itemsheet->file_path)."'><i class='fa fa-file'></i></a>";            
            }   
            $buttonUpload = "<a title='Upload' type='button' class='btn btn-xs btn-success' href='".url('chemical/'.$query->getKey())."/uploadform'><i class='fa fa-upload'></i></a>";
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('chemical/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('chemical/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('chemical.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			// if(!PermissionHelper::hasChemicalView(false)){
			// 	$buttonView='';
			// }

			// if(!PermissionHelper::hasChemicalEdit(false)){
			// 	$buttonEdit='';
			// }

			// if(!PermissionHelper::hasChemicalDelete(false)){
			// 	$buttonDelete='';
			// }				
				
			return $buttonUpload.' '.$buttonView.' '.$buttonEdit.' '.$buttonDelete.' '.$buttonViewPdf;
		});
        
        return $modelDatatables;
	}
    public function returnindexAjaxLaboratory(Request $request,$dataModels) {
		$modelDatatables = Datatables::of($dataModels)
		// ->orderColumn('id', '-id $1')
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
        ->addColumn('staff_id', function($query) use($request){
            return $query->getStaff->name;
        })
		->addColumn('action', function($query) use($request){
            $buttonViewPdf='';
            $itemsheet=File::where('chemical_id',$query->getKey())->first(); 
            if($itemsheet!=null)
            {
            $buttonViewPdf="<a target='_blank' title='Papar' type='button' class='btn btn-xs btn-primary' href='".asset('storage/'.$itemsheet->file_path)."'><i class='fa fa-file'></i></a>";            
            }   
            $buttonUpload = "<a title='Upload' type='button' class='btn btn-xs btn-success' href='".url('chemical/'.$query->getKey())."/uploadform'><i class='fa fa-upload'></i></a>";
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('chemical/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('chemical/'.$query->getKey())."/chemicalbylab/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('chemical.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			// if(!PermissionHelper::hasChemicalView(false)){
			// 	$buttonView='';
			// }

			// if(!PermissionHelper::hasChemicalEdit(false)){
			// 	$buttonEdit='';
			// }

			// if(!PermissionHelper::hasChemicalDelete(false)){
			// 	$buttonDelete='';
			// }				
				
			return $buttonUpload.' '.$buttonView.' '.$buttonEdit.' '.$buttonDelete.' '.$buttonViewPdf;
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
    public function indexAjaxLaboratory(Request $request, $laboratoryid) {
		$dataTableModels=$this->getIndexDataLaboratory($request, $laboratoryid);
        return $dataTableModels->make(true);
    }
    
	/**
     * Display create form of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		// if(!PermissionHelper::hasChemicalCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelChemical = new Chemical();
		$laboratory_list = Laboratory::pluck('name','id');
        $staff_list = Staff::pluck('name','id');
        return view('chemicalgeneral.create',compact('modelChemical','request','laboratory_list','staff_list'));
    }
    public function createbylab(Request $request, $laboratoryid)
    {
		// if(!PermissionHelper::hasChemicalCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelChemical = new Chemical();
		$staff_list = Staff::pluck('name','id');
        return view('chemical.create',compact('modelChemical','request','laboratoryid','staff_list' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		// if(!PermissionHelper::hasChemicalCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'item_name' => 'required|unique:chemicals|max:64',
																					'item_brand' => 'required|max:64',
																					'item_cas' => 'required|max:64',
														'item_catalog' => 'required|unique:chemicals|max:64',
																					'item_location' => 'required|max:254',
																					'item_price' => 'required',
																					'item_quantity' => 'required',
																					'item_amount' => 'required',
																					'item_supplier' => 'required|max:254',
																					'date_opened' => 'required',
																					'expiration_date' => 'required',
																					'staff_id' => 'required',
																					
									        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        // $fileName = time().'.'.$request->file->extension();  
        // $request->file->move(public_path('uploads'), $fileName);

        $modelChemical = new Chemical();
        $modelChemical->fill($data);
        //$modelChemical->id = Convert::uuid('chemicals');
		$modelChemical->created_by = Auth::user()->getKey();

        $modelChemical->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("chemicals",$modelChemical->getKey(),$modelChemical->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("chemical")."/".$modelChemical->getKey());
        // ->with('success','You have successfully upload file.')
        // ->with('file', $fileName);
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		// if(!PermissionHelper::hasChemicalView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelChemical = Chemical::findOrFail($id); 
        $title=__('chemical.title_show').__('chemical.title');
        return view('chemical.show',compact('title','modelChemical','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
		// if(!PermissionHelper::hasChemicalEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelChemical = Chemical::findOrFail($id);    
		$laboratory_list = Laboratory::pluck('name','id');
        $staff_list = Staff::pluck('name','id');

        return view('chemicalgeneral.edit',compact('modelChemical','request','laboratory_list','staff_list'));
    }
    public function editbylab(Request $request, $id)
    {
		// if(!PermissionHelper::hasChemicalEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelChemical = Chemical::findOrFail($id);    
		$staff_list = Staff::pluck('name','id');

        return view('chemical.edit',compact('modelChemical','request','staff_list'));
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
		// if(!PermissionHelper::hasChemicalEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        $modelChemical = Chemical::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'item_name' => [
					'required',
					Rule::unique('chemicals')->ignore($modelChemical->id),
				],
			 						 									'item_brand' => 'required|max:64',
													 									'item_cas' => 'required|max:64',
													 					'item_catalog' => 'required|unique:chemicals|max:64',
													 									'item_location' => 'required|max:254',
													 									'item_price' => 'required',
													 									'item_quantity' => 'required',
													 									'item_amount' => 'required',
													 									'item_supplier' => 'required|max:254',
													 									'date_opened' => 'required',
													 									'expiration_date' => 'required',
													 									'staff_id' => 'required',
													 					                
										        ]);     
        //Rule::unique('chemicals')->ignore($modelChemical->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $modelChemical -> fill($data);
        $modelChemical->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("chemicals",$modelChemical->getKey(),$modelChemical->toArray());
        $modelChemical -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("chemical"));	
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
		// if(!PermissionHelper::hasChemicalDelete()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }		

		$modelChemical = Chemical::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("chemicals",$modelChemical->getKey(),$modelChemical->toArray());
		$modelChemical->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("chemical"));		 
	}
}
