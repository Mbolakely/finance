<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Decompte;
use Illuminate\Http\Request;

class DecompteController extends Controller
{
     public function index()
    {
        return Decompte::with('folder')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'folder_id' => 'required|exists:folders,id|unique:decomptes,folder_id',
            'amount'    => 'required|numeric',
            'status'    => 'required|string',
        ]);

        return Decompte::create($data);
    }

    public function showByFolder($folderId)
    {
        return Decompte::where('folder_id', $folderId)->firstOrFail();
    }

    public function update(Request $request, $id)
    {
        $decompte = Decompte::findOrFail($id);

        $data = $request->validate([
            'amount' => 'sometimes|numeric',
            'status' => 'sometimes|string',
        ]);

        $decompte->update($data);

        return $decompte;
    }
}
