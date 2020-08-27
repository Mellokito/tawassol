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
        $data['cycle_scolaires'] = CycleScolaire::where('id','!=',$cycle_scolaire->id)->get();
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
    public function edit(Classe $classe, CycleScolaire $cycle_scolaire)
    {   
        $data['classe_niveau'] = Classe::select('classes.*','niveau_scolaires.*','cycle_scolaires.*','classes.id as id_classe','cycle_scolaires.id as id_cycle_scolaire','niveau_scolaires.id as id_niveau_scolaire','classes.created_at as date_creation_classe','classes.updated_at as date_modif_classe')
                            ->where('classe_niveau_cycles.cycle_scolaire_id',$cycle_scolaire->id)
                            ->where('classe_niveau_cycles.classe_id',$classe->id)
                            ->join('classe_niveau_cycles','classe_niveau_cycles.classe_id','classes.id','left')
                            ->join('niveau_scolaires','niveau_scolaires.id','classe_niveau_cycles.niveau_scolaire_id','left')
                            ->join('cycle_scolaires','cycle_scolaires.id','classe_niveau_cycles.cycle_scolaire_id','left')
                            ->first();

        $data['classe'] = $classe;
        $data['cycle_scolaire'] = $cycle_scolaire;
        $data['niveau_scolaires'] = NiveauScolaire::all();
        $data['categorie_niveau_scolaires'] = CategorieNiveauScolaire::all();

        return view('administration.classe.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe , CycleScolaire $cycle_scolaire)
    {
        $validator = Validator::make($request->all(), [
            'niveau' => 'required|numeric|exists:niveau_scolaires,id',
            'nom' => 'required|string|unique:classes,nom_classe,'.$classe->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('put')) {
            
            $classe_niveau_cycle = ClasseNiveauCycle::where('classe_id',$classe->id)
                                                    ->where('cycle_scolaire_id',$cycle_scolaire->id)
                                                    ->first();


            $classe->nom_classe = $request->nom;
            
            $classe->update();
            
            
            $classe_niveau_cycle->classe_id = $classe->id;
            $classe_niveau_cycle->niveau_scolaire_id = $request->niveau;

            $classe_niveau_cycle->update();

            $data['cycle_scolaire'] = $cycle_scolaire;

            return redirect()->route('cycle.classe.index',$data)->with('success', 'Modification effectué');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe , CycleScolaire $cycle_scolaire)
    {       
        $classe_niveau_cycle = ClasseNiveauCycle::where('classe_id',$classe->id)
                                                    ->where('cycle_scolaire_id',$cycle_scolaire->id)
                                                    ->first();
        if($classe_niveau_cycle->delete()){
            return redirect()->route('cycle.classe.index',$cycle_scolaire)->with('success', 'Suppression effectuée');
        }
    }

    public function liste_classe_cycle(CycleScolaire $cycle_scolaire,CycleScolaire $cycle){
        $data['cycle_scolaire'] = $cycle_scolaire;
        $data['classe_cycle'] = ClasseNiveauCycle::select('classe_niveau_cycles.*','classes.*','niveau_scolaires.*','cycle_scolaires.*','classe_niveau_cycles.id as id_classe_cycle','classes.id as id_classe','cycle_scolaires.id as id_cycle_scolaire','niveau_scolaires.id as id_niveau_scolaire')
                                                ->where('classe_niveau_cycles.cycle_scolaire_id',$cycle->id)
                                                ->join('classes','classes.id','classe_niveau_cycles.classe_id','left')
                                                ->join('niveau_scolaires','niveau_scolaires.id','classe_niveau_cycles.niveau_scolaire_id','left')
                                                ->join('cycle_scolaires','cycle_scolaires.id','classe_niveau_cycles.cycle_scolaire_id','left')
                                                ->get();

        return view('administration.classe.classe_cycle',$data);
    }

    public function classe_cycle(Request $request, CycleScolaire $cycle_scolaire){
        $data['cycle_scolaire'] = $cycle_scolaire;
        $classes = $request->get('ids');
        
        if($classes){
            foreach ($classes as $classe) {
                $classe_cycle = ClasseNiveauCycle::where('classe_niveau_cycles.id',$classe)->first();
                
                $new_classe_cycle = new ClasseNiveauCycle() ;

                $new_classe_cycle->classe_id = $classe_cycle->classe_id;
                $new_classe_cycle->niveau_scolaire_id = $classe_cycle->niveau_scolaire_id;
                $new_classe_cycle->cycle_scolaire_id = $cycle_scolaire->id;
                $new_classe_cycle->admin_id = Auth::id();
                
                try {
                    $new_classe_cycle->save();
                } catch (\Illuminate\Database\QueryException $e) {
                    $errorCode = $e->errorInfo[1];
                    if($errorCode == 1062){
                        return redirect()->route('cycle.classe.classe_cycle.index',$cycle_scolaire)->with('error', 'Une erreur s\'est produite');
                    }
                }
            }
        }else{
            return redirect()->back()->with('error','Vous n\'avez rien selectionné');
        }
        return redirect()->route('cycle.classe.index',$data)->with('success', 'Modification effectué');
    }
}
