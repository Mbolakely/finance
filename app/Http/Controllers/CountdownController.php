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
            'six_one' => 'required|digits:1000000',
            'six_two' => 'nullable|string|max:50',
            'six_three' => 'required|digits:1000000',
            'six_four' => 'required|digits:1000000',
            'six_five' => 'required|digits:1000000',
            'six_six' => 'required|digits:1000000',
            'six_seven' => 'required|digits:1000000',
            'six_eight' => 'required|digits:1000000',
            'six_nine' => 'required|digits:1000000',
            'six_ten' => 'required|digits:1000000',
            'amount' => 'required|digits:'
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
            'six_one' => 'required|digits:1000000',
            'six_two' => 'nullable|string|max:50',
            'six_three' => 'required|digits:1000000',
            'six_four' => 'required|digits:1000000',
            'six_five' => 'required|digits:1000000',
            'six_six' => 'required|digits:1000000',
            'six_seven' => 'required|digits:1000000',
            'six_eight' => 'required|digits:1000000',
            'six_nine' => 'required|digits:1000000',
            'six_ten' => 'required|digits:1000000',
            'amount' => 'required|digits:'
        ]);
        
    $countdown->update([
    'beneficiary'   => $validated['beneficiary'],
    'deceased_name' => $validated['deceased_name'],
    'six_one'       => $validated['six_one'],
    'six_two'       => $validated['six_two'],
    'six_three'     => $validated['six_three'],
    'six_four'      => $validated['six_four'],
    'six_five'      => $validated['six_five'],
    'six_six'       => $validated['six_six'],
    'six_seven'     => $validated['six_seven'],
    'six_eight'     => $validated['six_eight'],
    'six_nine'      => $validated['six_nine'],
    'six_ten'       => $validated['six_ten'],
    'amount'        => $validated['amount'],
]);

    $countdown->save();

     return response()->json([$countdown, 200]);
    }

}