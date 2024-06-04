<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConcourRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Concour;
use App\Models\Etablissement;

class ConcourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $concours = Concour::with('etablissement')->get();
        // dd($concours->etablissement->libelle);
        $concours = Concour::with('etablissement')->orderby('id', 'desc')->paginate(6);
        // Faire un dump pour voir les détails du concours et de l'établissement associé
        return view('concours.index', compact("concours"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (1 === $request->user()->etablissement_id) {
            $etablissement = Etablissement::all();
        } else {

            $etablissement = Etablissement::where('id', $request->user()->etablissement_id)->get();
        }
        // find($request->user()->etablissement_id)->get();
        // $concour = Concour::where('etablissement_id','=',$request->user()->etablissement_id)->get();
        return view('concours.create', compact('etablissement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConcourRequest $request)
    {
        $validated = $request->validated();
        // dd($request->has('image'));
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/';
            $file->move($path, $filename);
            // dd(1);
        }

        Concour::create([
            'image' => $path . $filename,
            'nom' => $request->nom,
            'description' => $request->description,
            'date_debut' => $request->date_debut,
            'date_fin'  => $request->date_fin,
            'etat' => $request->etat,
            'Frais' => $request->Frais,
            'etablissement_id' => $request->etablissement_id,
        ]);
        if ($request->user()->etablissement_id === 2) {
            return redirect('Admin_etablissement/dashboard')
                ->with('success', 'concour creer avec succès !');
        } else {
            return redirect()->route('admin')
                ->with('success', 'concour creer avec succès !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Concour $concour)
    {
        if (1 === $request->user()->etablissement_id) {
            $etablissement = Etablissement::all();
        } else {

            $etablissement = Etablissement::where('id', $request->user()->etablissement_id)->get();
        }
        // dd(1);
        return view('concours.edit', compact('concour', 'etablissement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConcourRequest $request, Concour $concour)
    {
        // dd($concour->id);
        $validated = $request->validated();
        $concour->update($validated);
        if ($request->user()->etablissement_id === 2) {
            return redirect('Admin_etablissement/dashboard')
                ->with('success', 'concour modifiée avec succès !');
        } else {
            return redirect()->route('admin')
                ->with('success', 'concour modifiée avec succès !');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Concour $concour)
    {
        $concour->delete();

        if ($request->user()->etablissement_id === 2) {
            return redirect('Admin_etablissement/dashboard')
                ->with('success', 'concour supprimer avec succès !');
        } else {
            return redirect()->route('admin')
                ->with('success', 'concour supprimer avec succès !');
        }
    }

    public function details($id)
    {
        $concour = Concour::where('id', $id)->first();
        // dd($concour);
        // dd($concour->image);
        return view('concours.details', compact('concour'));
    }
}
