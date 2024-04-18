<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Concour;
use App\Models\InscriptionConcour;



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
       
       return view('candidater',compact('user','concourId'));
    
    }
     
    public function storeInscription(Request $request){
        $user = Auth::user();
        // dd($user);
        $request->validate([
            // 'user_id' => 'required',
            'concour_id' => 'required',
            'centre' => 'required'
        ]);
        InscriptionConcour::create([
            'user_id' => $user->id,
            'concour_id' => $request->get('concour_id'),
            'centre' => $request->centre
        ]);
        // dd($inscription);
    
        return redirect()->route('dashboard')->with('message', 'Votre candidature a été enregistrée avec succès !');
    
    }
}
