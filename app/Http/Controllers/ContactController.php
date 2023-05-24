<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\ContactUpdateRequest;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('contact_access');
        $contacts = Contact::orderBy('id', 'DESC')->paginate(10); 
        return view( 'contacts.index', ['contacts' => $contacts] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('contact_create');
        return view( 'contacts.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $this->authorize('contact_edit');
        Contact::Create( $request->validated() );
        return redirect()->route('contacts.index')->with('success', 'Contact Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('contact_show');
        $contact = Contact::findOrFail($id);
        return view( 'contacts.show', ['contact' => $contact] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('contact_edit');
        $contact = Contact::findOrFail($id);
        return view( 'contacts.edit', ['contact' => $contact] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactUpdateRequest $request, $id)
    {
        $this->authorize('contact_edit');
        $contact = Contact::findOrFail($id);
        $contact->update(  $request->validated()  );
        return redirect()->route('contacts.index')->with('success', 'Contact Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('contact_delete');
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact Deleted !');
        
    }
}
