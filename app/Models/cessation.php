<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Cessation extends Model
{
    use HasFactory;

    protected $table = 'cessation';

    protected $fillable = [
        'folder_id',
        'date_cessation',
        'number_cessation'
    ];

    public function folder() {
        return $this -> belongsTo(Folder::class);
    }
}
