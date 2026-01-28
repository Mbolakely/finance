<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Cessation extends Model
{
    use HasFactory;

    protected $table = 'cessations';

    protected $fillable = [
        'folder_id',
        'six_one',
        'six_two',
        'six_three',
        'six_four',
        'six_five',
        'six_six',
        'six_seven',
        'six_eight',
        'six_nine',
        'six_ten',
        'amount',
        'date_cessation',
        'fichier',
        'remark',
    ];

    public function folder() {
        return $this -> belongsTo(Folder::class);
    }
}
