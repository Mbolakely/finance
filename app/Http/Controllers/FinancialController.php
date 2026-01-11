<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\financial;

class FinancialController extends Controller
{
    public function list() {

        $financial = financial::with('beneficiary')->get();

        return response()->json($folder,  200);
    }

    public function show($id) {

        $financial = Financial::findOrFail($id);

        return response()->json([$financial, 200]);
    }

    public function add(Request $request) {

        $validated = $request->validate([
            'visa' => 'required|string|max:365',
            'visa_date' => 'required|string|max:50',
            'regional_delegate' => 'nullable|max:100',
            'beneficiary' => 'required|string|max:100',
            'deceased_name' => 'required|string|max:100'
        ]);

        $financial = Financial::create([
            'visa' => $validated['visa'],
            'visa_date' => $validated['visa_date'],
            'beneficiary' => $validated['beneficiary'],
            'deceased_name' => $validated['deceased_name'],
            'regional_delegate' => $validated['regional_delegate'] ?? null
        ]);

        return response()->json([$financial, 200]);
    }

    public function update($id,Request $request) {

        $financial = Financial::findOrFail($id);

        $validated = $request->validate([
            'visa' => 'required|string|max:"365',
            'visa_number' => 'required|string|max:50',
            'beneficiary' => 'required|string|max:100',
            'regional_delegate' => 'nullable|max:100',
            'deceased_name' => 'required|string|max:100',
        ]);

        $folder->update([
            'visa' => $validated['visa'],
            'visa_number' => $validated['visa_number'],
            'regional_delegate' => $validated['regional_delegate'],
            'beneficiary' => $validated['beneficiary'],
            'deceased_name' => $validated['deceased_name'],
        ]);

        $folder->save();

        return response()->json([$financial, 200]);
    }
}