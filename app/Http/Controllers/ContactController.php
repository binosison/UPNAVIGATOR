<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data based on authentication status
        $validatedData = $request->validate($this->getValidationRules());

        // Save the contact query
        $contact = new Contact();

        // If the user is authenticated, populate fullname and email
        if (auth()->check()) {
            $contact->fullname = $validatedData['fullname'];
            $contact->email = $validatedData['email'];
            $contact->user_id = auth()->user()->id; // Save the user ID since the user is authenticated
        } else {
            // If not authenticated, set fullname and email to null
            $contact->fullname = null; // Or you can choose to set it to an empty string ''
            $contact->email = null; // Or you can choose to set it to an empty string ''
        }

        $contact->message = $validatedData['message'];
        $contact->save();

        // Redirect back or to a thank you page
        return redirect()->back()->with('success', 'Your query has been submitted successfully.');
    }

    // Method to return validation rules based on authentication
    private function getValidationRules()
    {
        if (auth()->check()) {
            // Authenticated users
            return [
                'fullname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string',
            ];
        } else {
            // Unauthenticated users
            return [
                'message' => 'required|string', // Only message is required
            ];
        }
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
