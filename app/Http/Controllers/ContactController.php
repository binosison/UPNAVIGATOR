<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'You need to sign in to send a message.');
        }
        // Validate the form data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Save the contact query
        $contact = new Contact();
        $contact->fullname = $validatedData['fullname'];
        $contact->email = $validatedData['email'];
        $contact->message = $validatedData['message'];

        // If the user is authenticated, save the user ID
        if (auth()->check()) {
            $contact->user_id = auth()->user()->id;
        }

        $contact->save();

        // Redirect back or to a thank you page
        return redirect()->back()->with('success', 'Your query has been submitted successfully.');
    }

    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'DESC')->get();

        return view('contacts.index', compact('contacts'));
    }

    public function destroy(string $id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->route('admin/contacts')->with('success', 'Query deleted successfully');
}



}
