<?php

namespace App\Http\Controllers\Administration;

use App\CycleScolaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class GererCycleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('statutUser');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CycleScolaire $cycle_scolaire)
    {
        $data['cycle_scolaire'] = $cycle_scolaire;

        return view('administration.cycle-dashboard',$data);
    }

}
