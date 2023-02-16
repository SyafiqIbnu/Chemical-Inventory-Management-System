<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Staff;
use App\Helpers\Convert;
use Validator;
use DataTables;
use Auth;
use Session;
use Carbon\Carbon;
use \App\Helpers\PermissionHelper;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request,$type="html")
    {
        $ctrl=new UserController();
        
        $id=Auth::user()->id;
        $modelUser = \App\User::findOrFail($id);
        //dd($modelUser->staff_id);        
        return $ctrl->profile( $request,$modelUser->id);
    }  
    
    public function indexUpline(Request $request,$type="html")
    {
        $ctrl=new UserController();
        
        $id=Auth::user()->id;
        $modelUser = \App\User::findOrFail($id);
        //dd($modelUser->staff_id);        
        return $ctrl->profile_upline( $request,$modelUser->id);
    }  
	
       /**
     * Show change password form
     *
     * @return  \Illuminate\Http\Response leave profile
     */
    public function changepwd(Request $request)
    {
        $id=Auth::user()->id;
        $modelUser = \App\User::findOrFail($id);
        $staff_id=$id;
        return view('auth.passwords.changepwd',compact('modelUser','request','staff_id'));
    }


    /**
     * update password 
     */
    public function updatepwd(Request $request){
        $data = $request->all();
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

        $id=Auth::user()->id;
        $modelUser = \App\User::findOrFail($id);        
        $modelUser->password=Hash::make($data['password']);
        $modelUser->save();

        Session::flash('success', 'Successfully Updated');
        return redirect(url("profile/changepwd"));
    }


    
}
