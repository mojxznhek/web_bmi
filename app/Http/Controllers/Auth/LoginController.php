<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Auth\SessionGuard;


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
    protected $redirectTo = 'home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:child')->except('logout'); 
    }

      public function parentLogin(Request $request)
    {
        $this->validator($request);
        $credentials = $request->only('username', 'password');

      
        //$credentials = $request->only('email', 'password'); //use if email authentication is used
         if (Auth::guard('child')->attempt($credentials, $request->get('remember'))){
            return redirect()->intended('/parent/home');
        }else{
            //  $status = 'Password credentials do not match our records.';  
             return back()->withInput($request->only('username', 'remember'));
        }
    }
    
    public function showParentLoginForm()
    {
        return view('app.login_children.login', ['url' => 'child-access']);
    }


    public function validator(Request $request)
    {
        //validation rules.
        $rules = [
            //'email'    => 'required|email|exists:students|min:5|max:191', use it if email authentication used
            'username'    => 'required|string|exists:children|min:5|max:11',
            'password' => 'required|string|min:5|max:255|',
        ];
        
        //custom validation error messages.
        $messages = [
            //'email.exists' => 'These credentials do not match our records.',
            'username.exists' => 'These credentials do not match our records.',
        ];
        
        //validate the request.
        $request->validate($rules,$messages);
    }
}
