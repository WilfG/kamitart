<?php

namespace App\Http\Controllers;

use App\Events\ArtRequest as EventsArtRequest;
use App\Models\ArtRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ArtRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('fullname', 'email', 'description'), [
            'fullname' =>  ['required', 'min:2', 'max:50', 'string'],
            'email' => ['required', 'email'],
            'description' => ['required', 'min:2', 'max:50', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        $artRequest = ArtRequest::create([
            'fullname' =>  $request->fullname,
            'email' =>  $request->email,
            'description' => $request->description,
        ]);
        // event(new EventsArtRequest($request->input('email')));
        $email = $request->email;
        $name = $request->fullname;
        $subject = "Art's Request";
        Mail::send(
            'mail.art_request',
            ['name' => $request->fullname],
            function ($mail) use ($email, $name, $subject) {
                $mail->from(getenv('MAIL_FROM_ADDRESS'), "Artfric");
                $mail->to($email, $name);
                $mail->subject($subject);
            }
        );

        if ($artRequest) {
            return redirect()->back()->with('status', 'Your request is created successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
