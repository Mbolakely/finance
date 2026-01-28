<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Decision extends Model
{
    use HasFactory;

    protected $table = 'decisions';

   protected $fillable = [
        'folder_id',
        'type_decision',
        'date_decision',
        'fichier',
    ];

    public function folder() {
        return $this -> belongsTo(Folder::class);
    }
}
