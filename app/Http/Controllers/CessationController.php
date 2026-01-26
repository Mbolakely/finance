<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cessation;
use Illuminate\Http\Request;

class CessationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
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
            'amount'        => 'required|numeric',
            'date_cessation'=> 'required|string',
            'remark'        => 'nullable|string',
        ]);

        return Cessation::create($data);
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
