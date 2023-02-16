<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;
use Exception;
use Hash;
use Google2FA;
use Google2FAQRCode;
use App\MailMessage;
use App\Helpers\SendMailMessage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
    //    if(!PermissionHelper::hasUserView()){
	// 		abort(403, __('general.unauthorizedAction.'));
	// 	}
        $title=__('general.title_index').__('general.user');
        $menu_active_id="menu-administration-user";
        $ajaxUrl=url('/user/indexAjax');
        //dd($ajaxUrl);

        $modelDatatables="";
        if(in_array($type,['excel','pdf'])){
            $modelDatatables = $this->getIndexData($request);
        }
        //dd($ajaxUrl);
        $template="user.index_all";
        return $this->returnIndexList($request,$type,$title,$modelDatatables,$ajaxUrl,$menu_active_id,$template); 
    }

    // public function indexSmartPartner(Request $request,$type="html")
    // {
    //    if(!PermissionHelper::hasUserView()){
	// 		abort(403, __('general.unauthorizedAction.'));
	// 	}
    //     $title=__('general.title_index').__('user.title').__(' Smart Partner');
    //     $menu_active_id="menu-administration-smartpartner";
    //     $ajaxUrl=url('/usersmartpartner/indexAjaxSmartPartner');
    //     dd($ajaxUrl);

    //     $modelDatatables="";
    //     if(in_array($type,['excel','pdf'])){
    //         $modelDatatables = $this->getIndexDataSmartPartner($request);
    //     }
    //     dd($ajaxUrl);
    //     $template="user.index_smartpartner";
    //     return $this->returnIndexList($request,$type,$title,$modelDatatables,$ajaxUrl,$menu_active_id,$template); 
    // }

    // public function indexAgent(Request $request,$type="html")
    // {
    //    if(!PermissionHelper::hasUserView()){
	// 		abort(403, __('general.unauthorizedAction.'));
	// 	}
    //     $title=__('general.title_index').__('user.title').__(' Agent');
    //     $menu_active_id="menu-administration-agent";
    //     $ajaxUrl=url('/useragent/indexAjaxAgent');
    //     dd($ajaxUrl);

    //     $modelDatatables="";
    //     if(in_array($type,['excel','pdf'])){
    //         $modelDatatables = $this->getIndexDataAgent($request);
    //     }
    //     dd($ajaxUrl);
    //     $template="user.index_agent";
    //     return $this->returnIndexList($request,$type,$title,$modelDatatables,$ajaxUrl,$menu_active_id,$template); 
    // }

    /**
     * Display list of admin
     */
    // public function indexDropship(Request $request,$type="html")
    // {
    //     // if(!PermissionHelper::hasUserView()){
	// 	// 	abort(403, __('general.unauthorizedAction.'));
	// 	// }
    //     $title=__('general.title_index').__('user.title').__(' Dropship');
    //     $menu_active_id="menu-administration-dropship";
    //     $ajaxUrl=url('/userdropship/indexAjaxDropship');

    //     $modelDatatables="";
    //     if(in_array($type,['excel','pdf'])){
    //         $modelDatatables = $this->getIndexDataDropship($request);
    //     }
    //     $template="user.index_dropship";
                
    //     return $this->returnIndexList($request,$type,$title,$modelDatatables,$ajaxUrl,$menu_active_id,$template);           
    // }


    // public function indexKitchen(Request $request,$type="html")
    // {
    //     // if(!PermissionHelper::hasUserView()){
	// 	// 	abort(403, __('general.unauthorizedAction.'));
	// 	// }
    //     $title=__('general.title_index').__('user.title').__(' Dropship');
    //     $menu_active_id="menu-administration-kitchen";
    //     $ajaxUrl=url('/userkitchen/indexAjaxKitchen');

    //     $modelDatatables="";
    //     if(in_array($type,['excel','pdf'])){
    //         $modelDatatables = $this->getIndexDataKitchen($request);
    //     }
    //     $template="user.index_kitchen";
                
    //     return $this->returnIndexList($request,$type,$title,$modelDatatables,$ajaxUrl,$menu_active_id,$template);           
    // }


    /**
     * Return index list. Shared for user list & admin list
     */
    private function returnIndexList(Request $request,$type,$title,$modelDatatables,$ajaxUrl,$menu_active_id,$template){
        //dd($ajaxUrl);
        if(in_array($type,['excel','pdf'])){
            $request->merge(['start' => null, 'length' => null]);
            $fields=['id','name','uid','email','mykad','phone',];
            foreach($fields as $key => $field){
                $language = 'user.'.$field;
                $headings[$key] = __($language);
            }

            //dd($modelDatatables);
            $templates=array('html'=>'user.user','pdf'=>'layouts.components.export_pdf');
           // $modelDatatables = $this->ajax($request,'index');
            $results = User::hydrate(array_get($modelDatatables->only($fields)->toArray(), 'data'));
            $vars=compact('results','title','fields','headings','templates','menu_active_id');
            return \App\Classes\DPExportListHelper::showReport($type,$vars);
        }else{			
            //dd($ajaxUrl);
			return view($template, compact('title','menu_active_id','ajaxUrl' ));
        }
    }
    

    /**
     * Get data for user list (ajax)
     * @return user list (ajax)
     */
    
    public function indexAjax(Request $request) {
        $dataTableModels=$this->getIndexData($request);
        return $dataTableModels->make(true);
    }
    //IndexAjaxChemical
    

    // public function indexAjaxSmartPartner(Request $request) {
    //     $dataTableModels=$this->getIndexDataSmartPartner($request);
    //     return $dataTableModels->make(true);
    // }

    // public function indexAjaxAgent(Request $request) {
    //     $dataTableModels=$this->getIndexDataAgent($request);
    //     return $dataTableModels->make(true);
    // }

    // public function indexAjaxDropship(Request $request) {
    //     $dataTableModels=$this->getIndexDataDropship($request);
    //     return $dataTableModels->make(true);
    // }

    // public function indexAjaxKitchen(Request $request) {
    //     $dataTableModels=$this->getIndexDataKitchen($request);
    //     return $dataTableModels->make(true);
    // }


    private function getIndexData(Request $request){
        $dataModels=User::query();
        
        $indexType="user";
        $dataTableModels= $this->returnindexAjax($request,$dataModels,$indexType); 
        return $dataTableModels;
    }
    //getIndexDataChemical
    
    // private function getIndexDataSmartPartner(Request $request){
    //     $branch_id=\App\Helpers\UserModelDataHelper::getKPDNBranchId();
    //     if($branch_id==null){
    //         $dataModels=User::query()->where('user_type_id',2);
    //     }else{
    //         $branch = \App\Branch::find($branch_id);
    //         $dataModels=User::where('branch_id',$branch_id)->where('user_type_id',2);
            
    //     }
        
    //     $indexType="user";
    //     $dataTableModels= $this->returnindexAjax($request,$dataModels,$indexType); 
    //     return $dataTableModels;
    // }

    // private function getIndexDataAgent(Request $request){
    //     $branch_id=\App\Helpers\UserModelDataHelper::getKPDNBranchId();
    //     if($branch_id==null){
    //         $dataModels=User::query()->where('user_type_id',3);
    //     }else{
    //         $branch = \App\Branch::find($branch_id);
    //         $dataModels=User::where('branch_id',$branch_id)->where('user_type_id',3);
            
    //     }
        
    //     $indexType="user";
    //     $dataTableModels= $this->returnindexAjax($request,$dataModels,$indexType); 
    //     return $dataTableModels;
    // }

    // private function getIndexDataDropship(Request $request){
    //     $branch_id=\App\Helpers\UserModelDataHelper::getKPDNBranchId();
    //     if($branch_id==null){
    //         $dataModels=User::query()->where('user_type_id',4);
    //     }else{
    //         $branch = \App\Branch::find($branch_id);
    //         $dataModels=User::where('branch_id',$branch_id)->where('user_type_id',4);
            
    //     }
        
    //     $indexType="user";
    //     $dataTableModels= $this->returnindexAjax($request,$dataModels,$indexType); 
    //     return $dataTableModels;
    // }

    // private function getIndexDataKitchen(Request $request){
    //     $branch_id=\App\Helpers\UserModelDataHelper::getKPDNBranchId();
    //     if($branch_id==null){
    //         $dataModels=User::query()->where('user_type_id',5);
    //     }else{
    //         $branch = \App\Branch::find($branch_id);
    //         $dataModels=User::where('branch_id',$branch_id)->where('user_type_id',5);
            
    //     }
        
    //     $indexType="user";
    //     $dataTableModels= $this->returnindexAjax($request,$dataModels,$indexType); 
    //     return $dataTableModels;
    // }

    
    /**
     * return index list ajax response
     * @return user list (ajax)
     */
    public function returnindexAjax(Request $request,$dataModels,$indexType) {
        $modelDatatables = Datatables::of($dataModels)->with('userType','location')
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
        
        ->addColumn('user_type_id', function($query) use($request){
            return $query->userType->name;

        })
        ->addColumn('active', function($query) use($request){
			if($query->active==1){
                return "YES";
            }else{
                return "NO";
            }
			
		})
		->addColumn('action', function($query) use($request,$indexType){
            $buttonView = "<a title='Papar' type='button' class='btn btn-xs btn-info' href='".url('user/'.$query->getKey())."'><i class='fa fa-eye'></i></a>";
            $buttonEdit = "<a title='Edit' type='button' class='btn btn-xs btn-warning' href='".url('user/'.$query->getKey())."/edit'><i class='fa fa-pencil'></i></a>";
            $buttonDelete = "<a title='Padam' data-modal data-route='". route('user.destroy', $query->getKey()) ."' 
                    data-toggle='modal' data-target='#modal-delete' 
                    type='button' class='btn btn-xs btn-danger'><i class='far fa-trash-alt'></i>
            </a>";
            /*
            $btnSetAdmin = "<a title='Admin' data-title='".__('general.set_user_admin')."' data-modal-setadmin data-route='". route('user.setAdmin', $query->getKey()) ."' 
                    data-toggle='modal' data-target='#modal-setadmin' 
                    type='button' class='btn btn-xs btn-success'><i class='fas fa-user-secret'></i>
            </a>";*/


            // if(!PermissionHelper::hasUserView(false)){
            //     $buttonView='';
            // }

            // if(!PermissionHelper::hasUserEdit(false)){
            //     $buttonEdit='';
            //     $buttonDelete='';
            // }

            // if(!PermissionHelper::hasUserDelete(false)){
            //     $buttonDelete='';
            // }				

           

                
            return $buttonView.' '.$buttonEdit.' '.$buttonDelete;
        
		});
        
        return $modelDatatables;
    }



    /**
     * Show create user form
     * @return form to create new user
     */
    public function create(Request $request)
    {
		// if(!PermissionHelper::hasUserCreate()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelUser = new User();
        $roles_list=\App\Helpers\ModelDataHelper::getActiveRoles();
        $user_type_list=\App\Helpers\UserModelDataHelper::getUserTypesList();
               
		//dd($staff_list);
        return view('user.create',compact('modelUser','request','roles_list',
        'user_type_list'));
    }

    public function create_refer_agent(Request $request)
    {
        /*
		if(!PermissionHelper::hasUserCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
        if($request->referral_id==null){
            return back()->withErrors('Link Pendaftaran Tidak Sah.')
            ->withInput();
        }

        $upline_id= $request->referral_id;
        $modelUplineUser=\App\User::find($upline_id);
        if($modelUplineUser==null){
            return back()->withErrors('Referral ID Tidak Sah.')
            ->withInput();
        }
       $location_list=\App\Location::pluck('name','id');
               
		//dd($staff_list);
        return view('user.create_refer_agent',compact('modelUplineUser','request',
        'location_list'));
    }

    public function store_refer_agent(Request $request){
        
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
                    'uid' => 'required|max:255',
                    'email' => 'required|unique:users|max:255',
                    'mykad' => 'required|unique:users|max:255',
                    'phone' => 'required|max:255',
                    'location_id' => 'required',
                    'password' => 'required|min:8|max:255',
                    'password_confirm' => 'required|min:8|max:255',
                    
             ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)
            ->withInput();
            
        }
        if($data['password'] !== $data['password_confirm']){
            $validator->after(function ($validator) {
                $validator->errors()->add('password', __('general.password_not_equal'));
            });
        }

        $modelUser = new User();
        $modelUser->fill($data);
        $modelUser->syncRoles(array(['4']));
        $modelUser->user_type_id=3;
        $modelUser->upline_id=$request->upline_id;
        $modelUser->password=Hash::make($data['password']);
        $modelUser->verified=1;
        $modelUser->active=1;
        $modelUser->save();

        Session::flash('success', __('Pendaftaran Berjaya.Sila Login untuk Membuat Pesanan.'));
        return redirect(url("login"));
    }

    

    public function create_refer_dropship(Request $request)
    {
        /*
		if(!PermissionHelper::hasUserCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
        if($request->referral_id==null){
            return back()->withErrors('Link Pendaftaran Tidak Sah.')
            ->withInput();
        }

        $upline_id= $request->referral_id;
        $modelUplineUser=\App\User::find($upline_id);
        if($modelUplineUser==null){
            return back()->withErrors('Referral ID Tidak Sah.')
            ->withInput();
        }
       $location_list=\App\Location::pluck('name','id');
               
		//dd($staff_list);
        return view('user.create_refer_dropship',compact('modelUplineUser','request',
        'location_list'));
    }

    public function store_refer_dropship(Request $request){
        
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
                    'uid' => 'required|max:255',
                    'email' => 'required|unique:users|max:255',
                    'mykad' => 'required|unique:users|max:255',
                    'phone' => 'required|max:255',
                    'location_id' => 'required',
                    'password' => 'required|min:8|max:255',
                    'password_confirm' => 'required|min:8|max:255',
                    
             ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)
            ->withInput();
            
        }
        if($data['password'] !== $data['password_confirm']){
            $validator->after(function ($validator) {
                $validator->errors()->add('password', __('general.password_not_equal'));
            });
        }

        $modelUser = new User();
        $modelUser->fill($data);
        $modelUser->syncRoles(array(['5']));
        $modelUser->user_type_id=4;
        $modelUser->upline_id=$request->upline_id;
        $modelUser->password=Hash::make($data['password']);
        $modelUser->verified=1;
        $modelUser->active=1;
        $modelUser->save();

        Session::flash('success', __('Pendaftaran Berjaya.Sila Login untuk Membuat Pesanan.'));
        return redirect(url("login"));
    }

    public function create_customer(Request $request)
    {
        /*
		if(!PermissionHelper::hasUserCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
        
		//dd($staff_list);
        return view('user.create_customer',compact('request'));
    }

    public function store_customer(Request $request){
        
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
                    'email' => 'required|unique:users|max:255',
                    'phone' => 'required|max:255',
                    'password' => 'required|min:8|max:255',
                    'password_confirm' => 'required|min:8|max:255',
                    
             ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)
            ->withInput();
            
        }
        if($data['password'] !== $data['password_confirm']){
            $validator->after(function ($validator) {
                $validator->errors()->add('password', __('general.password_not_equal'));
            });
        }

        $modelUser = new User();
        $modelUser->fill($data);
        $modelUser->syncRoles(array(['3']));
        $modelUser->user_type_id=2;
        $modelUser->password=Hash::make($data['password']);
        $modelUser->verified=1;
        $modelUser->active=1;
        $modelUser->save();

        Session::flash('success', __('User Registration succeeded. Please Login to make bookings.'));
        return redirect(url("login"));
    }

    

     /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if(!PermissionHelper::hasUserCreate()){
			abort(403, __('general.unauthorizedAction.'));
		}

        $data = $request->all();
        //dd($data['roles']);


        //$roleList=\App\Role::wherein('id',$data['roles'])->get();
        //dd($roleList);

        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'uid' => 'required|max:255',
                    'email' => 'required|unique:users|max:255',
                    'mykad' => 'required|unique:users|max:255',
                    'phone' => 'required|max:255',
                    'password' => 'required|min:8|max:255',
                    'password_confirm' => 'required|min:8|max:255',
                    'roles'=>'required',
                    'active' => 'required',
                     ]);
        

        

        if ($validator->fails()) {
            return redirect(url("user/create"))
                        ->withErrors($validator)
                        ->withInput();
        }

        if($data['password'] !== $data['password_confirm']){
            $validator->after(function ($validator) {
                $validator->errors()->add('password', __('general.password_not_equal'));
            });
        }
        
		
        $modelUser = new User();
        $modelUser->fill($data);
        $modelUser->password=Hash::make($data['password']);
        $modelUser->verified=1;
        $modelUser->created_by = Auth::user()->name;
        $modelUser->save();
        \App\Classes\AuditTrailHelper::logAuditCreate("users",$modelUser->getKey(),$modelUser->toArray());
        
        Session::flash('success', 'Successfully Created');
        return redirect(url("user")."/".$modelUser->getKey());
    }

    

    /**
     * Show user profile
     */
    public function profile(Request $request,$id)
    {
        /*
		if(!PermissionHelper::hasUserView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/

        $actual_link_agent = "http://$_SERVER[HTTP_HOST]/createAgentUser?referral_id=".$id;
        $actual_link_dropship = "http://$_SERVER[HTTP_HOST]/createDropshipUser?referral_id=".$id;
        $actual_link_order="http://$_SERVER[HTTP_HOST]/orderlinked/create?linked_user=".$id;
        $modelUser = User::findOrFail($id); 
        $title=__('user.title_show').__('general.profile');
        return view('user.profile',compact('title','modelUser','request',
        'actual_link_agent','actual_link_dropship','actual_link_order'));
    }

    public function profile_upline(Request $request,$id)
    {
        /*
		if(!PermissionHelper::hasUserView()){
			abort(403, __('general.unauthorizedAction.'));
		}*/
        $actual_link_agent = "http://$_SERVER[HTTP_HOST]/createAgentUser?referral_id=".$id;
        $actual_link_dropship = "http://$_SERVER[HTTP_HOST]/createDropshipUser?referral_id=".$id;
        $actual_link_order="http://$_SERVER[HTTP_HOST]/orderlinked/create?linked_user=".$id;
        $user = User::findOrFail($id); 
        $modelUser=$user = User::findOrFail($user->upline_id);
        $title=__('user.title_show').__('general.profile_upline');
        return view('user.profile_upline',compact('title','modelUser','request',
        'actual_link_agent','actual_link_dropship','actual_link_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */

    public function show(Request $request,$id)
    {
		// if(!PermissionHelper::hasUserView()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelUser = User::findOrFail($id); 
        $title=__('user.title_show').__('user.title');
        return view('user.show',compact('title','modelUser','request'));
    }

    /**
     * Show user edit form
     * @return form to edit user
     */
    public function edit(Request $request,$id)
    {
		// if(!PermissionHelper::hasUserEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $modelUser = User::findOrFail($id);    
        $roles_list=\App\Helpers\ModelDataHelper::getActiveRoles();
        $user_type_list=\App\Helpers\UserModelDataHelper::getUserTypesList();
        
        return view('user.edit',compact('modelUser','request','roles_list',
        'user_type_list'));
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
		// if(!PermissionHelper::hasUserEdit()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }

        $data = $request->all();
        //dd($data);
        $modelUser = User::findOrFail($id);        
        $validator = Validator::make($request->all(), [
						 				'name' => [
					'required',
					Rule::unique('users')->ignore($modelUser->id),
				],
                'uid' => 'required|max:255',
                'email' => 'required|max:255',
                'mykad' => 'required|max:255',
                'phone' => 'required|max:255',
                'roles'=>'required',
                'active' => 'required',
                ]);     
        //Rule::unique('users')->ignore($modelUser->id),
		
        if ($validator -> fails()) {
            return redirect(url("user/$id"))
                        ->withErrors($validator)
                        ->withInput();
        }
       
        $modelUser -> fill($data);
        $modelUser->updated_by=Auth::user()->name;
        \App\Classes\AuditTrailHelper::logAuditUpdate("users",$modelUser->getKey(),$modelUser->toArray());
        
        $modelUser->syncRoles($data['roles']);
        
        $modelUser -> save();     
      
        Session::flash('success', 'Berjaya Dikemaskini');
        return redirect(url("user"));
    }

    public function updatepwd(Request $request, $id){
        $data = $request->all();
        $modelUser = User::findOrFail($id); 
        
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|max:255',
            'password_confirm' => 'required|min:8|max:255',
             ]);


        if($data['password'] !== $data['password_confirm']){
            $validator->after(function ($validator) {
                $validator->errors()->add('password', __('general.password_not_equal'));
            });
        }

        if ($validator -> fails()) {
            return back()->withErrors($validator)
            ->withInput();
        }
      
        $modelUser->password=Hash::make($data['password']);
        $modelUser->save();

        $modelMailMessage = MailMessage::where('name', 'reset')->first();
        $finds = collect(["@userID"]);
        $replaces = collect([$modelUser->uid]);
        SendMailMessage::mailMessage($modelUser->email, $finds, $replaces, $modelMailMessage->mail_subject, $modelMailMessage->mail_text); 

        Session::flash('success', 'Berjaya Dikemaskini');
        return redirect(url("user"));
    }

    public function getUserBranch(Request $request, $id){
        $modelStaff = \App\Staff::findOrFail($id);
        $modelBranch=\App\Branche::find($modelStaff->branch_id);
        return $modelBranch->name;
    }

    /**
     * Set user with admin role
     * @return redirect to user list page
     */
    public function setAdmin(Request $request, $id){
        $modelUser = User::findOrFail($id);
        $modelUser->is_admin=1;
        $modelUser->save();
        $modelUser->assignRole('Admin');
        return redirect(url("user/admin"));
        //\App\Classes\AuditTrailHelper::logAuditUpdate("users",$modelUser->getKey(),$modelUser->toArray());
    }

    /**
     * Remove admin role from user
     * @return redirect to admin list page
     */
    public function resetAdmin(Request $request, $id){
        $modelUser = User::findOrFail($id);
        $modelUser->is_admin=0;
        $modelUser->save();
        $modelUser->removeRole('Admin');
        return redirect(url("user/admin"));
    }
    
   
    /**
     * Delete user
     * @return redirect to user list
     */
	public function destroy(Request $request, $id){
		// if(!PermissionHelper::hasUserDelete()){
		// 	abort(403, __('general.unauthorizedAction.'));
		// }	

		 $modelUser = User::findOrFail($id);
                 \App\Classes\AuditTrailHelper::logAuditDelete("users",$modelUser->getKey(),$modelUser->toArray());
		 $modelUser->delete();
		 Session::flash('success', 'Successfully Deleted');
                return redirect(url("user"));		 
    }


	public function test(){
		Google2FA::setQRCodeBackend('svg');
		$company="test";
		$holder="peyo";
		$secret="EHWVBKXCVYOZMCTJ";
		//$secret=Google2FA::generateSecretKey();
		//dd($secret);
		$size = 200;
		$encoding = 'utf-8';


		$qrCode=Google2FA::getQRCodeInline($company, $holder, $secret, $size, $encoding);
		//return Google2FA::generateSecretKey();
		return $qrCode;
	}

	public function qrtest(Request $request, $code){
		$secret="EHWVBKXCVYOZMCTJ";
		$result=Google2FA::verifyGoogle2FA($secret, $code);
		dd($result);
	}
    
}
