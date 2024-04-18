<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Concour;
use App\Models\Etablissement;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse|view
    {
        // dd(1);
        $request->authenticate();
        $request->session()->regenerate();
        if($request->user()->role_id === 1){
            return redirect('Admin/dashboard');
        }
        if($request->user()->role_id === 2){
             //dd($request->user()->etablissement_id);
            $etablissement=Etablissement::find($request->user()->etablissement_id);
            // dd($etablissement->sigle);
            //return redirect()->route('Admin_etablissement/dashboard',compact('etablissement'));
            $concour = Concour::where('etablissement_id','=',$etablissement->id)->get();
            return view('admin_etablissement.dashboard', compact('etablissement','concour'));
        }
        if($request->user()->role_id === 3){
            // $user = User::find()->get();
           return view('dashboard');
        }
       
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
