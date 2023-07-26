<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $events = DB::table('events')->get();
        return view('dashboard.events.index', compact('events',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('title', 'description', 'date', 'imagePath'), [
            'title' =>  ['required', 'min:2', 'max:50', 'string'],
            'description' => ['required', 'min:2', 'max:191', 'string'],
            'date' => ['required', 'string'],
            'imagePath' => 'required',
            'imagePath' => 'file|mimes:jpeg,jpg,png,gif,PNG,JPG,JPEG',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }
        if ($request->hasfile('imagePath')) {

          
            $extension = explode('.', $request->file('imagePath')->getClientOriginalName())[1];
            $filename = uniqid() . '.' . $extension;
            $path = 'events_images';

            $event = DB::table('events')->insert([
                'title' =>  $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'imagePath' => $filename,
               
            ]);

            if ($event) {
                $request->file('imagePath')->move(public_path($path), $filename);
                return redirect('dashboard/events');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = DB::table('events')->where('id', $id)->first();
        return view('fronts.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = DB::table('events')->where('id', $id)->first();
        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->only('filename', 'title', 'description', 'date', 'imagePath'), [
            'title' =>  ['required', 'min:2', 'max:50', 'string'],
            'description' => ['required', 'min:2', 'max:191', 'string'],
            'date' => ['required', 'string'],
            'imagePath' => 'required',
            'imagePath' => 'file|mimes:jpeg,jpg,png,gif,PNG,JPG,JPEG',
            'filename' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $content_to_update = DB::table('events')->where('id', $id)->first();



        if ($request->hasfile('imagePath')) {
            $extension = explode('.', $request->file('imagePath')->getClientOriginalName())[1];
            $filename = uniqid() . '.' . $extension;
            $path = 'events_images';
           $event = DB::table('events')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'imagePath' => $filename
            ]);
            if (file_exists(public_path('events_images/' . $content_to_update->imagePath))) {
                unlink(public_path('events_images/' . $content_to_update->imagePath));
            }

            $request->file('imagePath')->move(public_path('events_images'), $filename);
            return redirect()->back()->with('status', 'Event updated with success.');
        } else {
            $event = DB::table('events')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
            ]);

            return redirect()->back()->with('status', 'Event updated with success.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
