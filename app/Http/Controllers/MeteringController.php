<?php

namespace App\Http\Controllers;

use App\Models\Metering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeteringController extends Controller
{
    // List all metering
    public function index()
    {
        return response()->json(Metering::all(), 200);
    }

    // Store a new metering
    // public function store(Request $request)
    // {
    //     $metering = Metering::create($request->all());
    //     return response()->json($metering, 201);
    // }

    public function store(Request $request)
    {
        $validatedData = $request->all();

        try {
            // Create a new Metering instance and save it
            Metering::create($validatedData);
            return response()->json(['message' => 'Data inserted successfully'], 201);
        } catch (\Exception $e) {
            // Log and return error if insertion fails
            Log::error('Error inserting data: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while inserting data.'], 500);
        }
    }

    // Show a specific metering
    public function show($id)
    {
        $metering = Metering::find($id);
        if (!$metering) {
            return response()->json(['error' => 'metering not found'], 404);
        }
        return response()->json($metering, 200);
    }

    // Update an metering
    public function update(Request $request, $id)
    {
        $metering = Metering::find($id);
        if (!$metering) {
            return response()->json(['error' => 'metering not found'], 404);
        }
        $metering->update($request->all());
        return response()->json($metering, 200);
    }

    // Delete an metering
    public function destroy($id)
    {
        $metering = Metering::find($id);
        if (!$metering) {
            return response()->json(['error' => 'metering not found'], 404);
        }
        $metering->delete();
        return response()->json(['message' => 'metering deleted'], 200);
    }
}
