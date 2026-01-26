<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Decision;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'folder_id'     => 'required|exists:folders,id|unique:decisions,folder_id',
            'type_decision' => 'required|string',
            'date_decision' => 'required|date',
        ]);

        return Decision::create($data);
    }

    public function showByFolder($folderId)
    {
        return Decision::where('folder_id', $folderId)->firstOrFail();
    }

    public function update(Request $request, $id)
    {
        $decision = Decision::findOrFail($id);

        $data = $request->validate([
            'type_decision' => 'sometimes|string',
            'date_decision' => 'sometimes|date',
        ]);

        $decision->update($data);

        return $decision;
    }
}
