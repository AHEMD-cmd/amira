<?php

namespace App\Http\Controllers;

use App\Site;
use App\Contact;
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
        if(auth()->user()->type == 'admin'){

            $contacts = Contact::all();
            $site = Site::first();
            return view('contacts.index', compact('contacts', 'site'));
        }else{
            return back();
        }
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email',
            'message' => 'required|string',
            'image' => 'nullable',
        ]);

        $imageName = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();
            $file->move(\public_path('contact/'),$imageName);
        }
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'image' => $imageName
        ]);
        return back()->with('con', 'asd');
    }


    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return back();
    }
}
