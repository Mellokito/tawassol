<?php

namespace App\Http\Controllers\Administration;

use App\Prof;
use App\Http\Controllers\Controller;
use App\Imports\ProfImport;
use App\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class ProfController extends Controller
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
        $data['profs'] = Prof::all();
        return view('administration.prof.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administration.prof.create');
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
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'adresse' => 'required|string|min:3',
            'telephone' => 'required|string|min:3',
            'date_naissance' => 'required|date_format:d-m-Y',
            'email' => 'required|email|unique:profs,email_prof',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $prof = new Prof();

            $prof->nom_prof = $request->nom;
            $prof->prenom_prof = $request->prenom;
            $prof->adresse_prof = $request->adresse;
            $prof->telephone_prof = $request->telephone;
            $prof->email_prof = $request->email;
            $prof->date_naissance_prof = date('Y-m-d', strtotime($request->date_naissance));

            
            /****************** générer username ***********************/
            $utils = new Utils();
            $identifiant_connexion_prof = $utils->identifiantUser($request->nom,$request->prenom,$prof);
            /*****************************************/
            $prof->username = $identifiant_connexion_prof;
            $prof->password = Hash::make($identifiant_connexion_prof);

            $prof->admin_id = Auth::id();

            $prof->save(); 
            return redirect()->route('prof.index')->with('success', 'Enregistrement effectué');
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
    public function edit(Prof $prof)
    {   
        $data['prof'] = $prof;
        return view('administration.prof.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prof $prof)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'adresse' => 'required|string|min:3',
            'telephone' => 'required|string|min:3',
            'date_naissance' => 'required|date',
            'email' => 'required|email|unique:profs,email_prof,'.$prof->id,
            'username' => 'required|string|min:4',
            'password' => 'nullable|string|min:8|max:32|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('put')) {

            $prof->nom_prof = $request->nom;
            $prof->prenom_prof = $request->prenom;
            $prof->adresse_prof = $request->adresse;
            $prof->telephone_prof = $request->telephone;
            $prof->email_prof = $request->email;
            $prof->date_naissance_prof = date('Y-m-d', strtotime($request->date_naissance));;
            $prof->username = $request->username;
            if (!empty($request->password)) {
                $prof->password = Hash::make($request->password);
            }
            $prof->admin_id = Auth::id();

            $prof->update(); 
            return redirect()->route('prof.index')->with('success', 'Enregistrement effectué');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prof $prof)
    {        
        if($prof->delete()){
            return redirect()->route('prof.index')->with('success', 'Suppression effectuée');
        }
    }

    public function destroyAll(Request $request){
        $ids = $request->get('test');
        if($ids){
            Prof::destroy($ids);
            return redirect()->route('prof.index')->with('success', 'Suppression effectuée');
        }else{
            return redirect()->back()->with('error','Vous n\'avez rien selectionné');
        }
    }

     //******************** Import **************************

     public function showImport(){
        return view('administration.prof.import');
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
        try {
            
            $file = $request->file('fichier')->store('imported_files');

            $import = new ProfImport();
            $import->import($file);

            if($import->failures()->isNotEmpty()){
                return back()->withFailures($import->failures());
            }
        } catch (\InvalidArgumentException $ex) {
            return back()->withErrors('Vérifiez le format de la date');
        } catch (\Error $err) {
            return back()->withErrors('Vérifiez les données excel');
        } catch (\Exception $exc) {
            return back()->withErrors('Vérifiez les données excel');
        }

        return redirect()->route('prof.index')->with('success', 'Importation effectué avec succès');
    }

    public function telecharger()
    {        
        return response()->download('storage\exemple_fichiers\profs.xlsx');
    }
}
