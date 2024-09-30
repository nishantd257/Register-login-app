<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCities($state_id)
    {
        // Assuming you have a 'City' model where cities are stored in your database
        $cities = \App\Models\City::where('state_id', $state_id)->pluck('name', 'id');
        
        // Return the cities in JSON format
        return response()->json($cities);
    }
}
