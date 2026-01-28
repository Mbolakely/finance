<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Decision;
use App\Services\Pdf\DecisionPdfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DecisionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'folder_id'     => 'required|exists:folders,id|unique:decisions,folder_id',
            'type_decision' => 'required|string',
            'date_decision' => 'required|date',
        ]);

        $decision = Decision::create($data);
        $decision->fichier = DecisionPdfService::generate($decision);
        $decision->save();

        return response()->json([
            'data' => $decision,
            'status' => 200
        ]);
    }

    public function showByFolder($folderId)
    {
        return Decision::where('folder_id', $folderId)->firstOrFail();
    }

    public function update(Request $request, $id)
    {
        $decision = Decision::findOrFail($id);

        $data = $request->validate([
            'type_decision' => 'sometimes|string',
            'date_decision' => 'sometimes|date',
        ]);

        $decision->update($data);

        return $decision;
    }
    
    public function download($folderId)
    {
        $decision = Decision::where('folder_id', $folderId)->firstOrFail();

        if (!$decision->fichier) {
            return response()->json([
                'message' => 'Aucun fichier généré pour cette décision'
            ], 404);
        }

        if (!Storage::disk('public')->exists($decision->fichier)) {
            return response()->json([
                'message' => 'Fichier introuvable'
            ], 404);
        }

        $path = Storage::disk('public')->path($decision->fichier);
        return response()->download($path);
    }}
