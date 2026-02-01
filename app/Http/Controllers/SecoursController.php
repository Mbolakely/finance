<?php

namespace App\Http\Controllers;

use App\Models\Secours;
use App\Services\Pdf\DecisionPdfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SecoursController extends Controller
{
        public function index()
    {
        return Secours::with('folder')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'folder_id'     => 'required|exists:folders,id|unique:secours,folder_id',
            'numero_secours' => 'required|string',
        ]);

        $secours = Secours::create($data);
        $secours->fichier = DecisionPdfService::generate($secours);
        $secours->save();

        return response()->json([
            'secours' => $secours,
            'status' => 200
        ]);
    }

    public function showByFolder($folderId)
    {
        return Secours::where('folder_id', $folderId)->firstOrFail();
    }

    public function update(Request $request, $id)
    {
        $Secours = Secours::findOrFail($id);

        $data = $request->validate([
             'folder_id'     => 'required|exists:folders,id|unique:secours,folder_id',
             'numero_secours' => 'required|string',
        ]);

        $Secours->update($data);

        return $Secours;
    }
    
    public function download($folderId)
    {
        $Secours = Secours::where('folder_id', $folderId)->firstOrFail();

        if (!$Secours->fichier) {
            return response()->json([
                'message' => 'Aucun fichier généré pour ce secours'
            ], 404);
        }

        if (!Storage::disk('public')->exists($Secours->fichier)) {
            return response()->json([
                'message' => 'Fichier introuvable'
            ], 404);
        }

        $path = Storage::disk('public')->path($Secours->fichier);
        return response()->download($path);
    }

    public function view($folderId)
    {
        $secours = Secours::where('folder_id', $folderId)->firstOrFail();

        if (!$secours->fichier || !Storage::disk('public')->exists($secours->fichier)) {
            abort(404, 'Fichier introuvable');
        }

        //     dd([
        //     'fichier_en_base' => $decision->fichier,
        //     'exists' => Storage::disk('public')->exists($decision->fichier),
        //     'full_path' => Storage::disk('public')->path($decision->fichier),
        // ]);

        $path = Storage::disk('public')->path($secours->fichier);

        return response()->file(
            Storage::disk('public')->path($secours->fichier),
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="secours.pdf"',
                'Cache-Control' => 'public, max-age=0',
                'Pragma' => 'public',
            ]
        );
    }

}