<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secours extends Model
{
        use HasFactory;

    protected $table = 'secours';

    protected $fillable = [
        'folder_id',
        'numero_secours',
        'fichier'
    ];

    public function folder() {
        return $this -> belongsTo(Folder::class);
    }
}
