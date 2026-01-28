<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cessation;
use App\Models\Decompte;
use Illuminate\Http\Request;

class CessationController extends Controller
{
    public function index()
    {
        return Cessation::with('folder')->get();
    }

    public function store(Request $request)
    {
        $cessation_validated = $request->validate([
            'folder_id'     => 'required|exists:folders,id|unique:cessations,folder_id',
            'six_one'       => 'required|numeric',
            'six_two'       => 'required|numeric',
            'six_three'     => 'required|numeric',
            'six_four'      => 'required|numeric',
            'six_five'      => 'required|numeric',
            'six_six'       => 'required|numeric',
            'six_seven'     => 'required|numeric',
            'six_eight'     => 'required|numeric',
            'six_nine'      => 'required|numeric',
            'six_ten'       => 'required|numeric',
            // 'amount'        => 'required|numeric',
            'date_cessation' => 'required|string',
            'remark'        => 'nullable|string',
        ]);

        $six_one = $cessation_validated['six_one'];
        $six_two = $cessation_validated['six_two'];
        $six_three = $cessation_validated['six_three'];
        $six_four = $cessation_validated['six_four'];
        $six_five = $cessation_validated['six_five'];
        $six_six = $cessation_validated['six_six'];
        $six_seven = $cessation_validated['six_seven'];
        $six_eight = $cessation_validated['six_eight'];
        $six_nine = $cessation_validated['six_nine'];
        $six_ten = $cessation_validated['six_ten'];

        $amount = $six_one + $six_two + $six_three + $six_four + $six_five + $six_six + $six_seven + $six_eight + $six_nine + $six_ten;

        $cessation = Cessation::create([
            'folder_id' => $cessation_validated['folder_id'],
            'six_one' => $cessation_validated['six_one'],
            'six_two' => $cessation_validated['six_two'],
            'six_three' => $cessation_validated['six_three'],
            'six_four' => $cessation_validated['six_four'],
            'six_five' => $cessation_validated['six_five'],
            'six_six' => $cessation_validated['six_six'],
            'six_seven' => $cessation_validated['six_seven'],
            'six_eight' => $cessation_validated['six_eight'],
            'six_nine' => $cessation_validated['six_nine'],
            'six_ten' => $cessation_validated['six_ten'],
            'date_cessation' => $cessation_validated['date_cessation'],
            'amount' => $amount
        ]);

        $final_amount = $cessation->amount;
        $decompte_amount = $final_amount * 3;

        $decompte = Decompte::create([
            'folder_id' => $cessation_validated['folder_id'],
            'amount' => $decompte_amount,
            'status' => 'en_attente'
        ]);

        return response()->json([
            'message' => 'Cessation et decompte enregistré avec succès',
            'cessation' => $cessation,
            'decompte' => $decompte,
            'status' => 200
        ]);
    }

    public function showByFolder($folderId)
    {
        return Cessation::where('folder_id', $folderId)->firstOrFail();
    }

    public function update(Request $request, $id)
    {
        $cessation = Cessation::findOrFail($id);

        $data = $request->validate([
            'six_one'        => 'sometimes|numeric',
            'six_two'        => 'sometimes|numeric',
            'six_three'      => 'sometimes|numeric',
            'six_four'       => 'sometimes|numeric',
            'six_five'       => 'sometimes|numeric',
            'six_six'        => 'sometimes|numeric',
            'six_seven'      => 'sometimes|numeric',
            'six_eight'      => 'sometimes|numeric',
            'six_nine'       => 'sometimes|numeric',
            'six_ten'        => 'sometimes|numeric',
            'amount'         => 'sometimes|numeric',
            'date_cessation' => 'sometimes|string',
            'remark'         => 'nullable|string',
        ]);

        $cessation->update($data);

        return $cessation;
    }
}
