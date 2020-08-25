<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $this->middleware('guest', ['except' => ['logout', 'parentLogout']]);
    }

    public function showLoginForm(){
        return view('parent.auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->intended(route('parent.dashboard'));
        }

        return view('parent.auth.login')->with('danger', 'Login et/ou mot de passe incorrect');
    }
    public function username()
    {
        return 'username';
    }

    public function parentLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
