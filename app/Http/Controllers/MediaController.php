<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\User;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user=User::find($request->user()->user_id);
        $media = Media::where('user_id','=',$user->id)->get();
        return view('candidat.dashboard',compact('user','media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        // $user=User::where('id',$request->user_id)->first();
        // dd($user->id);
        return view('medias.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaRequest $request)
    {
        $validated = $request->validated();
        // dd($request->has('image'));
        if ($request->has('document')) {
        $file = $request->file('document');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'documents/';
        $file->move($path, $filename);
        // dd(1);
    }
        
        Media::create([
            'libelle' => $request->libelle,
            'document' =>$path.$filename,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('candidat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    //    dd($id);
       $media = Media::find($id);
       $media->delete();

        return redirect()->route('candidat');
    }
}
