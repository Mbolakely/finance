<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cessation;

class CessationController extends Controller
{
    public function list()
    {
        $cessation = Cessation::all();

        return response()->json($cessation,200);

    }

    public function delete($id) {

        $cessation = Cessation::findOrFail($id);

        return response()->json($cessation, 200);
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
            'date_cessation' => 'required|string|max:50',
            'number_cessation' => 'required|string|max:50'
        ]);

        $cessation = Cessation::create([
            'date_cessation' => $validated['date_cessation'],
            'number_cessation' => $validated['number_cessation']
        ]);

        return response()->json([$cessation, 200]);
    }

    public function update($id,Request $request) {

        $cessation = Cessation::findOrFail($id);

        $validated =  $request->validate([
            'date_cessation' => 'required|string|max:50',
            'number_cessation' => 'required|string|max:50'
        ]);

        $cessation->update([
            'date_cessation' => $validated['date_cessation'],
            'number_cessation' => $validated['number_cessation']
        ]);

        $cessation->save();

        return response()->json([
            'message' => "cessation modifié avec succès",
            'cessation' => $cessation
        ]);
    }
}
