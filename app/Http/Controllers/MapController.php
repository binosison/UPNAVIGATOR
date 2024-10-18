<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    // Method to handle the Student Plaza page
    public function studentPlaza()
    {
        return view('student-plaza');
    }

    public function ptcBuilding()
    {
        return view('ptc-building');
    }

}
