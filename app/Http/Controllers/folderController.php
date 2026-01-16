<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\folder;

class folderController extends Controller
{
    public function lister() {

        $folder = folder::with('beneficiary')->get();

        return response()->json($folder, 200);
    }

    public function delete($id) {

        $folder = folder::findOrFail($id);
        
        return response()->json($folder, 200);
    }

    public function show($id)
    {
        $folder = Folder::findOrFail($id);

        return response()->json([
            'folder' => $folder,
            'status' => 200
        ]);
    }

    public function add(Request $request)
    {
    $validated = $request->validate([
        'matricule'=> 'required|string|max:20',
        'upload_date' => 'required|string|max:50',
        'beneficiary_id' => 'required|string|max:100',
        'folder_state' => 'required|in:Actif,Inactif',
        'remark' => 'nullable|max:200'
    ]);

    $folder = Folder::create([
        'matricule' => $validated['matricule'],
        'upload_date' => $validated['upload_date'],
        'beneficiary_id' => $validated['beneficiary_id'],
        'folder_state' => $validated['folder_state'],
        'remark' => $validated['remark'] ?? null
    ]);

    return response()->json([$folder, 200]);
}

public function update($id,Request $request) {

    $folder = Folder::findOrFail($id);

    $validated = $request->validate(
        [
        'matricule' => 'required|string|max:10',
        'upload_date' => 'required|string|max:50',
        'beneficiary_id' => 'required|string|max:100',
        'folder_state' => 'required|in:Actif,Inactif',
        'remark' => 'nullable|max:200'
        ]
        );

    $folder->update([
        'matricule' => $validated['matricule'],
        'upload_date' => $validated['upload_date'],
        'beneficiary_id' => $validated['beneficiary_id'],
        'folder_state' => $validated['folder_state'],
        'remark' => $validated['remark'],
    ]);

    $folder->save();

    return response()->json([
        'message' => "folder modifié avec succès",
        'folder' => $folder
    ]);
}
}