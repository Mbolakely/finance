<?php

namespace App\Services\Pdf;

use App\Models\Decompte;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class DecomptePdfService
{
    public static function generate(Decompte $decompte): string
    {
        $path = "decomptes/decompte_{$decompte->folder_id}.pdf";

        $pdf = Pdf::loadView('pdf.decompte', [
            'decompte' => $decompte,
            'folder'   => $decompte->folder
        ]);

        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }
}
