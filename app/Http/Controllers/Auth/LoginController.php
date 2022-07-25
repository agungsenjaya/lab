<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

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

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }

    public function username()
    {
        $login = request()->input('username');
        // else if(is_numeric($login)){
        //     $field = 'phone';
        // } 
        if(filter_var($login, FILTER_VALIDATE_EMAIL)){
            $field = 'email';
        }else {
            $field = 'username';
        }
        request()->merge([$field => $login]);
        return $field;
    }
    
    public function redirectTo()
    {
        if ($this->guard()->user()->hasRole('owner')) {
            return '/owner/dashboard';
        }else if ($this->guard()->user()->hasRole('superadmin')) {
            return '/superadmin/dashboard';
        }else{
            return '/admin/dashboard';
        }
    }
}
