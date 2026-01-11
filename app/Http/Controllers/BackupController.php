<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\backup;

class BackupController extends Controller
{
    public function list() {

        $backup = backup::with('beneficiary')->get();

        return response()->json($backup, 200);
    }

    public function delete($id) {

        $backup = backup::findOrFail($id);
        
        return response()->json($backup, 200);
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
        'visa'=> 'required|string|max:365',
        'date_visa' => 'required|string|max:30',
        'backup_number' => 'required|string|max:365',
        'decision_date' => 'required|string|max:365',
        'beneficiary' => 'required|string|max:100',
        'pension_number' => 'required|string|max:10',
        'budget' => 'required|string|max:200'
    ]);

    $backup = Backup::create([
        'visa' => $validated['visa'],
        'date_visa' => $validated['date_visa'],
        'backup_number' => $validated['backup_number'],
        'decision_date' => $validated['decision_date'],
        'beneficiary' => $validated['beneficiary'],
        'pension_number' => $validated['pension_number'],
        'budget' => $validated['budget']
    ]);

    return response()->json([$backup, 200]);
}

public function update($id,Request $request) {

    $backup = Backup::findOrFail($id);

    $validated = $request->validate(
        [
        'visa' => 'required|string|max:365',
        'date_visa' => 'required|string|max:30',
        'backup_number' => 'required|string|max:365',
        'decision_date' => 'required|string|max:365',
        'beneficiary' => 'required|string|max:100',
        'pension_number' => 'required|string|max:10',
        'budget' => 'required|string|max:200'
        ]
        );

    $backup->update([
        'visa' => $validated['visa'],
        'date_visa' => $validated['date_visa'],
        'backup_number' => $validated['backup_number'],
        'decision_date' => $validated['decision_date'],
        'beneficiary' => $validated['beneficiary'],
        'pension_number' => $validated['pension_number'],
        'budget' => $validated['budget'],
    ]);

    $backup->save();

    return response()->json([
        'message' => "backup modifié avec succès",
        'backup' => $backup
    ]);
}
}
