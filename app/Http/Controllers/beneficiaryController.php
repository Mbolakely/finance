<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiary;

class BeneficiaryController extends Controller
{
    // fonction de listing
    public function list()
     {
        $beneficiary = Beneficiary::all();

        return response()->json($beneficiary, 200);

     }

    //  Fonction de suppression
     public function destroy($id)
     {
        $beneficiary = Beneficiary::findOrFail($id);
        
        $beneficiary->delete();

        return response()->json([
            'message' => 'supprimé avec succès',
         'status' => 200
        ]);
     }

    //  fonction d'affichage de details
     public function show($id)
     {
        $beneficiary = Beneficiary::findOrFail($id);
        
        return response()->json([
            'beneficiary' => $beneficiary,
            'status' => 200
        ]);
     }

    //  Fonction pour l'ajout
   public function add(Request $request) 
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'firstname' => 'nullable|string|max:100',
        'cin' => 'required|string|max:12|unique:beneficiary,cin',
        'sexe' => 'required|string|in:Femme,Homme',
        'contact' => 'required|digits:10',
        'adresse' => 'nullable|string|max:200',
        'state' => 'required|in:Actif,Inactif',
        'remark' => 'nullable|max:200'
    ]);

    $beneficiary = Beneficiary::create([
        'name'      => $validated['name'],
        'firstname' => $validated['firstname'] ?? null,
        'cin'       => $validated['cin'],
        'sexe'      => $validated['sexe'],
        'contact'   => $validated['contact'],
        'adresse'   => $validated['adresse'] ?? null,
        'state'     => $validated['state'],
        'remark'    => $validated['remark'] ?? null
    ]);

    return response()->json([
        'message' => "beneficiaire ajouté avec succès",
        'beneficiaire' => $beneficiary
    ]);
}

// Fonction pour la modification
public function update($id, Request $request) {

    $beneficiary = Beneficiary::findOrFail($id);

    $validated = $request->validate(
        [
        'name' => 'required|string|max:100',
        'firstname' => 'nullable|string|max:100',
        'cin' => 'required|string|max:12|unique:beneficiary,cin,' . $id . ',id',
        'sexe' => 'required|string|in:Femme,Homme',
        'contact' => 'required|digits:10',
        'adresse' => 'nullable|string|max:200',
        'state' => 'required|in:Actif,Inactif',
        'remark' => 'nullable|max:200'
        ]
        );
    
        // dd($beneficiary); 

    $beneficiary->update([
    'name' => $validated['name'],
    'firstname' => $validated['firstname'],
    'cin' => $validated['cin'],
    'sexe' => $validated['sexe'],
    'contact' => $validated['contact'],
    'adresse' => $validated['adresse'],
    'remark' => $validated['remark'],
]);

    $beneficiary->save();

     return response()->json([
        'message' => "beneficiaire modifié avec succès",
        'beneficiaire' => $beneficiary
    ]);
}
}
