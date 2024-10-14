<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentsController extends Controller
{
    public function index()
    {
        return Resident::all(); // Get all residents
    }

    public function show($id)
    {
        return Resident::findOrFail($id); // Get resident by ID
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|string',
            'status' => 'required|in:permanent,contract',
            'phone' => 'required|string|max:15',
            'isMarried' => 'required|boolean',
        ]);

        $resident = Resident::create($request->all()); // Create a new resident
        return response()->json($resident, 201); // Return created resident
    }

    public function update(Request $request, $id)
    {
        $resident = Resident::findOrFail($id);
        $resident->update($request->all()); // Update resident
        return response()->json($resident); // Return updated resident
    }

    public function destroy($id)
    {
        Resident::destroy($id); // Delete resident
        return response()->json(null, 204); // Return no content
    }
}
