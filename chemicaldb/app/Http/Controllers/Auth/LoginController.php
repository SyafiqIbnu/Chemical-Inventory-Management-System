<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Google2FA;
use Auth;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


	public function tfaLogin(Request $request){
		return $this->authenticate($request);
	}

	/**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $user=null;
        $credentials = $request->only('email', 'password');
        $isEmail=true;
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $isEmail=false;
        }

        if($isEmail){
            $user=\App\User::where('email',$request->email)->first();
        }else{
            $user=\App\User::where('cpy_reg_no',$request->email)->first();
        }
		
		//dd($user);
		if($user==null){
			return back()->withInput($request->all())->with('error', 'Invalid Username / password');
        }

        if(!$user->active){
			return back()->withInput($request->all())->with('error', 'Invalid Username / password');
        }
               

		if($user->use2fa){
			if($request->tac ==""){
				return back()->withInput($request->all())->with('error', 'TAC Enabled. Invalid TAC');
			}


			$code=$request->tac;
			$secret=$user->google2fa_secret;
			$result=Google2FA::verifyGoogle2FA($secret, $code);
			if(! $result){
				return back()->withInput($request->all())->with('error', 'TAC Enabled. Invalid TAC');
			}
		}

        if($isEmail){
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                //webservice login
                // \App\Services\FactoHubAzureWebService::getSession();
                return redirect()->intended($this->redirectPath());
            }else{
                return back()->withInput($request->all())->with('error', 'Invalid Username / password');
            }        
        }else{
            if (Hash::check($request->password, $user->password)){
                Auth::login($user, true);
                return redirect()->intended($this->redirectPath());
            }
        }
    }

	public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->withInput($request->all())->with('error', 'You need to confirm your account. 
			We have sent you an activation code, please check your email.
			Click <a class="alert-link" href="'.url('resend-activation').'">here</a> to resend the acivation code');
        }else if(!$user->active){
            auth()->logout();
            return back()->withInput($request->all())->with('error', 'Your account has been deactivated. 
			Please contact LPPKN for futher information');
		}

        
        return redirect()->intended($this->redirectPath());
    }
}
