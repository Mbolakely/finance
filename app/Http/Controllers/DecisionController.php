<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decision;

class DecisionController extends Controller
{
    public function list() {

        $decision = Decision::all();

        return response()->json($decision, 200);
    }

    public function show($id)
    {
        $decision = decision::findOrFail($id);

        return response()->json([
            'decision' => $decision,
            'status' => 200
        ]);
    }

    public function delete($id) {

        $decision = decision::findOrFail($id);

        return response()->json($decision, 200);
    }


    public function add(Request $request) {

        $validated = $request->validate([
            'Numero_Decision' => 'required|string|max:10',
            'Numero_Visa' => 'required|string|max:365',
            'Numero_Matricule' => 'required|string|max:20',
            'Numero_CIN' => 'required|string|max:12',
            'Nom_defunt' => 'required|string|max:100',
            'Nom_Beneficiaire' => 'required|string|max:100',
            'Numero_Pension' => 'required|string|max:10',
            'Date_Deces' => 'required|string|max:20',
            'Secour_Deces' => 'required|numeric|min:0'
        ]);

        $decision = Decision::create([
            'Numero_Decision' => $validated['Numero_Decision'],
            'Numero_Visa' => $validated['Numero_Visa'],
            'Numero_Matricule' => $validated['Numero_Matricule'],
            'Numero_CIN' => $validated['Numero_CIN'],
            'Nom_defunt' => $validated['Nom_defunt'],
            'Nom_Beneficiaire' => $validated['Nom_Beneficiaire'],
            'Numero_Pension' => $validated['Numero_Pension'],
            'Date_Deces' => $validated['Date_Deces'],
            'Secour_Deces' => $validated['Secour_Deces']
        ]);

        return response()->json([$decision, 200]);
    }
    

    public function update($id,Request $request) {

        $decision = Decision::findOrFail($id);

        $validated = $request->validate([
            'Numero_Decision' => 'required|string|max:10',
            'Numero_Visa' => 'required|string|max:365',
            'Numero_Matricule' => 'required|string|max:20',
            'Numero_CIN' => 'required|string|max:12',
            'Nom_defunt' => 'required|string|max:100',
            'Nom_Beneficiaire' => 'required|string|max:100',
            'Numero_Pension' => 'required|string|max:10',
            'Date_Deces' => 'required|string|max:20',
            'Secour_Deces' => 'required|numeric|min:0'
        ]);

        $decision->update([
            'Numero_Decision' => $validated['Numero_Decision'],
            'Numero_Visa' => $validated['Numero_Visa'],
            'Numero_Matricule' => $validated['Numero_Matricule'],
            'Numero_CIN' => $validated['Numero_CIN'],
            'Nom_defunt' => $validated['Nom_defunt'],
            'Nom_Beneficiaire' => $validated['Nom_Beneficiaire'],
            'Numero_Pension' => $validated['Numero_Pension'],
            'Date_Deces' => $validated['Date_Deces'],
            'Secour_Deces' => $validated['Secour_Deces']
        ]);

        $decision->save();

        return response()->json([$decision, 200]);
    }
}
