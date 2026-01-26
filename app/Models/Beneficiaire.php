<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Beneficiaire extends Model
{
    use HasFactory;

    protected $table = 'beneficiaires';

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

   public function folders()
    {
        return $this->belongsToMany(Folder::class)
                    ->withPivot('role')
                    ->withTimestamps();
    }
}
