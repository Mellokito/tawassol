<?php

namespace App\Http\Controllers\Prof\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfLoginController extends Controller
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:prof', ['except' => ['profLogout']]);
    }

    public function showLoginForm(){
        return view('prof.auth.prof_login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('prof')->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->intended(route('prof.dashboard'));
        }

        return view('prof.auth.prof_login')->with('danger', 'Login et/ou mot de passe incorrect');
    }

    public function username()
    {
        return 'username';
    }

    public function profLogout()
    {
        Auth::guard('prof')->logout();
        return redirect('/');
    }
}
