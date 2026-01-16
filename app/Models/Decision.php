<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Decision extends Model
{
    use HasFactory;

    protected $table = 'projet_decision';

    protected $fillable = [
        'Folder_id',
        'Numero_Decision',
        'Numero_Visa',
        'Numero_Matricule',
        'Numero_CIN',
        'Nom_defunt',
        'Nom_Beneficiaire',
        'Numero_Pension',
        'Date_Deces',
        'Secour_Deces'
    ];

//     public function folder() {
//         return $this -> belongsTo(Folder::class);
//     }
}
