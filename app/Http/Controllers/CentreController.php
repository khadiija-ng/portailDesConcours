<?php

namespace App\Http\Controllers;

use App\Models\Centre;
use Illuminate\Http\Request;
use App\Models\Etablissement;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $etablissement = Etablissement::where('id', $request->user()->etablissement_id)->first();
        $centres = Centre::where('etablissement_id','=',$etablissement->id)->get();
        return view('admin_etablissement.centres.index', compact('centres','etablissement'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (2 === $request->user()->etablissement_id){ 
        $etablissement = Etablissement::where('id', $request->user()->etablissement_id)->first();
    }
        return view('admin_etablissement.centres.create', compact('etablissement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (2 === $request->user()->etablissement_id){ 
            $etablissement = Etablissement::where('id', $request->user()->etablissement_id)->first();
        }
        $request->validate([
            'nom' => 'required',
            'etablissement_id' => 'required',
        ]);
       Centre::create([
            'nom' => $request->nom,
            'etablissement_id' =>$etablissement->id,
        ]);
        return redirect()->route('centre.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Centre $centre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centre $centre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centre $centre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centre $centre)
    {
        $centre->delete();
        return redirect()->route('centre.index')
                ->with('success', 'concour supprimer avec succès !');
    }
}
