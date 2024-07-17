<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    function index(){
        return view('welcome');
    }

    function contactUsView(){
        return view('contact');
    }
    
    function contactBookView(){

        $contacts = Contact::all();

        return view('contact_book', compact('contacts'));
    }
    
    function addContactView(){
        return view('add_contact');
    }
    
    function saveContact(Request $request){
        // Validate request
        $request->validate([
            'contactName' => 'required',
            'contactNumber' => 'required|min:10|numeric',
            'contactNumber' => 'max:10'
        ]);

        // Initialize Modal
        $contact = new Contact();
        $contact->name = $request->contactName;
        $contact->phone = $request->contactNumber;

        $contact->save();

        return redirect(route('viewContact'));
    }
    
    // edit contact
    function editContact($id){
        $contact = Contact::find($id); // fetch data
        return view('edit_contact', compact('contact'));
    }
    
    function updateContact(Request $request, $id){
        $contact = Contact::find($id); // fetch data
        
        $contact->name = $request->input('contactName');
        $contact->phone = $request->input('contactNumber');
        $contact->save();
        
        return redirect(route('viewContact'));
    }
    
    // delete contact
    function deleteContact($id){
        $contact = Contact::find($id); // fetch data
        $contact->delete();
        return redirect(route('viewContact'));
    }


}
