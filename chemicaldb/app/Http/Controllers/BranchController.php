<?php
namespace App\Http\Controllers;

use App\Branch;
use Auth;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use \App\Helpers\PermissionHelper;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request, $type = "html")
    {
        if (!PermissionHelper::hasBranchView()) {
            abort(403, __('general.unauthorizedAction.'));
        }

        $title = __('general.title_index') . __('general.branch');
        if (in_array($type, ['excel', 'pdf'])) {
            $request->merge(['start' => null, 'length' => null]);
            $fields = ['name'];
            foreach ($fields as $key => $field) {
                $language = 'branch.' . $field;
                $headings[$key] = __($language);
            }
            $templates = array('html' => 'branch.branch', 'pdf' => 'layouts.components.export_pdf');
            $modelDatatables = $this->getIndexData($request);
            //$results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $results = Branch::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars = compact('results', 'title', 'fields', 'headings', 'templates');
            return \App\Classes\DPExportListHelper::showReport($type, $vars);
        } else {
            $state_id_list = \App\State::all()->pluck('name', 'id');

            return view('branch.index', compact('title', 'state_id_list'));
        }
    }

    /**
     * Get a listing data of the resource
     *
     * @return  Datatable
     */
    private function getIndexData(Request $request)
    {
        $dataModels = Branch::query()->with('state');
        $dataTableModels = $this->returnindexAjax($request, $dataModels);
        return $dataTableModels;
    }

    /**
     * return data of the resource in datatable format
     *
     * @return  Datatable
     */
    public function returnindexAjax(Request $request, $dataModels)
    {
        $modelDatatables = Datatables::of($dataModels)
            ->orderColumn('id', '-id $1')
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if (!empty($request->input('f_start_date'))) {
                    $request->f_start_date = Carbon::createFromFormat("d/m/Y", $request->f_start_date)->toDateString();
                    $query->where('created_at', '>=', $request->f_start_date);
                }
                if (!empty($request->input('f_end_date'))) {
                    $request->f_end_date = Carbon::createFromFormat("d/m/Y", $request->f_end_date)->toDateString();
                    $query->where('created_at', '<=', $request->f_end_date);
                }
            }, true)
            ->editColumn('state_id', function ($query) use ($request) {
                return $query->state->name;
            })
           
            ->addColumn('action', function ($query) use ($request) {
                $buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='" . url('branch/' . $query->getKey()) . "'><i class='fa fa-eye'></i></a>";
                $buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='" . url('branch/' . $query->getKey()) . "/edit'><i class='fa fa-pencil'></i></a>";
                $buttonDelete = "<a title='Padam' data-modal data-route='" . route('branch.destroy', $query->getKey()) . "'
					data-toggle='modal' data-target='#modal-delete'
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

                if (!PermissionHelper::hasBranchView(false)) {
                    $buttonView = '';
                }

                if (!PermissionHelper::hasBranchEdit(false)) {
                    $buttonEdit = '';
                }

                if (!PermissionHelper::hasBranchDelete(false)) {
                    $buttonDelete = '';
                }

                return $buttonView . ' ' . $buttonEdit . ' ' . $buttonDelete;
            });

        return $modelDatatables;
    }

    /**
     * Get a listing of the resource using ajax
     *
     * @return  \Illuminate\Http\Response
     */
    public function indexAjax(Request $request)
    {
        $dataTableModels = $this->getIndexData($request);
        return $dataTableModels->make(true);
    }

    /**
     * Display create form of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!PermissionHelper::hasBranchCreate()) {
            abort(403, __('general.unauthorizedAction.'));
        }

        $modelBranch = new Branch();
        $state_id_list = \App\State::all()->pluck('name', 'id');

        return view('branch.create', compact('modelBranch', 'request', 'state_id_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!PermissionHelper::hasBranchCreate()) {
            abort(403, __('general.unauthorizedAction.'));
        }

        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }

        $modelBranch = new Branch();
        $modelBranch->fill($data);
        //$modelBranch->id = Convert::uuid('branches');
        $modelBranch->created_by = Auth::user()->getKey();
        $modelBranch->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("branches", $modelBranch->getKey(), $modelBranch->toArray());

        Session::flash('success', __('general.success_create'));
        return redirect(url("branch") . "/" . $modelBranch->getKey());
    }

    /**
     * Show info of the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        if (!PermissionHelper::hasBranchView()) {
            abort(403, __('general.unauthorizedAction.'));
        }

        $modelBranch = Branch::findOrFail($id);
        $title = __('branch.title_show') . __('branch.title');
        return view('branch.show', compact('title', 'modelBranch', 'request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (!PermissionHelper::hasBranchEdit()) {
            abort(403, __('general.unauthorizedAction.'));
        }

        $modelBranch = Branch::findOrFail($id);
        $state_id_list = \App\State::all()->pluck('name', 'id');

        return view('branch.edit', compact('modelBranch', 'request', 'state_id_list'));
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
        if (!PermissionHelper::hasBranchEdit()) {
            abort(403, __('general.unauthorizedAction.'));
        }

        $data = $request->all();
        $modelBranch = Branch::findOrFail($id);
        $validator = Validator::make($request->all(), [
            /*
            'code' => [
                'required',
                Rule::unique('branches')->ignore($modelBranch->id),
            ],*/
            'name' => 'required|max:255',
            
        ]);
        //Rule::unique('branches')->ignore($modelBranch->id),

        if ($validator->fails()) {
            return back()->withErrors($validator)
                ->withInput();
        }

        $modelBranch->fill($data);
        $modelBranch->updated_by = Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("branches", $modelBranch->getKey(), $modelBranch->toArray());
        $modelBranch->save();
        Session::flash('success', __('general.success_update'));
        return redirect(url("branch"));
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
        if (!PermissionHelper::hasBranchDelete()) {
            abort(403, __('general.unauthorizedAction.'));
        }

        $modelBranch = Branch::findOrFail($id);
        \App\Classes\AuditTrailHelper::logAuditDelete("branches", $modelBranch->getKey(), $modelBranch->toArray());
        $modelBranch->delete();

        Session::flash('success', __('general.success_deletes'));
        return redirect(url("branch"));
    }
}
