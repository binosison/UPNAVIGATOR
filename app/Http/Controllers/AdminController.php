<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Profile page view
    public function profilepage()
    {
        return view('profile');
    }

    // Fetch and display reviews
    public function index()
    {
        // Fetch all reviews with user relationship, ordered by creation date
        $reviews = Review::with('user')->orderBy('created_at', 'DESC')->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    // Update profile method
    public function updateProfile(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        // Find the authenticated admin user
        $admin = Auth::user();

        // Check if the current password field is filled
        if ($request->filled('current_password')) {
            // Verify that the current password matches the existing password
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect']);
            }

            // If the current password is correct, update to the new password
            $admin->password = Hash::make($request->new_password);
        }

        // Update the user's name and email
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
