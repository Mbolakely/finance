<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\folder;

class DecisionController extends Controller
{
    public function list() {

        $decision = decision::with('decision')->get();

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
            'decision_number' => 'required|string|max:10',
            'visa' => 'required|string|max:365',
            'IM' => 'required|string|max:20',
            'cin' => 'required|string|max:12',
            'deceased_name' => 'required|string|max:100',
            'beneficiary' => 'required|string|max:100',
            'pension_number' => 'required|string|max:10',
            'date_death' => 'required|string|max:20',
            'death_benefit' => 'required|string|max:100'
        ]);

        $decision = Decision::create([
            'decision_number' => $validated['decision_number'],
            'visa' => $validated['visa'],
            'IM' => $validated['IM'],
            'cin' => $validated['cin'],
            'deceased_name' => $validated['deceased_name'],
            'beneficiary' => $validated['beneficiary'],
            'pension_number' => $validated['pension_number'],
            'date_death' => $validated['date_death'],
            'death_benefit' => $validated['death_benefit']
        ]);

        return response()->json([$decision, 200]);
    }
    
    
    public function update($id,Request $request) {

        $decision = Decision::findOrFail($id);

        $validated = $request->validate([
            'decision_number' => 'required|string|max:10',
            'visa' => 'required|string|max:365',
            'IM' => 'required|string|max:20',
            'cin' => 'required|string|max:12',
            'deceased_name' => 'required|string|max:100',
            'beneficiary' => 'required|string|max:100',
            'pension_number' => 'required|string|max:10',
            'date_death' => 'required|string|max:20',
            'death_benefit' => 'required|string|max:100'
        ]);

        $decision->update([
            'decision_number' => $validated['decision_number'],
            'visa' => $validated['visa'],
            'IM' => $validated['IM'],
            'cin' => $validated['cin'],
            'deceased_name' => $validated['deceased_name'],
            'beneficiary' => $validated['beneficiary'],
            'pension_number' => $validated['pension_number'],
            'date_death' => $validated['date_death'],
            'death_benefit' => $validated['death_benefit']
        ]);

        $decision->save();

        return response()->json([$decision, 200]);
    }
}
