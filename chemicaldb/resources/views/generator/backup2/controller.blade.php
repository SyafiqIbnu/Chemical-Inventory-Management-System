namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use App\{{$modelName}};
use App\Helpers\Convert;
use App\Traits\Authorizable;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;

class {{$controllerName}} extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        $title=__('{{$name}}.title_index').__('{{$name}}.title');
        if($request->ajax()){
            $modelDatatables = $this->ajax($request,'index');
            return $modelDatatables->make(true);
        }elseif(in_array($request->action,['excel','pdf'])){
            $type = $request->action;
            $request->merge(['start' => null, 'length' => null]);
            $fields={!!$fields!!};
            foreach($fields as $key => $field){
                $language = '{{$name}}.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'{{$name}}.{{$name}}','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->ajax($request,'index');
            $results = {{$modelName}}::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
            return view('{{$name}}.index', compact('title'));
        }
    }
    
    public function ajax($request, $method) {
        if ($method == 'index') {
            $modelDatatables = Datatables::of({{$modelName}}::query())
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
                    Auth::user()->can('view_functional_{{$name}}') ?
                        $buttonView = "<a title='View & Edit Detail' type='button' class='btn btn-xs btn-edit' href='".url($request->path().'/'.$query->getKey())."'><i class='fa fa-eye'></i></a>"
                        : $buttonView = '';
                    Auth::user()->can('delete_functional_{{$name}}') ?
                        $buttonDelete = "<a data-modal data-route='". route('{{$name}}.destroy', $query->getKey()) ."' 
                            data-toggle='modal' data-target='#modal-delete' 
                            type='button' class='btn btn-xs btn-danger'><i class='fa fa-eraser'></i>
                        </a>"
                        : $buttonDelete = '';
                      return $buttonView.' '.$buttonDelete;
                });
        }
        return $modelDatatables;
    }

    public function create(Request $request)
    {
        $model{{$modelName}} = new {{$modelName}}();
        return view('{{$name}}.create',compact('model{{$modelName}}','request'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Input::all();
        $validator = Validator::make($request->all(), [
			@foreach($filteredColumns as $col)
		    @if ($loop->first)
				'{{$col->COLUMN_NAME}}' => 'required|unique:{{$table}}|max:255',
			@else
				'{{$col->COLUMN_NAME}}' => 'required|max:255',
			@endif
			
            
			@endforeach
        ]);
        
        if ($validator->fails()) {
            return redirect(url("{{$name}}"))
                        ->withErrors($validator)
                        ->withInput();
        }
        
		
        $model{{$modelName}} = new {{$modelName}}();
        $model{{$modelName}}->fill($data);
        $model{{$modelName}}->id = Convert::uuid('{{$table}}');
	$model{{$modelName}}->created_by = Auth::user()->getKey();
        $model{{$modelName}}->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("{{$table}}",$model{{$modelName}}->getKey(),$model{{$modelName}}->toArray());
        
        Session::flash('success', 'Successfully Created');
        return redirect(url("{{$name}}")."/".$model{{$modelName}}->getKey());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request,$id)
    {
        $model{{$modelName}} = {{$modelName}}::findOrFail($id); 
        $title=__('{{$name}}.title_show').__('{{$name}}.title');
        return view('{{$name}}.show',compact('title','model{{$modelName}}','request'));
    }

    public function edit(Request $request,$id)
    {
        $model{{$modelName}} = {{$modelName}}::findOrFail($id);        
        return view('{{$name}}.edit',compact('model{{$modelName}}','request'));
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
        $data = Input::all();
        $model{{$modelName}} = {{$modelName}}::findOrFail($id);        
        $validator = Validator::make($request->all(), [
			@foreach($filteredColumns as $col)
			 @if ($loop->first)
				'{{$col->COLUMN_NAME}}' => [
					'required',
					Rule::unique('{{$table}}')->ignore($model{{$modelName}}->id),
				],
			 @else
				'{{$col->COLUMN_NAME}}' => 'required|max:255',
			@endif
			@endforeach
        ]);     
        //Rule::unique('{{$table}}')->ignore($model{{$modelName}}->id),
		
        if ($validator -> fails()) {
            return redirect(url("{{$name}}/$id"))
                        ->withErrors($validator)
                        ->withInput();
        }
       
        $model{{$modelName}} -> fill($data);
        $model{{$modelName}}->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("{{$table}}",$model{{$modelName}}->getKey(),$model{{$modelName}}->toArray());
        $model{{$modelName}} -> save();
        Session::flash('success', 'Successfully Updated');
        return back();
    }
	
	public function destroy(Request $request, $id){
		 $model{{$modelName}} = {{$modelName}}::findOrFail($id);
                 \App\Classes\AuditTrailHelper::logAuditDelete("{{$table}}",$model{{$modelName}}->getKey(),$model{{$modelName}}->toArray());
		 $model{{$modelName}}->delete();
		 Session::flash('success', 'Successfully Deleted');
                return redirect(url("{{$name}}"));		 
	}
}
