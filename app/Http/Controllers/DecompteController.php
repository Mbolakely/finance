<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Decompte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function view($folderId)
    {
        $decompte = Decompte::where('folder_id', $folderId)->firstOrFail();

        if (!$decompte->fichier || !Storage::disk('public')->exists($decompte->fichier)) {
            abort(404, 'Fichier introuvable');
        }

        //     dd([
        //     'fichier_en_base' => $decision->fichier,
        //     'exists' => Storage::disk('public')->exists($decision->fichier),
        //     'full_path' => Storage::disk('public')->path($decision->fichier),
        // ]);

        $path = Storage::disk('public')->path($decompte->fichier);

        return response()->file(
            Storage::disk('public')->path($decompte->fichier),
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="decompte.pdf"',
                'Cache-Control' => 'public, max-age=0',
                'Pragma' => 'public',
            ]
        );
    }

}
