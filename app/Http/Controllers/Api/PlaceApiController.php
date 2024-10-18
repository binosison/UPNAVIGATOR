<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlaceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $places = Place::all();
        return response()->json($places);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'place' => 'required',
            'location' => 'required',
            'map_link' => 'nullable|url',
            'place_photo' => 'required|image|max:2048',
            'description' => 'required',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Upload place photo
        $filePath = $request->file('place_photo')->store('images', 'public');

        // Create new Place
        $place = new Place();
        $place->place = $request->input('place');
        $place->location = $request->input('location');
        $place->map_link = $request->input('map_link');
        $place->photo = '/storage/' . $filePath;
        $place->description = $request->input('description');
        $place->save();

        return response()->json(['message' => 'Place created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $place = Place::find($id);
        
        if (!$place) {
            return response()->json(['error' => 'Place not found'], 404);
        }

        return response()->json($place);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Find the place
        $place = Place::find($id);

        // If place not found, return error response
        if (!$place) {
            return response()->json(['error' => 'Place not found'], 404);
        }

        // Validation rules
        $validator = Validator::make($request->all(), [
            'place' => 'required',
            'location' => 'required',
            'map_link' => 'nullable|url',
            'place_photo' => 'nullable|image|max:2048',
            'description' => 'required',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Update place fields
        $place->place = $request->input('place');
        $place->location = $request->input('location');
        $place->map_link = $request->input('map_link');
        $place->description = $request->input('description');

        // Update place photo if provided
        if ($request->hasFile('place_photo')) {
            $filePath = $request->file('place_photo')->store('images', 'public');
            $place->photo = '/storage/' . $filePath;
        }

        $place->save();

        return response()->json(['message' => 'Place updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Find the place
        $place = Place::find($id);

        // If place not found, return error response
        if (!$place) {
            return response()->json(['error' => 'Place not found'], 404);
        }

        // Delete place
        $place->delete();

        return response()->json(['message' => 'Place deleted successfully'], 200);
    }
}
