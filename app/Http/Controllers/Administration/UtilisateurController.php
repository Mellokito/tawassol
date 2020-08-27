<?php
namespace App\Http\Controllers\Administration;

use App\Admin;
use App\Categorie;
use App\Http\Controllers\Controller;
use App\Profil;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;
use Validator;

class UtilisateurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('statutUser');
        $this->middleware('checkAdministrateur');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->profil->id != 1){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $data['list_utilisateurs'] = Admin::all();
        return view('administration.utilisateur.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->profil->id != 1){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }

        $data['roles'] = Profil::all();

        return view('administration.utilisateur.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->profil->id != 1){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|unique:admins,username',
            'password' => 'required|string|min:8|max:32|confirmed',
            'role' => 'required|in:1,2,3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }


        if ($request->isMethod('post')) {
            $user = new Admin();
            $user->nom_admin = $request->nom;
            $user->prenom_admin = $request->prenom;
            $user->username = $request->login;
            $user->password = Hash::make($request->password);
            $user->profil_id = $request->role;
    
            $statut = $request->input('statut');
            if($statut == null){
                $user->statut = 0;
            }else{
                $user->statut = 1;
            }
            
            $user->save(); 
            return redirect()->route('utilisateur.index')->with('success', 'Enregistrement effectué');
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
    public function edit($id)
    {
        $user = Admin::find($id);
        if (!$user) {
            return redirect('404');
        }

        if(Auth::user()->profil->id != 1){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        
        $data['profils'] = Profil::all();
        $data['utilisateur'] = $user;

        return view('administration.utilisateur.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->profil->id != 1){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $user = Admin::find($id);
        if (!$user) {
            return redirect('404');
        }
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|unique:admins,username,'.$user->id,
            'password' => 'nullable|string|min:8|max:32|confirmed',
            'role' => 'required|in:1,2,3',
        ]);
        // return var_dump($user->role);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all);
        }

        try {
            if ($request->isMethod('put')) {
                $user->nom_admin = $request->nom;
                $user->prenom_admin = $request->nom;
                $user->username = $request->login;
                if (!empty($request->password)) {
                    $user->password = Hash::make($request->password);
                }
    
                if ($user->id == Auth::user()->id) {
                    if(Auth::user()->profil->id == 1){
                        $user->profil_id = 1;
                    }else{
                        $user->profil_id = 3;
                    }
                    
                    $user->statut = $user->statut  == 'Actif' ? 1 : 0;
                } else {
                    $user->profil_id = $request->role;
    
                    $statut = $request->input('statut');
                    if ($statut == null) {
                        $user->statut = 0;
                    } else {
                        $user->statut = 1;
                    }
                }
                $user->update();
                return redirect()->route('utilisateur.index')->with('success', 'Modification effectuée');
            }
            
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->back()->with('error', 'Une erreur s\'est produite');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->profil->id != 1){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $user = Admin::find($id);
        if (!$user) {
            return redirect('404');
        }

        if($user->id == Auth::user()->id){
            return redirect()->route('utilisateur.index')->with('error', 'Impossible de supprimer votre compte');
        }

        $user->delete();
        return redirect()->route('utilisateur.index')->with('success', 'Suppression effectuée');
    }

    public function droit_acces(User $user){
        if(Auth::user()->role != 'Super Administrateur'){
            return redirect()->route('utilisateur.user_error')->with('error','Vous ne disposez pas des autorisations nécessaires pour effectuer cette action');
        }
        $categorie = Categorie::find(1);
        
        try {
            $user->droit_acces()->attach($categorie->id, ['droit_acces' => 1]);
            return redirect()->route('utilisateur.index')->with('success', 'Suppression effectuée');
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->route('utilisateur.index')->with('error', 'Cet utilisateur à déjà un droit d\'accès sur cette catégorie');
            }
        }
        
        
    }
}
