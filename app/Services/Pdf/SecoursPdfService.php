<?php

namespace App\Services\Pdf;

use App\Models\Secours;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class SecoursPdfService
{
    public static function generate(Secours $secours): string
    {
        $path = "secours/secours_{$secours->folder_id}.pdf";

        $pdf = Pdf::loadView('pdf.secours', [
            'secours' => $secours,
            'folder'   => $secours->folder
        ]);

        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }
}
