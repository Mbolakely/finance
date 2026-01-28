<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Decompte extends Model
{
    use HasFactory;

    protected $table = 'decomptes';
    
  protected $fillable = [
        'folder_id',
        'amount',
        'status',
        'fichier',
    ];

    public function folder() {
       return $this -> belongsTo(Folder::class);  
    } 
}
