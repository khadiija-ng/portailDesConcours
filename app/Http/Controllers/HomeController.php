<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;
use App\Models\Concour;
use App\Models\User;
use App\Models\Role;

class HomeController extends Controller
{
    public function index (){
        $etablissement = Etablissement::all();
        $concour = Concour::all();
        return view('admin.dashboard', compact('etablissement','concour'));
    }

    public function indexetablissement(Request $request){

        $etablissement=Etablissement::find($request->user()->etablissement_id);
        $concour = Concour::where('etablissement_id','=',$etablissement->id)->get();
        return view('admin_etablissement.dashboard',compact('etablissement','concour'));
    }
    
    public function indexhome(){
        $concours = Concour::all();
        return view('home',compact('concours'));
    }
    public function etablissement(){
        $etablissement = Etablissement::all();
        return view('admin.etablissement',compact('etablissement'));
    }
    // public function candidater(){
        
    //     return view('candidater');
    // }

    public function role(){
        $user = User::all();
        $roles = Role::all();
        $etablissements = Etablissement::all();
        return view('admin.role',compact('user','roles','etablissements'));
    }
}
