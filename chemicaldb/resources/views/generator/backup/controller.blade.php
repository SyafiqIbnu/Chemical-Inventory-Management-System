namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{{$modelName}};
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Auth;

class {{$controllerName}} extends Controller
{
    public function index(Request $request,$type="html")
    {
        $models= {{$modelName}}::all();
        $title=__('{{$name}}.{{$name}}');
        $fields={!!$fields!!};
        $headings = array({!!$headers!!});
        $templates=array('html'=>'{{$name}}.{{$name}}','pdf'=>'exportlist.adminpdf');
        $results=$models;
        $vars=compact('request','results','models','title','product','fields','headings','templates');
        return \App\Classes\DPExportListHelper::showReport($type,$vars);
    }
    
    public function show(Request $request,$id)
    {
        $model = {{$modelName}}::findOrFail($id);        
        return view('{{$name}}.show',compact('model','request'));
    }
    
    public function create(Request $request)
    {
        $model = new {{$modelName}}();
        return view('{{$name}}.create',compact('model','request'));
    }

    public function store(Request $request)
    {
        $data = Input::all();
        $validator = Validator::make($request->all(), 
        [
        @foreach($filteredColumns as $col)
        @if ($loop->first)'{{$col->COLUMN_NAME}}' => 'required|unique:{{$table}}|max:255',
        @else'{{$col->COLUMN_NAME}}' => 'required|max:255', @endif 
            @endforeach]);
        
        if ($validator->fails()) {
            return redirect(url('{{$newpath}}/create'))
                        ->withErrors($validator)
                        ->withInput();
        }
	
        $model = new {{$modelName}}();
        $model->fill($data);
		$model->created_by=Auth::user()->id;
        $model->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("{{$table}}",$model->id,$data);
        return $this->showRecordSaved($request);
    }

    public function edit(Request $request,$id)
    {
        $model = {{$modelName}}::findOrFail($id);        
        return view('{{$name}}.edit',compact('model','request'));
    }

    public function update(Request $request, $id)
    {
        $data = Input::all();
        $model = {{$modelName}}::findOrFail($id);        
        $validator = Validator::make($request->all(), 
        [
    @foreach($filteredColumns as $col)
    @if ($loop->first)'{{$col->COLUMN_NAME}}' => ['required',Rule::unique('{{$table}}')->ignore($model->id),],
    @else'{{$col->COLUMN_NAME}}' => 'required|max:255',
    @endif
    @endforeach]);
        
        if ($validator -> fails()) {
            return redirect(url('{{$newpath}}/$id/edit'))
            ->withErrors($validator)
            ->withInput();
        }
       
        $model -> fill($data);
        \App\Classes\AuditTrailHelper::logAuditUpdate("{{$table}}",$model->id,$data);
        $model->updated_by=Auth::user()->id;
	$model -> save();

        return $this->showRecordSaved($request);
    }

    public function showRecordSaved(Request $request)
    {
        return view('{{$name}}.success',compact('request'));
    }
	
    public function destroy(Request $request, $id)
    {
        $model = {{$modelName}}::findOrFail($id);   
        $model->delete();
        return view('{{$name}}.success',compact('request'));		 
    }
}
