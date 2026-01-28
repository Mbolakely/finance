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
        'adresse',
        'sexe',
        'contact',
        'cin',
        'email',
        'remark',
    ];

  public function folders()
    {
        return $this->belongsToMany(Folder::class, 'folder_beneficiaire')
                    ->withPivot('role')
                    ->withTimestamps();
    }
}
