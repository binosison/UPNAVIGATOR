<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Department; // Make sure to import the Department model
use App\Models\Facility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // Ensure only authenticated users can access these methods
       // $this->middleware('adminHome');
        $this->middleware('auth')->only('adminHome');
    }

    public function index()
    {
        // Fetch the places and departments from the database and pass them to the view
        $places = Place::orderBy('created_at', 'DESC')->get();
        $departments = Department::all(); // Fetch all departments
        $facilities = Facility::all();

        // Return the view 'home' with both places and departments variables
        return view('home')->with(['places' => $places, 'departments' => $departments, 'facilities' => $facilities]);
    }
    
    public function adminHome()
    {
        // Load the admin dashboard view
        return view('dashboard');
    }
}
