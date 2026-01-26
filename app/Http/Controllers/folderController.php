<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        return Folder::with([
            'beneficiaires',
            'decision',
            'decompte',
            'cessation'
        ])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'matricule'        => 'required|string|unique:folders',
            'date_death'       => 'required|string',
            'deceased_name'    => 'required|string',
            'deceased_job'     => 'required|string',
            'deceased_poste'   => 'required|string',
            'deceased_cin'     => 'required|string',
            'deceased_pension' => 'required|string',
            'upload_date'      => 'required|string',
            'status'           => 'nullable|string',
            'remark'           => 'nullable|string',
        ]);

        return Folder::create($data);
    }

    public function show($id)
    {
        return Folder::with([
            'beneficiaires',
            'decision',
            'decompte',
            'cessation'
        ])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $folder = Folder::findOrFail($id);

        $data = $request->validate([
            'matricule'        => 'sometimes|string|unique:folders,matricule,' . $id,
            'date_death'       => 'sometimes|string',
            'deceased_name'    => 'sometimes|string',
            'deceased_job'     => 'sometimes|string',
            'deceased_poste'   => 'sometimes|string',
            'deceased_cin'     => 'sometimes|string',
            'deceased_pension' => 'sometimes|string',
            'upload_date'      => 'sometimes|string',
            'status'           => 'nullable|string',
            'remark'           => 'nullable|string',
        ]);

        $folder->update($data);

        return $folder;
    }

    public function destroy($id)
    {
        Folder::findOrFail($id)->delete();
        return response()->json(['message' => 'Folder supprimé']);
    }

    public function assignBeneficiaires(Request $request, $folderId)
{
    $folder = Folder::findOrFail($folderId);

    $data = $request->validate([
        'beneficiaires'          => 'required|array',
        'beneficiaires.*.id'     => 'required|exists:beneficiaires,id',
        'beneficiaires.*.role'   => 'nullable|string',
    ]);

    $syncData = [];

    foreach ($data['beneficiaires'] as $b) {
        $syncData[$b['id']] = ['role' => $b['role'] ?? null];
    }

    $folder->beneficiaires()->sync($syncData);

    return $folder->load('beneficiaires');
}

}
