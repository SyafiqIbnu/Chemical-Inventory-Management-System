namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\<?php echo e($modelName); ?>;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;

class <?php echo e($controllerName); ?> extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::has<?php echo e($modelName); ?>View()){
			abort(403, __('general.unauthorizedAction.'));
		}
		
        $title=__('general.title_index').__('general.<?php echo e($name); ?>');
		if(in_array($type,['excel','pdf'])){
		    $request->merge(['start' => null, 'length' => null]);
            $fields=<?php echo $fields; ?>;
            foreach($fields as $key => $field){
                $language = '<?php echo e($name); ?>.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'<?php echo e($name); ?>.<?php echo e($name); ?>','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
			//$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = <?php echo e($modelName); ?>::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			<?php echo $dropDrownListData; ?>

			return view('<?php echo e($name); ?>.index', compact('title' <?php echo $dropDrownListDataCompact; ?>));
        }
    }
    
	/**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
	private function getIndexData(Request $request){
        $dataModels=<?php echo e($modelName); ?>::query();
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
			$buttonView = "<a title='<?php echo e(__('general.view')); ?>' type='button' class='btn btn-xs btn-info' href='".url('<?php echo $name; ?>/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='<?php echo e(__('general.edit')); ?>' type='button' class='btn btn-xs btn-warning' href='".url('<?php echo $name; ?>/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='<?php echo e(__('general.delete')); ?>' data-modal data-route='". route('<?php echo e($name); ?>.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::has<?php echo e($modelName); ?>View(false)){
				$buttonView='';
			}

			if(!PermissionHelper::has<?php echo e($modelName); ?>Edit(false)){
				$buttonEdit='';
			}

			if(!PermissionHelper::has<?php echo e($modelName); ?>Delete(false)){
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
		if(!PermissionHelper::has<?php echo e($modelName); ?>Create()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $model<?php echo e($modelName); ?> = new <?php echo e($modelName); ?>();
		<?php echo $dropDrownListData; ?>

        return view('<?php echo e($name); ?>.create',compact('model<?php echo e($modelName); ?>','request' <?php echo $dropDrownListDataCompact; ?>));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(!PermissionHelper::has<?php echo e($modelName); ?>Create()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
		<?php $__currentLoopData = $filteredColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($loop->first): ?>
				<?php if($col->CHARACTER_MAXIMUM_LENGTH !=null): ?>
					'<?php echo e($col->COLUMN_NAME); ?>' => 'required|unique:<?php echo e($table); ?>|max:<?php echo e($col->CHARACTER_MAXIMUM_LENGTH); ?>',
				<?php else: ?>
					'<?php echo e($col->COLUMN_NAME); ?>' => 'required|unique:<?php echo e($table); ?>',
				<?php endif; ?>
			<?php else: ?>
				<?php if($col->CHARACTER_MAXIMUM_LENGTH !=null): ?>
					'<?php echo e($col->COLUMN_NAME); ?>' => 'required|max:<?php echo e($col->CHARACTER_MAXIMUM_LENGTH); ?>',
				<?php else: ?>
					'<?php echo e($col->COLUMN_NAME); ?>' => 'required',
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]);
        
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
        
        $model<?php echo e($modelName); ?> = new <?php echo e($modelName); ?>();
        $model<?php echo e($modelName); ?>->fill($data);
        //$model<?php echo e($modelName); ?>->id = Convert::uuid('<?php echo e($table); ?>');
		$model<?php echo e($modelName); ?>->created_by = Auth::user()->getKey();
        $model<?php echo e($modelName); ?>->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("<?php echo e($table); ?>",$model<?php echo e($modelName); ?>->getKey(),$model<?php echo e($modelName); ?>->toArray());
        
        Session::flash('success', __('general.success_create'));
        return redirect(url("<?php echo e($name); ?>")."/".$model<?php echo e($modelName); ?>->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
	
		if(!PermissionHelper::has<?php echo e($modelName); ?>View()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $model<?php echo e($modelName); ?> = <?php echo e($modelName); ?>::findOrFail($id); 
        $title=__('<?php echo e($name); ?>.title_show').__('<?php echo e($name); ?>.title');
        return view('<?php echo e($name); ?>.show',compact('title','model<?php echo e($modelName); ?>','request'));
    }

	/**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::has<?php echo e($modelName); ?>Edit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $model<?php echo e($modelName); ?> = <?php echo e($modelName); ?>::findOrFail($id);    
		<?php echo $dropDrownListData; ?>

        return view('<?php echo e($name); ?>.edit',compact('model<?php echo e($modelName); ?>','request' <?php echo $dropDrownListDataCompact; ?>));
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
		if(!PermissionHelper::has<?php echo e($modelName); ?>Edit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $model<?php echo e($modelName); ?> = <?php echo e($modelName); ?>::findOrFail($id);        
        $validator = Validator::make($request->all(), [
			<?php $__currentLoopData = $filteredColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 <?php if($loop->first): ?>
				'<?php echo e($col->COLUMN_NAME); ?>' => [
					'required',
					Rule::unique('<?php echo e($table); ?>')->ignore($model<?php echo e($modelName); ?>->id),
				],
			 <?php else: ?>
				<?php if($col->CHARACTER_MAXIMUM_LENGTH !=null): ?>
					'<?php echo e($col->COLUMN_NAME); ?>' => 'required|max:<?php echo e($col->CHARACTER_MAXIMUM_LENGTH); ?>',
				<?php else: ?>
					'<?php echo e($col->COLUMN_NAME); ?>' => 'required',
				<?php endif; ?>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]);     
        //Rule::unique('<?php echo e($table); ?>')->ignore($model<?php echo e($modelName); ?>->id),
		
        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
       
        $model<?php echo e($modelName); ?> -> fill($data);
        $model<?php echo e($modelName); ?>->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("<?php echo e($table); ?>",$model<?php echo e($modelName); ?>->getKey(),$model<?php echo e($modelName); ?>->toArray());
        $model<?php echo e($modelName); ?> -> save();
        Session::flash('success', __('general.success_update'));
		return redirect(url("<?php echo e($name); ?>"));	
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
		if(!PermissionHelper::has<?php echo e($modelName); ?>Delete()){
			abort(403, __('general.unauthorizedAction.'));
		}		

		$model<?php echo e($modelName); ?> = <?php echo e($modelName); ?>::findOrFail($id);
		\App\Classes\AuditTrailHelper::logAuditDelete("<?php echo e($table); ?>",$model<?php echo e($modelName); ?>->getKey(),$model<?php echo e($modelName); ?>->toArray());
		$model<?php echo e($modelName); ?>->delete();
        
        Session::flash('success', __('general.success_deletes'));
		return redirect(url("<?php echo e($name); ?>"));		 
	}
}
<?php /**PATH D:\xampp\htdocs\chemicaldb\resources\views/generator/controller.blade.php ENDPATH**/ ?>