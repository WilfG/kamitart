<?php

namespace App\Http\Controllers;

use App\Events\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BidsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('oui');
        $validator = Validator::make($request->only('biderName', 'biderEmail', 'biderPrice', 'event_id'), [
            'biderName' =>  ['required', 'min:2', 'max:50', 'string'],
            'biderEmail' => ['required', 'email'],
            'biderPrice' => ['required', 'numeric'],
            'event_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('errors', $validator->errors());
        }

        // event(new Bid($request->input('biderEmail')));
        DB::table('bids')->insert([
            'biderName' =>  $request->biderName,
            'biderEmail' => $request->biderEmail,
            'biderPrice' => $request->biderPrice,
            'event_id' => $request->event_id
        ]);

        $email = $request->biderEmail;
        $name = $request->biderName;
        $subject = "Art's Request";
        Mail::send(
            'mail.bidding',
            ['name' => $request->biderName],
            function ($mail) use ($email, $name, $subject) {
                $mail->from(getenv('MAIL_FROM_ADDRESS'), "Artfric");
                $mail->to($email, $name);
                $mail->subject($subject);
            }
        );

        return redirect()->back()->with('status', 'You bid on this event successfully, check email.');
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
