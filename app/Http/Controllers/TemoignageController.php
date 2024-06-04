<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;
use App\Models\User;


class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $temoins = Temoignage::with('utilisateurs')->orderby('id', 'asc')->paginate(6);
        // $temoignage = Temoignage::with('utilisateur')->get();
        return view('candidat.temoignages.index', compact('temoins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $userId = auth()->user()->id;
        return view('candidat.temoignages.create', compact('userId', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'user_id' => 'required',
            'temoigner' => 'required',
            'profil' => 'required',
            'status' => 'required'
        ]);
        $temoin = Temoignage::create([
            'user_id' => $user->id,
            'temoigner' => $request->temoigner,
            'profil' => $request->profil,
            'status' => $request->status
        ]);
        // dd($temoin);
        return redirect()->route('candidat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Temoignage $temoignage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temoignage $temoignage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Temoignage $temoignage)
    {
        $test = $temoignage->update(['status' => 1]);
        // dd($test);
        return redirect()->route('temoignage.index')->with('success', 'témoignage publié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temoignage $temoignage)
    {
        $temoignage->delete();

         return redirect()->route('temoignage.index');
    }
}
