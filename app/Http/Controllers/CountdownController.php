<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\countdown;

class CountdownController extends Controller
{
    public function list() {

        $countdown = countdown::all();

        return response()->json($countdown, 200);
    }

    public function delete($id) {

        $countdown = Countdown::findOrFail($id);

        return response()->json($countdown, 200);
    }

    public function show($id) 
    {
        $countdown = Countdown::findOrFail($id);

        return response()->json([
            'countdown' => $countdown,
            'status' => 200
        ]);
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'beneficiary' => 'required|string|max:100',
            'deceased_name' => 'required|string|max:100',
            'six_one' => 'required|numeric|min:0',
            'six_two' => 'nullable|numeric|min:0',
            'six_three' => 'required|numeric|min:0',
            'six_four' => 'required|numeric|min:0',
            'six_five' => 'required|numeric|min:0',
            'six_six' => 'required|numeric|min:0',
            'six_seven' => 'required|numeric|min:0',
            'six_eight' => 'required|numeric|min:0',
            'six_nine' => 'required|numeric|min:0',
            'six_ten' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0'
        ]);

        $countdown = Countdown::create([
            'beneficiary' => $validated['beneficiary'],
            'deceased_name' => $validated['deceased_name'],
            'six_one' => $validated['six_one'],
            'six_two' => $validated['six_two'],
            'six_three' => $validated['six_three'],
            'six_four' => $validated['six_four'],
            'six_five' => $validated['six_five'],
            'six_six' => $validated['six_six'],
            'six_seven' => $validated['six_seven'],
            'six_eight' => $validated['six_eight'],
            'six_nine' => $validated['six_nine'],
            'six_ten' => $validated['six_ten'],
            'amount' => $validated['amount']
        ]);

        return response()->json([$countdown, 200]);
    }

    public function update($id, Request $request) {

        $countdown = Countdown::findOrFail($id);

        $validated = $request->validate([
            'beneficiary' => 'required|string|max:100',
            'deceased_name' => 'required|string|max:100',
            'six_one' => 'required|numeric|min:0',
            'six_two' => 'nullable|numeric|min:0',
            'six_three' => 'required|numeric|min:0',
            'six_four' => 'required|numeric|min:0',
            'six_five' => 'required|numeric|min:0',
            'six_six' => 'required|numeric|min:0',
            'six_seven' => 'required|numeric|min:0',
            'six_eight' => 'required|numeric|min:0',
            'six_nine' => 'required|numeric|min:0',
            'six_ten' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0'
        ]);
        
    $countdown->update([
            'beneficiary' => $validated['beneficiary'],
            'deceased_name' => $validated['deceased_name'],
            'six_one' => $validated['six_one'],
            'six_two' => $validated['six_two'],
            'six_three' => $validated['six_three'],
            'six_four' => $validated['six_four'],
            'six_five' => $validated['six_five'],
            'six_six' => $validated['six_six'],
            'six_seven' => $validated['six_seven'],
            'six_eight' => $validated['six_eight'],
            'six_nine' => $validated['six_nine'],
            'six_ten' => $validated['six_ten'],
            'amount' => $validated['amount']
]);

    $countdown->save();

     return response()->json([$countdown, 200]);
    }

}