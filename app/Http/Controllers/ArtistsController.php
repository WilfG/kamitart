<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();
        return view('dashboard.artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('firstname', 'lastname', 'phoneNumber', 'email'), [
            'firstname' =>  ['required', 'min:2', 'max:50', 'string'],
            'lastname' => ['required', 'min:2', 'max:50', 'string'],
            'phoneNumber' => ['required', 'min:2', 'max:50', 'string'],
            'email' => ['nullable', 'email', 'unique:artists,email'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }


        $artist = Artist::create([
            'firstname' =>  $request->firstname,
            'lastname' => $request->lastname,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email
        ]);

        if ($artist) {
            return redirect('dashboard/artists');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.artists.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artist = Artist::where('id', $id)->first();
        return view('dashboard.artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $validator = Validator::make($request->only('firstname', 'lastname', 'phoneNumber', 'email'), [
            'firstname' =>  ['required', 'min:2', 'max:50', 'string'],
            'lastname' => ['required', 'min:2', 'max:50', 'string'],
            'phoneNumber' => ['required', 'min:2', 'max:50', 'string'],
            'email' => ['nullable', 'email'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }


        $artist->update([
            'firstname' =>  $request->firstname,
            'lastname' => $request->lastname,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email
        ]);

        return redirect()->back()->with('status', 'Artist informations updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
