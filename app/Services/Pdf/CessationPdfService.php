<?php

namespace App\Services\Pdf;

use App\Models\Cessation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class CessationPdfService
{
    public static function generate(Cessation $cessation): string
    {
        $path = "cessations/cessation_{$cessation->folder_id}.pdf";

        $pdf = Pdf::loadView('pdf.cessation', [
            'cessation' => $cessation,
            'folder'    => $cessation->folder
        ]);

        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }
}
