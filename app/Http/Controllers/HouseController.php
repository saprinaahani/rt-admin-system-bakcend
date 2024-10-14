<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        return House::with('residents')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'status' => 'required|string|in:dihuni,tak dihuni',
        ]);

        $house = House::create($request->all());

        return response()->json($house, 201);
    }

    public function show($id)
    {
        return House::with('residents')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|string|in:dihuni,tak dihuni',
        ]);

        $house = House::findOrFail($id);
        $house->update($request->only(['address', 'status']));

        return response()->json($house);
    }

    public function destroy($id)
    {
        House::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
