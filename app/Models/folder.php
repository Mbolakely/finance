<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beneficiary;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folder';

    protected $fillable = [
        'beneficiary_id',
        'matricule',
        'upload_date',
        'folder_state',
        'remark'
    ];

   
    /**
     * Un dossier peut concerner plusieurs bénéficiaires
     */
    public function beneficiaires()
    {
        return $this->belongsToMany(Beneficiaire::class)
                    ->withPivot('role')
                    ->withTimestamps();
    }

    public function decision()
    {
        return $this->hasOne(Decision::class);
    }

    public function decompte()
    {
        return $this->hasOne(Decompte::class);
    }

    public function cessation()
    {
        return $this->hasOne(Cessation::class);
    }
}
