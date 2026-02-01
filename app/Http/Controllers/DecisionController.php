<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Decision;
use App\Services\Pdf\DecisionPdfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DecisionController extends Controller
{
    public function index()
    {
        return Decision::with('folder')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'folder_id'     => 'required|exists:folders,id|unique:decisions,folder_id',
            'type_decision' => 'required|string',
            'numero_visa' => 'required|string',
            'decision_agent' => 'required|string',
            'budget' => 'required|numeric',
            'allocated_amount' => 'required|numeric',
            'numero_decision' => 'required|string',
            'code_imputation' => 'required|string',
            'remark' => 'nullable|string',
            'date_decision' => 'required|date',
        ]);

        $decision = Decision::create($data);
        $decision->fichier = DecisionPdfService::generate($decision);
        $decision->save();

        return response()->json([
            'decision' => $decision,
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
            'folder_id'     => 'required|exists:folders,id|unique:decisions,folder_id',
            'type_decision' => 'required|string',
            'numero_visa' => 'required|string',
            'decision_agent' => 'required|string',
            'budget' => 'required|numeric',
            'allocated_amount' => 'required|numeric',
            'numero_decision' => 'required|string',
            'code_imputation' => 'required|string',
            'remark' => 'nullable|string',
            'date_decision' => 'required|date',
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
    }

    public function view($folderId)
    {
        $decision = Decision::where('folder_id', $folderId)->firstOrFail();

        if (!$decision->fichier || !Storage::disk('public')->exists($decision->fichier)) {
            abort(404, 'Fichier introuvable');
        }

        //     dd([
        //     'fichier_en_base' => $decision->fichier,
        //     'exists' => Storage::disk('public')->exists($decision->fichier),
        //     'full_path' => Storage::disk('public')->path($decision->fichier),
        // ]);

        $path = Storage::disk('public')->path($decision->fichier);

        return response()->file(
            Storage::disk('public')->path($decision->fichier),
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="decision.pdf"',
                'Cache-Control' => 'public, max-age=0',
                'Pragma' => 'public',
            ]
        );
    }

    public function getDecisionUrl($folderId)
    {
        $decision = Decision::where('folder_id', $folderId)->firstOrFail();

        if (!$decision->fichier || !Storage::disk('public')->exists($decision->fichier)) {
            return response()->json(['message' => 'Fichier introuvable'], 404);
        }

        $url = asset('storage/' . $decision->fichier);

        return response()->json([
            'url' => $url,
            'headers' => [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline'
            ]
        ]);
    }
}
