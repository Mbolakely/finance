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
            'secours'       => $secours,
            'folder'        => $secours->folder,
            'beneficiaires' => $secours->folder->beneficiaires
        ])->setPaper('A4', 'portrait');

        Storage::disk('public')->put($path, $pdf->output());

        $secours->update([
            'fichier' => $path
        ]);

        return $path;
    }
}
