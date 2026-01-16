<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Backup extends Model
{
    use HasFactory;

    protected $table = 'bureau_de_secours';

    protected $fillable = [
        'Folder_id',
        'Numero_Visa',
        'Date_Visa',
        'Numero_Bureau_Secours',
        'Date_Decision',
        'Nom_Beneficiaire',
        'Numero_Pension',
        'Budget_Alloue'
    ];

    public function folder() {
        return $this -> belongsTo(Folder::class);
    }
}
