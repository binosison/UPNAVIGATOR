<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function submit(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'place_id' => 'required|exists:places,id',
        'comment' => 'required|string|max:255', // Adjust max length as needed
    ]);

    // Create a new Review instance
    $review = new Review();
    $review->place_id = $validatedData['place_id'];
    $review->content = $validatedData['comment']; // Adjust field name to match your form

    // If the user is authenticated, save the user ID
    if (auth()->check()) {
        $review->user_id = auth()->user()->id;
    }

    // Save the review
    $review->save();

    // Redirect back to the place's page with a success message
    return redirect()->back()->with('success', 'Review submitted successfully!');
}

    public function index()
    {
        $reviews = Review::orderBy('created_at', 'DESC')->get();

        return view('reviews/index', compact('reviews'));
    }

    public function create()
    {
        //
    }

    public function destroy(string $id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()->route('admin/reviews')->with('success', 'review deleted successfully');
    }
}
