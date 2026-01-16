<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decompte;

class DecompteController extends Controller
{
    public function list() {

        $decompte = Decompte::all();

        return response()->json($decompte, 200);
    }

    public function show($id) {

        $decompte = decompte::findOrFail($id);

        return response()->json([
            'decompte' => $decompte,
            'status' => 200
        ]);
    }

    public function delete($id) {

        $decompte = decompte::findOrFail($id);

        return response()->json($decompte, 200);
    }

    public function add(Request $request) {

        $validated = $request->validate([
            'Folder_id' => 'required|string|max:100',
            'Montant' => 'required|string|min:0' 
        ]);

        $folder = Folder::create([
        'Folder_id' => $validated['Folder_id'],
        'Montant' => $validated['Montant']
    ]);

    return response()->json([$decompte, 200]);
}

public function update($id,Request $request) {

    $decompte = Decompte::findOrFail($id);

    $validated = $request->validate(
        [
            'Folder_id' => 'required|string|max:100',
            'Montant' => 'required|string|min:0' 
        ]
        );

    $decompte->update([
        'Folder_id' => $validated['Folder_id'],
        'Montant' => $validated['Montant']
    ]);

    $decompte->save();

    return response()->json([
        'message' => "decompte modifié avec succès",
        'decompte' => $decompte
    ]);
}
}

