<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Etablissement;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $etablissements = Etablissement::all();
        return view('utilisateurs.create',compact('roles', 'etablissements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'nationalite' => ['required'],
            'address' => ['required'],
            'phone' => ['required','max:255'],
            'date_de_naissance' => ['required','max:255'],
            'lieu_de_naissance' => ['required','string', 'max:255'],
            'etablissement_id'  => ['required','string', 'max:255'],
            'role_id' => ['required','string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'prenom' => $request->prenom,
            'nationalite' => $request->nationalite,
            'address' => $request->address,
            'phone' => $request->phone,
            'date_de_naissance' => $request->date_de_naissance,
            'etablissement_id' => $request->etablissement_id,
            'role_id' => $request->role_id,
            'lieu_de_naissance' => $request->lieu_de_naissance,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin')
        ->with('success', 'utilisateur ajouter avec succès !');
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
    public function edit($id)
    { 
        // dd($id);
        $roles = Role::all();
        $etablissements = Etablissement::all();
        $user = User::find($id);
        // dd($user);
        return view('utilisateurs.edit',compact('user','roles','etablissements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        // dd($request);
        $validated =$request->validated();
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'prenom' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'etablissement_id' => 'required',
        //     'role_id'  => 'required',
        //     'natinalite' => 'required',
        //     'address' => 'required',
        //     'phone' => 'required',
        //     'lieu_de_naissance' => 'required',
        //     'date_de_naissance' => 'required', 
        // ]);
        // dd($validated);
       $user = User::find($id);
       $user->update($validated);
      
        return redirect()->route('admin')
        ->with('success', 'bien ajouter');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin')
        ->with('success', 'bien ajouter');
    }
}
