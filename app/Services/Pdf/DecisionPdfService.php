<?php

namespace App\Services\Pdf;

use App\Models\Decision;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class DecisionPdfService
{
    public static function generate(Decision $decision): string
    {
        $view = match ($decision->type_decision) {
            'pension' => 'pdf.pension',
            'solde'   => 'pdf.solde',
            default   => throw new \Exception('Type de décision inconnu'),
        };

        $pdf = Pdf::loadView($view, [
            'decision' => $decision,
            'folder'   => $decision->folder
        ]);

        $path = "decisions/decision_{$decision->id}.pdf";

        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }
}