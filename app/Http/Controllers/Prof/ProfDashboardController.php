<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:prof');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('prof.prof-dashboard');
    }
}
