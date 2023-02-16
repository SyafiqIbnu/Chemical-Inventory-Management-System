namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\{{$modelName}};
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class {{$controllerName}} extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::has{{$modelName}}View()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.{{$name}}');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields={!!$fields!!};
            foreach($fields as $key => $field){
                $language = '{{$name}}.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'{{$name}}.{{$name}}','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = {{$modelName}}::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			{!!$dropDrownListData!!}
			return view('{{$name}}.index', compact('title' {!!$dropDrownListDataCompact!!}));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return Datatable
     */
	private function getIndexData(Request $request){
        $dataModels={{$modelName}}::query();
        $dataTableModels= $this->returnindexAjax($request,$dataModels); 
        return $dataTableModels;
    }

	/**
     * return data of the resource in datatable format
     *
     * @return Datatable
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
			$buttonView = "<a title='{{__('general.view')}}' type='button' class='btn btn-xs btn-info' href='".url('{!!$name!!}/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='{{__('general.edit')}}' type='button' class='btn btn-xs btn-warning' href='".url('{!!$name!!}/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='{{__('general.delete')}}' data-modal data-route='". route('{{$name}}.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::has{{$modelName}}View(false)){
				$buttonView='';
			}

			if(!PermissionHelper::has{{$modelName}}Edit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::has{{$modelName}}Delete(false)){
				$buttonDelete='';
			}				
				
			return $buttonView.' '.$buttonEdit.' '.$buttonDelete;
		});
        
        return $modelDatatables;
	}

	/**
     * Get a listing of the resource using ajax
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAjax(Request $request) {
		$dataTableModels=$this->getIndexData($request);
        return $dataTableModels->make(true);
    }

	/**
     * Display create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		if(!PermissionHelper::has{{$modelName}}Create()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $model{{$modelName}} = new {{$modelName}}();
		{!!$dropDrownListData!!}
        return view('{{$name}}.create',compact('model{{$modelName}}','request' {!!$dropDrownListDataCompact!!}));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::has{{$modelName}}Create()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
		@foreach($filteredColumns as $col)
			@if ($loop->first)
				@if($col->CHARACTER_MAXIMUM_LENGTH !=null)
					'{{$col->COLUMN_NAME}}' => 'required|unique:{{$table}}|max:{{$col->CHARACTER_MAXIMUM_LENGTH}}',
				@else
					'{{$col->COLUMN_NAME}}' => 'required|unique:{{$table}}',
				@endif
			@else
				@if($col->CHARACTER_MAXIMUM_LENGTH !=null)
					'{{$col->COLUMN_NAME}}' => 'required|max:{{$col->CHARACTER_MAXIMUM_LENGTH}}',
				@else
					'{{$col->COLUMN_NAME}}' => 'required',
				@endif
			@endif
		@endforeach
        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $model{{$modelName}} = new {{$modelName}}();
        $model{{$modelName}}->fill($data);
        //$model{{$modelName}}->id = Convert::uuid('{{$table}}');
		$model{{$modelName}}->created_by = Auth::user()->getKey();
        $model{{$modelName}}->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("{{$table}}",$model{{$modelName}}->getKey(),$model{{$modelName}}->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("{{$name}}")."/".$model{{$modelName}}->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::has{{$modelName}}View()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $model{{$modelName}} = {{$modelName}}::findOrFail($id); 
        $title=__('{{$name}}.title_show').__('{{$name}}.title');
        return view('{{$name}}.show',compact('title','model{{$modelName}}','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::has{{$modelName}}Edit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $model{{$modelName}} = {{$modelName}}::findOrFail($id);    
		{!!$dropDrownListData!!}
        return view('{{$name}}.edit',compact('model{{$modelName}}','request' {!!$dropDrownListDataCompact!!}));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		if(!PermissionHelper::has{{$modelName}}Edit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $model{{$modelName}} = {{$modelName}}::findOrFail($id);        
        $validator = Validator::make($request->all(), [
			@foreach($filteredColumns as $col)
			 @if ($loop->first)
				'{{$col->COLUMN_NAME}}' => [
					'required',
					Rule::unique('{{$table}}')->ignore($model{{$modelName}}->id),
				],
			 @else
				@if($col->CHARACTER_MAXIMUM_LENGTH !=null)
					'{{$col->COLUMN_NAME}}' => 'required|max:{{$col->CHARACTER_MAXIMUM_LENGTH}}',
				@else
					'{{$col->COLUMN_NAME}}' => 'required',
				@endif
			@endif
			@endforeach
        ]);     
        //Rule::unique('{{$table}}')->ignore($model{{$modelName}}->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $model{{$modelName}} -> fill($data);
        $model{{$modelName}}->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("{{$table}}",$model{{$modelName}}->getKey(),$model{{$modelName}}->toArray());
        $model{{$modelName}} -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("{{$name}}"));	
    }
	
	/**
     * Delete the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy(Request $request, $id)
	{
		if(!PermissionHelper::has{{$modelName}}Delete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$model{{$modelName}} = {{$modelName}}::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("{{$table}}",$model{{$modelName}}->getKey(),$model{{$modelName}}->toArray());
		$model{{$modelName}}->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("{{$name}}"));		 
	}
}
