<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return view('places.index')->with('places', $places);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'place' => 'required',
        'location' => 'required',
        'place_photo' => 'required|image', // Ensure it's an image and within file size limits
        'description' => 'required',
    ]);

    // Handle the file upload
    $requestData = $request->all();

    if ($request->hasFile('place_photo')) {
        $fileName = time() . '_' . $request->file('place_photo')->getClientOriginalName();
        $filePath = $request->file('place_photo')->storeAs('images', $fileName, 'public'); // Save to public storage
        $requestData['photo'] = '/storage/' . $filePath; // Store path to access image later
        Place::create($requestData);
        return redirect('admin/places')->with('flash_message', 'Place Added successfully!');
    }

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $place = Place::findOrFail($id);
        return view('places.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $place = Place::findOrFail($id);
        return view('places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $place = Place::findOrFail($id);

        $requestData = $request->except('place_photo');

        if ($request->hasFile('place_photo')) {
            $fileName = time() . '_' . $request->file('place_photo')->getClientOriginalName();
            $filePath = $request->file('place_photo')->storeAs('images', $fileName, 'public');
            $requestData['photo'] = '/storage/' . $filePath;
        }

        $place->update($requestData);

        return redirect()->route('admin/places')->with('success', 'Place updated successfully');
    }

public function destroy($id)
{
    // Find the place by ID
    $place = Place::find($id);

    // Check if the place exists before attempting to delete it
    if ($place) {
        // Check if the place has an associated image and delete it
        if ($place->photo && Storage::disk('public')->exists(str_replace('/storage/', '', $place->photo))) {
            // Remove the image from storage
            Storage::disk('public')->delete(str_replace('/storage/', '', $place->photo));
        }

        // Delete the place record from the database
        $place->delete();
        
        // Redirect with success message
        return redirect()->route('admin/places')->with('success', 'Place deleted successfully!');
    }

    // If place not found, return error response
    return redirect()->route('admin/places')->with('error', 'Place not found!');
}


}
