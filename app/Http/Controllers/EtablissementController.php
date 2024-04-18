<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EtablissementRequest;
use App\Models\Etablissement;
use App\Models\Concour;
use App\Models\User;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etablissements = Etablissement::orderby('id','desc')->paginate(5);
        return view('etablissements.index', compact('etablissements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etablissements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtablissementRequest $request)
    { 
        $validated = $request->validated();
        if ($request->has('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/';
            $file->move($path, $filename);
            // dd(1);
        }
        Etablissement::create([
            'libelle' => $request->libelle,
            'sigle' => $request->sigle,
             'logo' => $path.$filename,
            'address' => $request->address,
        ]);
        return redirect()->route('etablissement')->with('success', "eteblissement ajouter avec succes");
    }

    /**
     * Display the specified resource.
     */
    public function show(Etablissement $etablissement,Request $request)
    {
        
        // $concour = Concour::where('etablissement_id','=',$request->user()->etablissement_id)->get();
        $concour = Concour::where('etablissement_id','=',$etablissement->id)->get();
        return view('etablissements.show',compact('etablissement','concour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etablissement $etablissement)
    {
        return view('etablissements.edit', compact('etablissement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EtablissementRequest $request, Etablissement $etablissement)
    {
        
        $validated = $request->validated();
        $etablissement->update($validated);
        return redirect()->route('etablissement')
            ->with('success', 'etablissement modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etablissement $etablissement)
    {
        $etablissement->delete();
        
        return redirect()->route('etablissement')
        ->with('success', "Concour supprimé avec succès !");
    }
}
