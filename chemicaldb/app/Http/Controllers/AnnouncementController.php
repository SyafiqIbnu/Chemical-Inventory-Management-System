<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Announcement;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use App\Helpers\PermissionHelper;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
		if(!PermissionHelper::hasAnnouncementView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $title=__('general.title_index').__('general.announcement');
		if(in_array($request->action,['excel','pdf'])){
            $type = $request->action;
            $request->merge(['start' => null, 'length' => null]);
            $fields=['id','title','content','active',];
            foreach($fields as $key => $field){
                $language = 'announcement.'.$field;
                $headings[$key] = __($language);
            }
            $templates=array('html'=>'announcement.announcement','pdf'=>'layouts.components.export_pdf');
            $modelDatatables = $this->ajax($request,'index');
            $results = Announcement::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{
			
			return view('announcement.index', compact('title' ));
        }
    }
    
    public function indexAjax(Request $request,$filterId=null) {
        $qs=Announcement::query();
        if($filterId !=null){
            $qs=$qs->where('announcements.id',$filterId);
        }
		$modelDatatables = Datatables::of($qs)
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
        ->editColumn('content', function($query) use($request){
            $anc_content=str_ireplace("\n","<br>",$query->content);
            $anc_content=str_ireplace("\r\n","<br>",$anc_content);
            return  $anc_content;
        })
        ->editColumn('active', function($query) use($request){
			//return 'OK';
			return \App\Classes\ValueLabelHelper::getActiveLabel($query->active);
        })
		->addColumn('action', function($query) use($request){
			$buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('announcement/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
			$buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('announcement/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
			$buttonDelete = "<a title='Padam' data-modal data-route='". route('announcement.destroy', $query->getKey()) ."' 
					data-toggle='modal' data-target='#modal-delete' 
					type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
			</a>";

			if(!PermissionHelper::hasAnnouncementView()){
				$buttonView='';
			}

			if(!PermissionHelper::hasAnnouncementEdit()){
				$buttonEdit='';
			}

			if(!PermissionHelper::hasAnnouncementDelete()){
				$buttonDelete='';
			}				
				
			return $buttonView.' '.$buttonEdit.' '.$buttonDelete;
		});
        
        if($filterId !=null){
            return $modelDatatables->results();
        }
        return $modelDatatables->make(true);
    }

    /**
     * Get active announcement list
     */
    public function getActiveList(Request $request){
        $dataList=Announcement::where('active',1)->orderby('updated_at','DESC')->get();
        return $dataList;
    }

    public function create(Request $request)
    {
		if(!PermissionHelper::hasAnnouncementCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelAnnouncement = new Announcement();
		
        return view('announcement.create',compact('modelAnnouncement','request' ));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if(!PermissionHelper::hasAnnouncementEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $validator = Validator::make($request->all(), [
														'title' => 'required|unique:announcements|max:255',
																					'content' => 'required|max:500',
																					'active' => 'required',
									        ]);
        
        if ($validator->fails()) {
            return redirect(url("announcement/create"))
                        ->withErrors($validator)
                        ->withInput();
        }
        
		
        $modelAnnouncement = new Announcement();
        $modelAnnouncement->fill($data);
        //$modelAnnouncement->id = Convert::uuid('announcements');
	    $modelAnnouncement->created_by = Auth::user()->getKey();
        $modelAnnouncement->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("announcements",$modelAnnouncement->getKey(),$modelAnnouncement->toArray());
        
        Session::flash('success', 'Successfully Created');
        return redirect(url("announcement")."/".$modelAnnouncement->getKey());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */

    public function show(Request $request,$id)
    {
		if(!PermissionHelper::hasAnnouncementView()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $result=$this->indexAjax($request,$id);
        $modelAnnouncement =$result[0];
        $modelAnnouncement->active=\App\Classes\ValueLabelHelper::getActiveLabel($modelAnnouncement->active);
        $title=__('announcement.title_show').__('announcement.title');
        return view('announcement.show',compact('title','modelAnnouncement','request'));
    }

    public function edit(Request $request,$id)
    {
		if(!PermissionHelper::hasAnnouncementEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $modelAnnouncement = Announcement::findOrFail($id);    
		
        return view('announcement.edit',compact('modelAnnouncement','request' ));
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
		if(!PermissionHelper::hasAnnouncementEdit()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        $modelAnnouncement = Announcement::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'title' => [
					'required',
					Rule::unique('announcements')->ignore($modelAnnouncement->id),
				],
			 						 									'content' => 'required|max:500',
													 									'active' => 'required',
										        ]);     
        //Rule::unique('announcements')->ignore($modelAnnouncement->id),
		
        if ($validator -> fails()) {
            return redirect(url("announcement/$id"))
                        ->withErrors($validator)
                        ->withInput();
        }
       
        $modelAnnouncement -> fill($data);
        $modelAnnouncement->updated_by=Auth::user()->getKey();
        \App\Classes\AuditTrailHelper::logAuditUpdate("announcements",$modelAnnouncement->getKey(),$modelAnnouncement->toArray());
        $modelAnnouncement -> save();
        Session::flash('success', 'Successfully Updated');
        return redirect(url("announcement"));		
    }
	
	public function destroy(Request $request, $id){
		if(!PermissionHelper::hasAnnouncementDelete()){
			abort(403, __('general.unauthorizedAction.'));
		}	

		 $modelAnnouncement = Announcement::findOrFail($id);
                 \App\Classes\AuditTrailHelper::logAuditDelete("announcements",$modelAnnouncement->getKey(),$modelAnnouncement->toArray());
		 $modelAnnouncement->delete();
		 Session::flash('success', 'Successfully Deleted');
                return redirect(url("announcement"));		 
	}
}
