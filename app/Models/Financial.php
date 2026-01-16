<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Financial extends Model
{
    use HasFactory;

    protected $table = 'controle_financier';

    protected $fillable = [
        'Folder_id',
        'Numero_Visa',
        'Date_Visa',
        'Delegue_Regional',
        'Nom_Beneficiaire',
        'Nom_Defunt'
    ];

    // public function folder() {
    //     return $this -> belongsTo(Folder::class);
    // }
}
