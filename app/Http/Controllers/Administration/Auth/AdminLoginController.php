<?php

namespace App\Http\Controllers\Administration\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout', 'adminLogout']]);
    }

    public function showLoginForm(){
        return view('administration.auth.admin_login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->intended(route('admin.dashboard'));
        }

        return view('administration.auth.admin_login')->with('danger', 'Login et/ou mot de passe incorrect');
    }

    public function username()
    {
        return 'username';
    }

    public function adminLogout()
    {
        // if (Auth::guard('web')->check()){
        //     dd('web');
        // }

        // if (Auth::guard('admin')->check()){
        //     dd('admin');
        // }

        // if (Auth::guard('prof')->check()){
        //     dd('prof');
        // }
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
