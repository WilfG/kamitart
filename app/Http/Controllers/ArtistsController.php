<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\{Country, State, City};

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
        $data['countries'] = Country::get(["name", "id"]);
        return view('dashboard.artists.create', compact('data'));
    }

    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('firstname', 'lastname', 'phoneNumber', 'email', 'birthdate', 'city', 'state', 'country', 'address', 'bio'), [
            'firstname' =>  ['required', 'min:2', 'max:50', 'string'],
            'lastname' => ['required', 'min:2', 'max:50', 'string'],
            'bio' => ['required', 'min:2', 'max:500', 'string'],
            'birthdate' => ['nullable', 'min:2', 'max:50', 'string'],
            'city' => ['nullable', 'min:2', 'max:50', 'string'],
            'state' => ['nullable', 'min:2', 'max:50', 'string'],
            'country' => ['required', 'min:2', 'max:50', 'string'],
            'address' => ['required', 'min:2', 'max:100', 'string'],
            'email' => ['nullable', 'email', 'unique:artists,email'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }


        $artist = Artist::create([
            'firstname' =>  $request->firstname,
            'lastname' => $request->lastname,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'address' => $request->address,
            'bio' => $request->bio,
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
        // $arts = DB::table('arts')->where('artist_id', $id)->get();
        // var_dump($arts);die;
        $artist = DB::table('artists')
        ->join('countries', 'artists.country', 'countries.id')
        ->join('states', 'artists.state', 'states.id')
        ->join('cities', 'artists.city', 'cities.id')
        ->where('artists.id', $id)
        ->select(['artists.*', 'states.name as a_state', 'countries.name as a_country', 'cities.name as a_city'])
        ->first();
        $arts = DB::table('arts')->where('artist_id', $id)->get();
        return view('fronts.artists.show', compact('artist', 'arts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['countries'] = Country::get(["name", "id"]);
        $artist = Artist::where('id', $id)->first();
        return view('dashboard.artists.edit', compact('artist', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $validator = Validator::make($request->only('firstname', 'lastname', 'phoneNumber', 'email', 'birthdate', 'city', 'state', 'country', 'address', 'bio'), [
            'firstname' =>  ['required', 'min:2', 'max:50', 'string'],
            'lastname' => ['required', 'min:2', 'max:50', 'string'],
            'phoneNumber' => ['required', 'min:2', 'max:50', 'string'],
            'bio' => ['required', 'min:2', 'max:500', 'string'],
            'birthdate' => ['nullable', 'min:2', 'max:50', 'string'],
            'city' => ['required', 'min:2', 'max:50', 'string'],
            'state' => ['required', 'min:2', 'max:50', 'string'],
            'country' => ['required', 'min:2', 'max:50', 'string'],
            'address' => ['required', 'min:2', 'max:100', 'string'],
            'email' => ['nullable', 'email'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }


        $artist->update([
            'firstname' =>  $request->firstname,
            'lastname' => $request->lastname,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'address' => $request->address,
            'bio' => $request->bio,
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
