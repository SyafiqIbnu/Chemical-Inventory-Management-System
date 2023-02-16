<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\VerifyUser;
use Mail;
use App\Mail\VerifyMail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
		
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			'mykad' => $data['mykad'],
			'phone' => $data['phone'],
        ]);

		$verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => Str::random(40)
        ]);
		//dd($data);
		Mail::to($user->email)->send(new VerifyMail($user));
		return $user;
    }

	public function resendActivationShow(Request $request){
		 return view('auth.passwords.resend_activation');
	}

	public function resendActivation(Request $request){
		$user=User::where('email',$request->email)->first();
		if(isset($user) ){
			if(!$user->verified) {
				Mail::to($user->email)->send(new VerifyMail($user));
				return redirect('/login')->with('success', "The activation code has been sent to your email.");
			}else{
				return redirect('/login')->with('error', "Sorry. Your email has been activated before.");
			}			
		}else{
			return redirect('/resend-activation')->with('error', "Sorry your email cannot be identified.");
			//return redirect('/resend-activation')->with('error', ['email'=>"Sorry your email cannot be identified."]);
		}
	}

	protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
    }

	public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
				$verifyUser->user->email_verified_at=Carbon::now();
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/login')->with('status', $status);
    }
}
