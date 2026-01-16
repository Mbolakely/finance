<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financial;

class FinancialController extends Controller
{
    public function list() {

        $financial = Financial::all();

        return response()->json($financial,  200);
    }

    public function delete($id) {

        $financial = Financial::findOrFail($id);

        return response()->json($financial, 200);
    }

    public function show($id) {

        $financial = Financial::findOrFail($id);

        return response()->json([$financial, 200]);
    }

    public function add(Request $request) {

        $validated = $request->validate([
            'Numero_Visa' => 'required|string|max:365',
            'Date_Visa' => 'required|string|max:50',
            'Delegue_Regional' => 'nullable|max:100',
            'Nom_Beneficiaire' => 'required|string|max:100',
            'Nom_Defunt' => 'required|string|max:100'
        ]);

        $financial = Financial::create([
            'Nom_Defunt' => $validated['visa'],
            'Date_Visa' => $validated['visa_date'],
            'Delegue_Regional' => $validated['beneficiary'],
            'Nom_Beneficiaire' => $validated['deceased_name'],
            'Nom_Defunt' => $validated['regional_delegate'] ?? null
        ]);

        return response()->json([$financial, 200]);
    }

    public function update($id,Request $request) {

        $financial = Financial::findOrFail($id);

        $validated = $request->validate([
            'Numero_Visa' => 'required|string|max:365',
            'Date_Visa' => 'required|string|max:50',
            'Delegue_Regional' => 'nullable|max:100',
            'Nom_Beneficiaire' => 'required|string|max:100',
            'Nom_Defunt' => 'required|string|max:100'
        ]);

        $folder->update([
            'Nom_Defunt' => $validated['visa'],
            'Date_Visa' => $validated['visa_date'],
            'Delegue_Regional' => $validated['beneficiary'],
            'Nom_Beneficiaire' => $validated['deceased_name'],
            'Nom_Defunt' => $validated['regional_delegate'] ?? null
        ]);

        $folder->save();

        return response()->json([$financial, 200]);
    }
}