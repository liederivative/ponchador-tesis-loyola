<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

use Symfony\Component\Console\Output\StreamOutput;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\NoORMQueries;

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
    use AuthenticatesUsers,NoORMQueries;
    
    public function __construct()
    {
 
    }
    public function showLoginForm()
    {
        $dbs = $this->getExistingDBs();
        
        return view('auth.login')->with('dbs',$dbs);
    }

    public function login(Request $request)
    {
        
        if($request->has('uni')) session(['selected_database'=>$request->uni]);
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
        
//        if (Auth::guard('web')->attempt(['username'=>$request->username,'password'=>$request->password]) ) {
//                
//                $this->clearLoginAttempts($request);
//            
//                return redirect()->intended('/home');
//            
//        }
        
    }

    public function username()
    {
        return 'username';
    }
    
}
