<?php

namespace App\Http\Controllers\Administration;

use App\CategorieNiveauScolaire;
use App\Classe;
use App\ClasseNiveauCycle;
use App\CycleScolaire;
use App\NiveauScolaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ClasseController extends Controller
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
    public function index(CycleScolaire $cycle_scolaire)
    {
        $data['cycle_scolaire'] = $cycle_scolaire;
        $data['classes'] = Classe::select('classes.*','niveau_scolaires.*','classes.id as id_classe','cycle_scolaires.id as id_cycle_scolaire','niveau_scolaires.id as id_niveau_scolaire','classes.created_at as date_creation_classe','classes.updated_at as date_modif_classe')
                            ->where('classe_niveau_cycles.cycle_scolaire_id',$cycle_scolaire->id)
                            ->join('classe_niveau_cycles','classe_niveau_cycles.classe_id','classes.id','left')
                            ->join('niveau_scolaires','niveau_scolaires.id','classe_niveau_cycles.niveau_scolaire_id','left')
                            ->join('cycle_scolaires','cycle_scolaires.id','classe_niveau_cycles.cycle_scolaire_id','left')
                            ->get();

        return view('administration.classe.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CycleScolaire $cycle_scolaire)
    {
        $data['cycle_scolaire'] = $cycle_scolaire;
        $data['niveau_scolaires'] = NiveauScolaire::all();
        $data['categorie_niveau_scolaires'] = CategorieNiveauScolaire::all();
        

        return view('administration.classe.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CycleScolaire $cycle_scolaire)
    {
        $validator = Validator::make($request->all(), [
            'niveau' => 'required|numeric|exists:niveau_scolaires,id',
            'nom' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $classe = new Classe();
            $classe_niveau_cycle = new ClasseNiveauCycle();

            $classe->nom_classe = $request->nom;
            $classe->admin_id = Auth::id();
            
            $classe->save();
            
            $new_classe = Classe::find($classe->id);
            
            $classe_niveau_cycle->classe_id = $new_classe->id;
            $classe_niveau_cycle->niveau_scolaire_id = $request->niveau;
            $classe_niveau_cycle->cycle_scolaire_id = $cycle_scolaire->id;
            $classe_niveau_cycle->admin_id = Auth::id();

            $classe_niveau_cycle->save();

            $data['cycle_scolaire'] = $cycle_scolaire;

            return redirect()->route('cycle.classe.index',$data)->with('success', 'Enregistrement effectué');
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
        dd('done');
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
        dd('done');
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
        dd('done'); 
        if($niveau_scolaire->delete()){
            return redirect()->route('niveau_scolaire.index')->with('success', 'Suppression effectuée');
        }
    }
}
