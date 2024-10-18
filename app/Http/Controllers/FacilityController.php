<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
{
    $facilities = Facility::all(); // Retrieve all facilities
    return view('facilities.index')->with('facilities', $facilities); // Pass it to the view
}


    // Show the form for creating a new facility
    public function create()
    {
        return view('facilities.create');
    }

    // Store a newly created facility
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'building' => 'required|string|max:255',
            'gsd_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Changed to gsd_photo
            'description' => 'required|string',
        ]);

        // Handle the file upload
        $requestData = $request->all();
        if ($request->hasFile('gsd_photo')) {
            $fileName = time() . '_' . $request->file('gsd_photo')->getClientOriginalName();
            $filePath = $request->file('gsd_photo')->storeAs('facilities', $fileName, 'public'); 
            $requestData['image_path'] = '/storage/' . $filePath; 
            Facility::create($requestData);
            return redirect()->route('admin/facilities')->with('success', 'Facility added successfully.');
        }
    }

    // Show the form for editing a facility
    public function edit($id)
    {
        $facility = Facility::findOrFail($id);
        return view('facilities.edit', compact('facility'));
    }

    // Update the facility
    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);

        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'building' => 'required|string|max:255',
            'gsd_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Changed to gsd_photo
            'description' => 'required|string',
        ]);

        // Handle photo replacement if a new photo is uploaded
        if ($request->hasFile('gsd_photo')) {
            // Delete old photo
            if ($facility->image_path) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $facility->image_path));
            }

            // Store new photo
            $newImagePath = $request->file('gsd_photo')->store('facilities', 'public');
            $validated['image_path'] = '/storage/' . $newImagePath; // Set the correct field
        }

        // Update facility
        $facility->update($validated);

        return redirect()->route('admin/facilities')->with('success', 'Facility updated successfully.');
    }

    // Show a specific facility
    public function show($id)
    {
        $facility = Facility::findOrFail($id);
        return view('facilities.show', compact('facility'));
    }

    // Delete the facility
    public function destroy($id)
    {
        $facility = Facility::findOrFail($id);

        // Delete the facility's photo if it exists
        if ($facility->image_path) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $facility->image_path));
        }

        // Delete the facility
        $facility->delete();

        return redirect()->route('admin/facilities')->with('success', 'Facility deleted successfully.');
    }
}
