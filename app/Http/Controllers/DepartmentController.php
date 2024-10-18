<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{

public function index()
{
    
    $departments = Department::all(); // You can also use ->orderBy('created_at', 'desc') if needed.
    return view('departments.index') ->with('departments', $departments);
}


    // Show the form for creating a new department
    public function create()
    {
        return view('departments.create');
    }

    // Store a newly created department
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'building' => 'required|string|max:255',
            'dept_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Use image_path
            'description' => 'required|string',
        ]);

        
    // Handle the file upload
    $requestData = $request->all();

    if ($request->hasFile('dept_photo')) {
        $fileName = time() . '_' . $request->file('dept_photo')->getClientOriginalName();
        $filePath = $request->file('dept_photo')->storeAs('departments', $fileName, 'public'); 
        $requestData['photo'] = '/storage/' . $filePath; 
        Department::create($requestData);
        return redirect()->route('admin/departments')->with('success', 'Department added successfully.');
    }
}
    // Show the form for editing a department
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    // Update the department
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'building' => 'required|string|max:255',
            'dept_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Use image_path
            'description' => 'required|string',
        ]);

        // Handle photo replacement if a new photo is uploaded
        if ($request->hasFile('image_path')) {
            // Delete old photo
            if ($department->image_path) {
                Storage::disk('public')->delete($department->image_path);
            }

            // Store new photo
            $imagePath = $request->file('photo')->store('departments', 'public');
            $validated['photo'] = $imagePath; // Use image_path
        }

        // Update department
        $department->update($validated);

        return redirect()->route('admin/departments')->with('success', 'Department updated successfully.');
    }

    // Show a specific department
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.show', compact('department'));
    }

    // Delete the department
    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        // Delete the department's photo if it exists
        if ($department->image_path) {
            Storage::disk('public')->delete($department->image_path);
        }

        // Delete the department
        $department->delete();

        return redirect()->route('admin/departments')->with('success', 'Department deleted successfully.');
    }
}
