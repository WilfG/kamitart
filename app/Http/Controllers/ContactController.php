<?php

namespace App\Http\Controllers;

use App\Events\ContactUs;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('lastname','firstname', 'email', 'message'), [
            'firstname' =>  ['required', 'min:2', 'max:50', 'string'],
            'lastname' =>  ['required', 'min:2', 'max:50', 'string'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min:2', 'max:300', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }
        $contact = Contact::create([
            'firstname' =>  $request->firstname,
            'lastname' =>  $request->lastname,
            'email' =>  $request->email,
            'message' => $request->message,
        ]);
        // event(new ContactUs($request->input('email')));
        $email = $request->email;
        $name = $request->fullname;
        $subject = "Message received";
        Mail::send(
            'mail.contactus',
            ['name' => $request->fullname],
            function ($mail) use ($email, $name, $subject) {
                $mail->from(getenv('MAIL_FROM_ADDRESS'), "Artfric");
                $mail->to($email, $name);
                $mail->subject($subject);
            }
        );

        if ($contact) {
            return redirect()->back()->with('status', 'Your Message is successfully received.');
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
