<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Backup;

class BackupController extends Controller
{
    public function list() {

        $backup = Backup::all();

        return response()->json($backup, 200);
    }

    public function delete($id) {

        $backup = Backup::findOrFail($id);
        
        return $backup->delete();
    }

    public function show($id)
    {
        $backup = Backup::findOrFail($id);

        return response()->json([
            'backup' => $backup,
            'status' => 200
        ]);
    }

    public function add(Request $request)
    {
    $validated = $request->validate([
        'Numero_Visa'=> 'required|string|max:365',
        'Date_Visa' => 'required|string|max:30',
        'Numero_Bureau_Secours' => 'required|string|max:365',
        'Date_Decision' => 'required|string|max:365',
        'Nom_Beneficiaire' => 'required|string|max:100',
        'Numero_Pension' => 'required|string|max:10',
        'Budget_Alloue' => 'required|numeric|min:0'
    ]);

    $backup = Backup::create([
        'Numero_Visa' => $validated['Numero_Visa'],
        'Date_Visa' => $validated['Date_Visa'],
        'Numero_Bureau_Secours' => $validated['Numero_Bureau_Secours'],
        'Date_Decision' => $validated['Date_Decision'],
        'Nom_Beneficiaire' => $validated['Nom_Beneficiaire'],
        'Numero_Pension' => $validated['Numero_Pension'],
        'Budget_Alloue' => $validated['Budget_Alloue']
    ]);

    return response()->json([$backup, 200]);
}

public function update($id,Request $request) {

    $backup = Backup::findOrFail($id);

    $validated = $request->validate(
        [
        'Numero_Visa'=> 'required|string|max:365',
        'Date_Visa' => 'required|string|max:30',
        'Numero_Bureau_Secours' => 'required|string|max:365',
        'Date_Decision' => 'required|string|max:365',
        'Nom_Beneficiaire' => 'required|string|max:100',
        'Numero_Pension' => 'required|string|max:10',
        'Budget_Alloue' => 'required|numeric|min:0'
        ]
        );

    $backup->update([
        'Numero_Visa' => $validated['Numero_Visa'],
        'Date_Visa' => $validated['Date_Visa'],
        'Numero_Bureau_Secours' => $validated['Numero_Bureau_Secours'],
        'Date_Decision' => $validated['Date_Decision'],
        'Nom_Beneficiaire' => $validated['Nom_Beneficiaire'],
        'Numero_Pension' => $validated['Numero_Pension'],
        'Budget_Alloue' => $validated['Budget_Alloue']
    ]);

    $backup->save();

    return response()->json([
        'message' => "backup modifié avec succès",
        'backup' => $backup
    ]);
}
}
