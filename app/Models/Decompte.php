<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Decompte extends Model
{
    use HasFactory;

    protected $table = 'decompte';
    
    protected $fillable = [
        'Folder_id',
        'Number_CIN',
        'Name',
        'Address',
        'Contact',
        'Status',
        'Montant'
    ];

    public function folder() {
       return $this -> belongsTo(Folder::class);  
    } 
}
