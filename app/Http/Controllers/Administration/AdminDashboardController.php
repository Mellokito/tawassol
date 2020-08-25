<?php

namespace App\Http\Controllers\Administration;

use App\CycleScolaire;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['cycle_scolaires'] = CycleScolaire::orderBy('date_debut','DESC')->take(1)->get();
        return view('administration.admin-dashboard',$data);
    }
}
