<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beneficiaire;
use Illuminate\Http\Request;

class BeneficiaireController extends Controller
{
    public function index()
    {
        return Beneficiaire::with('folders')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string',
            'firstname' => 'nullable|string',
            'adresse'   => 'required|string',
            'sexe'      => 'required|string',
            'contact'   => 'required|string',
            'cin'       => 'nullable|string',
            'email'     => 'nullable|email',
            'remark'    => 'nullable|string',
        ]);

        return Beneficiaire::create($data);
    }

    public function show($id)
    {
        return Beneficiaire::with('folders')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $beneficiaire = Beneficiaire::findOrFail($id);

        $data = $request->validate([
            'name'      => 'sometimes|string',
            'firstname' => 'nullable|string',
            'adresse'   => 'sometimes|string',
            'sexe'      => 'sometimes|string',
            'contact'   => 'sometimes|string',
            'cin'       => 'nullable|string',
            'email'     => 'nullable|email',
            'remark'    => 'nullable|string',
        ]);

        $beneficiaire->update($data);

        return $beneficiaire;
    }

    public function destroy($id)
    {
        Beneficiaire::findOrFail($id)->delete();
        return response()->json(['message' => 'Bénéficiaire supprimé']);
    }
}
