<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\folder;

class folderController extends Controller
{
    public function lister() {

        $folder = folder::all();

        return response()->json($folder, 200);
    }

    public function delete($id) {

        $folder = folder::findOrFail($id);
        
        return response()->json($folder, 200);
    }
}
