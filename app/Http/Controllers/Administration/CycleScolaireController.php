<?php

namespace App\Http\Controllers\Administration;

use App\CycleScolaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class CycleScolaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cycle_scolaires'] = CycleScolaire::all();

        return view('administration.cycle_scolaire.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.cycle_scolaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $cycle_scolaire = new CycleScolaire();
            $cycle_scolaire->date_debut = date('Y-m-d', strtotime($request->date_debut));
            $cycle_scolaire->date_fin = date('Y-m-d', strtotime($request->date_fin));
            $cycle_scolaire->admin_id = Auth::id();

            $cycle_scolaire->save(); 
            return redirect()->route('cycle_scolaire.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CycleScolaire $cycle_scolaire)
    {   
        $data['cycle_scolaire'] = $cycle_scolaire;

        return view('administration.cycle_scolaire.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CycleScolaire $cycle_scolaire)
    {
        $validator = Validator::make($request->all(), [
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('put')) {
            $cycle_scolaire->date_debut = date('Y-m-d', strtotime($request->date_debut));
            $cycle_scolaire->date_fin = date('Y-m-d', strtotime($request->date_fin));
            $cycle_scolaire->admin_id = Auth::id();

            $cycle_scolaire->update(); 
            return redirect()->route('cycle_scolaire.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CycleScolaire $cycle_scolaire)
    {        
        if($cycle_scolaire->delete()){
            return redirect()->route('cycle_scolaire.index')->with('success', 'Suppression effectuée');
        }
    }
}
