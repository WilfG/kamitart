<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        $artists = DB::table('artists')->get();
        $arts = DB::table('arts')->get();
        return view('dashboard.arts.index', compact('arts', 'categories', 'artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = DB::table('artists')->get();
        $categories = DB::table('categories')->get();
        return view('dashboard.arts.create', compact('artists', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('title', 'description', 'status', 'sale_price', 'artPath', 'artist_id', 'categorie_id'), [
            'title' =>  ['required', 'min:2', 'max:50', 'string'],
            'description' => ['required', 'min:2', 'max:191', 'string'],
            'status' => ['required', 'string'],
            'sale_price' => ['nullable', 'numeric'],
            'artPath' => 'required',
            'artPath' => 'file|mimes:jpeg,jpg,png,gif,PNG,JPG,JPEG',
            'artist_id' => ['required', 'numeric'],
            'categorie_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }
        if ($request->hasfile('artPath')) {

            if ($request->status == 'no') {
                $status = 0;
            } else {
                $status = 1;
            }
            $extension = explode('.', $request->file('artPath')->getClientOriginalName())[1];
            $filename = $request->title . '.' . $extension;
            $path = 'arts_images';

            $art = DB::table('arts')->insert([
                'title' =>  $request->title,
                'description' => $request->description,
                'status' => $status,
                'sale_price' => $request->sale_price,
                'artPath' => $filename,
                'artist_id' => $request->artist_id,
                'categorie_id' => $request->categorie_id,
            ]);

            if ($art) {
                $request->file('artPath')->move(public_path($path), $filename);
                return redirect('dashboard/arts');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.arts.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $art = Art::where('id', $id)->first();
        // $artists = Artist::all();
        return view('dashboard.arts.edit', compact('art', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->only('filename', 'title', 'description', 'status', 'sale_price', 'artPath', 'artist_id', 'categorie_id'), [
            'title' =>  ['required', 'min:2', 'max:50', 'string'],
            'description' => ['nullable', 'min:2', 'max:191', 'string'],
            'status' => ['nullable', 'string'],
            'sale_price' => ['nullable', 'numeric'],
            'artPath' => 'nullable',
            'artPath' => 'file|mimes:jpeg,jpg,png,gif,PNG,JPG,JPEG',
            'artist_id' => ['required', 'numeric'],
            'categorie_id' => ['required', 'numeric'],
            'filename' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $content_to_update = DB::table('arts')->where('id', $id)->first();
        
        if ($request->status == 'no') {
            $status = 0;
        } else {
            $status = 1;
        }

        if ($request->hasfile('artPath')) {
            $extension = explode('.', $request->file('artPath')->getClientOriginalName())[1];
            $filename = $request->title . '.' . $extension;
            $path = 'arts_images';
            // $request->file('artPath')->move(public_path($path), $filename);
            $art = DB::table('arts')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $status,
                'sale_price' => $request->sale_price,
                'artPath' => $filename
            ]);
            if (file_exists(public_path('arts_images/'. $content_to_update->artPath))) {
                unlink(public_path('arts_images/'. $content_to_update->artPath));
            }
            
                $request->file('artPath')->move(public_path('arts_images'),$filename);
                return redirect()->back()->with('status', 'Art updated with success.');
            
        } else {
            $art = DB::table('arts')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $status,
                'sale_price' => $request->sale_price
            ]);
           
                return redirect()->back()->with('status', 'Art updated with success.');
          
        }
        // dd($status);

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
