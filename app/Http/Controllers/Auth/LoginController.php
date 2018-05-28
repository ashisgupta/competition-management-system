<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    
    public function postLogin(Request $request) {
   $this->validate($request, [
        'email' => 'required',
        'password' => 'required'
        ]);

		if($request->email==null){
			\Session::flash('error_message','Please Enter Email-ID First!');
			return redirect()->back();
		}
		if($request->password==null){
			\Session::flash('error_message','Enter Your Password!');
			return redirect()->back();
		}

	$user = User::where('email', $request->email)->first();
	if (isset($user) && !empty($user)) {
		if (Hash::check($request->password, $user->password)) {	
			if($user->status){
				Auth::loginUsingId($user->id, false);
				switch($user->role_id){
				    case 1: 
					return redirect('superadmin/home');
					break;
				    case 2: 
					return redirect('judge/paper');
					break;
				    case 3: 
					return redirect('company/paper');
					break;
				    case 4: 
					return redirect('student/paper');
					break;
				    default:
					return redirect('/error/401');
					break;
				}
			} else {				
			\Session::flash('error_message','Your account has not been verified! Please ask admin to verify it!');
			return redirect()->back();
			}
		
	    } else {

			\Session::flash('error_message','Password is invalid. Please try again.');
			return redirect()->back();
		}


		} else {

		\Session::flash('error_message','Email Id is not Matched with our Database!');
		return redirect()->back();

		}

   }
}
