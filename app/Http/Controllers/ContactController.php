<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.contact')->with('contact', 'active');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contact $contact)
    {
        $this->validate($request, $contact::$contactRules);

        $request->merge(array_map('trim', $request->except('_token')));

        $contact->create($request->all());

        // Send mail to the CEFE organization
        $fromEmail = $request->get('email');

        $fromName = $request->get('name');

        \Mail::send('emails.contact_email', array('content' => $request->get('message')), function($message) use ($fromEmail, $fromName)
        {           
           //$message->to('contact@getyesproject.com', 'Association of citizens CEFE');
           $message->to('najdovskadijana@gmail.com', 'Association of citizens CEFE');
           $message->from($fromEmail, $fromName);
           $message->subject('New message through the contact form');
        });

        return redirect()->route('contact')->with('success', 'Your message was successfully sent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
