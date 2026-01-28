<?php

namespace App\Services\Pdf;

use App\Models\Decision;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class DecisionPdfService
{
    public static function generate(Decision $decision): string
    {
        $path = "decisions/decision_{$decision->folder_id}.pdf";

        $pdf = Pdf::loadView('pdf.decision', [
            'decision' => $decision,
            'folder'   => $decision->folder
        ]);

        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }
}
