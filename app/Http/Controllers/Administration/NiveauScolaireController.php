<?php

namespace App\Http\Controllers\Administration;

use App\CategorieNiveauScolaire;
use App\NiveauScolaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class NiveauScolaireController extends Controller
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
        $data['niveau_scolaires'] = NiveauScolaire::all();

        return view('administration.niveau_scolaire.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = CategorieNiveauScolaire::orderBy('id','ASC')->get();

        return view('administration.niveau_scolaire.create',$data);
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
            'nom_niveau_scolaire' => 'required|string|min:3|unique:niveau_scolaires,nom_niveau_scolaire',
            'categorie' => 'required|exists:categorie_niveau_scolaires,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $niveau_scolaire = new NiveauScolaire();
            $niveau_scolaire->nom_niveau_scolaire = $request->nom_niveau_scolaire;
            $niveau_scolaire->categorie_niveau = $request->categorie;
            $niveau_scolaire->admin_id = Auth::id();

            $niveau_scolaire->save(); 
            return redirect()->route('niveau_scolaire.index')->with('success', 'Enregistrement effectué');
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
    public function edit(NiveauScolaire $niveau_scolaire)
    {   
        $data['niveau_scolaire'] = $niveau_scolaire;
        $data['categories'] = CategorieNiveauScolaire::orderBy('id','ASC')->get();

        return view('administration.niveau_scolaire.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NiveauScolaire $niveau_scolaire)
    {
        $validator = Validator::make($request->all(), [
            'nom_niveau_scolaire' => 'required|string|min:3|unique:niveau_scolaires,nom_niveau_scolaire,'.$niveau_scolaire->id,
            'categorie' => 'required|exists:categorie_niveau_scolaires,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('put')) {
            $niveau_scolaire->nom_niveau_scolaire = $request->nom_niveau_scolaire;
            $niveau_scolaire->categorie_niveau = $request->categorie;
            $niveau_scolaire->admin_id = Auth::id();

            $niveau_scolaire->update(); 
            return redirect()->route('niveau_scolaire.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NiveauScolaire $niveau_scolaire)
    {        
        if($niveau_scolaire->delete()){
            return redirect()->route('niveau_scolaire.index')->with('success', 'Suppression effectuée');
        }
    }
}
