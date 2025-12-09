<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Beneficiary extends Model
{
    use HasFactory;

    protected $table = 'beneficiary';

    protected $fillable = [
        'name',
        'firstname',
        'cin',
        'sexe',
        'contact',
        'adresse',
        'state',
        'remark'
    ];

    public function folder() {
        $this -> hasOne(Folder::class);
    }
}
