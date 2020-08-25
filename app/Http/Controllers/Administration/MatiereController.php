<?php

namespace App\Http\Controllers\Administration;

use App\Matiere;
use App\Http\Controllers\Controller;
use App\Imports\MatiereImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class MatiereController extends Controller
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
        $data['matieres'] = Matiere::all();

        return view('administration.matiere.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('administration.matiere.create');
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
            'nom' => 'required|string|min:3|unique:matieres,nom_matiere',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $matiere = new Matiere();
            $matiere->nom_matiere = $request->nom;
            $matiere->admin_id = Auth::id();

            $matiere->save(); 
            return redirect()->route('matiere.index')->with('success', 'Enregistrement effectué');
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
    public function edit(Matiere $matiere)
    {   
        $data['matiere'] = $matiere;

        return view('administration.matiere.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matiere $matiere)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|min:3|unique:matieres,nom_matiere,'.$matiere->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('put')) {
            $matiere->nom_matiere = $request->nom;
            $matiere->admin_id = Auth::id();

            $matiere->update(); 
            return redirect()->route('matiere.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {        
        if($matiere->delete()){
            return redirect()->route('matiere.index')->with('success', 'Suppression effectuée');
        }
    }

    public function destroyAll(Request $request){
        $ids = $request->get('ids');
        if($ids){
            Matiere::destroy($ids);
            return redirect()->route('matiere.index')->with('success', 'Suppression effectuée');
        }else{
            return redirect()->back()->with('error','Vous n\'avez rien selectionné');
        }
    }


    //******************** Import **************************

    public function showImport(){
        return view('administration.matiere.import');
    }

    public function import(Request $request){
        $validator = Validator::make($request->all(), [
            'fichier' => 'required|mimes:xls,xlsx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }

        $file = $request->file('fichier')->store('imported_files');

        $import = new MatiereImport();
        $import->import($file);

        if($import->failures()->isNotEmpty()){
            return back()->withFailures($import->failures());
        }

        return redirect()->route('matiere.index')->with('success', 'Importation effectué avec succès');
    }

    public function telecharger()
    {        
        return response()->download('storage\exemple_fichiers\matieres.xlsx');
    }
}
