<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;
use App\Models\Concour;
use App\Models\InscriptionConcour;
use App\Models\Intermediaire;
use App\Models\User;
use App\Models\Role;
use App\Models\Media;
use App\Models\Temoignage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;



class HomeController extends Controller
{
    public function index()
    {
        $etablissement = Etablissement::orderby('id', 'desc')->paginate(5);
        $concour = Concour::orderby('id', 'desc')->paginate(5);
        $eta = Etablissement::all()->count();
        $cons = Concour::all()->count();
        $us = User::all()->count();
        return view('admin.dashboard', compact('etablissement', 'concour', 'eta', 'cons', 'us'));
    }
    public function utilisateur()
    {
        $users = User::orderby('id', 'desc')->paginate(6);
        return view('admin.users', compact('users'));
    }
    public function indexetablissement(Request $request)
    {
        $etablissement = Etablissement::find($request->user()->etablissement_id);
        $concour = Concour::where('etablissement_id', '=', $etablissement->id)->orderby('id', 'asc')->paginate(4);
        $con = Concour::all()->count();
        return view('admin_etablissement.dashboard', compact('etablissement', 'concour','con'));
    }
    public function listeC(Request $request, $concourId)
    {
        $concours = Concour::find($concourId);
        $userInscrit = $concours->users;
        return view('admin.candidats', compact('userInscrit'));
    }

    public function listeCandidat(Request $request, $concourId)
    {
        // $concours = Concour::find($concourId);
        // $userInscrit = $concours->users;
        // $nombres = $concours->users->count();
        $concour = Concour::find($concourId);
        $userInscrit = InscriptionConcour::where('concour_id', $concourId)->with('users', 'concours')->orderby('id', 'asc')->paginate(6);
// dd($userInscrit);

        return view('admin_etablissement.listCandidats', compact('userInscrit','concour'));
    }

    public function details($id)
    {
        $inscriptions = InscriptionConcour::find($id);
        $docs = Intermediaire::where('inscription_concour_id', '=', $id)->with('medias')->get();
        // dd($docs);
        return view('admin_etablissement.details', compact('inscriptions', 'docs'));
    }
    public function indexhome()
    {
        $concours = Concour::all();
        $temoignages = Temoignage::with('utilisateurs')->where('status', '=', 1)->orderby('id', 'asc')->paginate(3);
        // dd($temoignages);
        return view('welcome', compact('concours', 'temoignages'));
    }
    public function etablissement()
    {
        $etablissement = Etablissement::all();
        return view('admin.etablissement', compact('etablissement'));
    }
    // public function candidater(){

    //     return view('candidater');
    // }

    public function role()
    {
        $user = User::orderby('id', 'desc')->paginate(6);
        $roles = Role::all();
        $etablissements = Etablissement::all();
        return view('admin.role', compact('user', 'roles', 'etablissements'));
    }

    // public function download($document)
    // {
    //     return response()->download(public_path($document));
    // }

    public function modifierStatut(Request $request, $id){
        // dd(1);
    $inscrit = InscriptionConcour::findOrFail($id);
    $inscrit->update(['statut' => $request->input('statut')]);
    // $inscrit->statut = $request->input('statut');
    // dd($inscrit->statut);
    // $inscrit->save();
    return Redirect::back();
    // return response()->json(['success' => true]);

    }
    public function propos(){
        $temoignages = Temoignage::with('utilisateurs')->where('status', '=', 1)->get();
        $users = User::all()->count();
        $concours = Concour::all()->count();
        $etablissements = Etablissement::all()->count();
        return view('propos',compact('temoignages','users','concours','etablissements'));
    }

    public function indexCandidat()
    {

        $user = auth()->user();
        $medias = Media::where('user_id', '=', $user->id)->get();


        $inscriptionConcours = InscriptionConcour::where('user_id', '=', $user->id)->get();

        $resultats = []; // Initialisation du tableau


        foreach ($inscriptionConcours as $inscriptionConcour) {
            $concours = Concour::where('id', '=', $inscriptionConcour->concour_id)->first();

            // Ajouter le résultat à chaque tour de boucle dans le tableau
            $resultats[] = $concours;
        }

        $concourInscrit = $resultats;


        return view('candidat.dashboard', compact('user', 'medias', 'concourInscrit'));
    }

    public function folder()
    {
        $user = auth()->user();
        $concours = $user->concours;
        $inscriptionConcours = InscriptionConcour::where('user_id', $user->id)->with('users', 'concours')->get();
        return view('candidat.dossier', compact('concours', 'user', 'inscriptionConcours'));
    }
}
