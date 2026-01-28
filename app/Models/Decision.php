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
        'numero_visa',
        'numero_decision',
        'budget',
        'allocated_amount',
        'code_imputation',
        'date_decision',
        'fichier',
        'remark',
        'decision_agent'
    ];

    public function folder() {
        return $this -> belongsTo(Folder::class);
    }
}
