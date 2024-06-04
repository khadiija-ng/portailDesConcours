<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Concour;
use App\Models\Media;
use App\Models\InscriptionConcour;
use App\Models\Intermediaire;
use Illuminate\Database\QueryException;

class InscriptionConcourController extends Controller
{
    public function inscriptionConcour(Request $request, $concourId)
    {
        // Vérifiez d'abord si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Charger les informations de l'utilisateur
        $user = Auth::user();

        // Vérifiez si l'utilisateur est null
        if ($user === null) {
            return redirect()->route('register');
        }
        $medias = Media::where('user_id', '=', $user->id)->get();
        // dd($medias);
        $concour = Concour::find($concourId);
        // dd($concour);
        $centres = Centre::where('etablissement_id', '=', $concour->etablissement->id)->get();
        // dd($centres);
        return view('candidater', compact('user', 'concourId', 'medias','centres'));
    }

    public function storeInscription(Request $request)
    {
        $user = Auth::user();
        // dd($user);
      
        try {
            $inscription = InscriptionConcour::create([
                'user_id' => $user->id,
                'concour_id' => $request->get('concour_id'),
                'centre_id' => $request->centre,
            ]);
            // dd($inscription);
            if($inscription){
                $selectedDocuments = $request->input('medias');
                //    dd($selectedDocuments);
                if ($selectedDocuments) {
                    foreach ($selectedDocuments as $documentId) {
                        // dd($documentId);
                        Intermediaire::create([
                            'inscription_concour_id' => $inscription->id,
                            'media_id' => $documentId,
                        ]);
                        // dd($test);
                    }
                }
               }
                // dd($inscription);
        
                return redirect()->route('folder')->with('message', 'Votre candidature a été enregistrée avec succès !');
            
            // Si la création réussit, poursuivez le traitement ici
        } catch (QueryException $e) {
            // dd(1);
            if ($e->errorInfo[1] === 1062) {
                // Si l'erreur est une violation de contrainte unique, gérer l'erreur ici
                if (strpos($e->getMessage(), 'inscription_concours_user_id_concour_id_unique') !== false) {
                    // Gérer spécifiquement la violation de contrainte unique pour les colonnes user_id et concour_id
                    // Vous pouvez alerter l'utilisateur ou effectuer d'autres actions nécessaires ici
                    $dejaInscrit="Vous avez deja inscrit a ce concour";
                    $concourId= $request->get('concour_id');
                    // Charger les informations de l'utilisateur
                    $user = Auth::user();

                    // Vérifiez si l'utilisateur est null
                    if ($user === null) {
                        return redirect()->route('register');
                    }
                    $medias = Media::where('user_id', '=', $user->id)->get();
                    // dd($medias);
                    $concour = Concour::find($concourId);
                    // dd($concour);
                    $centres = Centre::where('etablissement_id', '=', $concour->etablissement->id)->get();
                    // dd($centres);
                    return view('candidater', compact('user', 'concourId', 'medias','dejaInscrit','centres'));
                }
            } else {
                // Gérer d'autres erreurs SQL ici
                  }
        }

        // $request->validate([
        //     'inscription_concour_id' => 'required',
        //     'media_id' => 'required'
        // ]);
        // Enregistrer les documents choisis
        }
}
