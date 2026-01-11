<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cessation;

class CessationController extends Controller
{
    public function list()
    {
        $cessation = Cessation::all();

        return response()->json($cessation,200);

    }

    public function show($id)
    {
        $cessation = Cessation::findOrFail($id);

        return response()->json([
            'cessation' => $cessation,
            'status' => 200
        ]);
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|string|max:50',
            'number' => 'required|string|max:50'
        ]);

        $cessation = Cessation::create([
            'date' => $validated['date'],
            'number' => $validated['number']
        ]);
    }
}
