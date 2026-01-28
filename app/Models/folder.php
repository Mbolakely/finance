<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beneficiary;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';

    protected $fillable = [
        'matricule',
        'date_death',
        'deceased_name',
        'deceased_job',
        'deceased_poste',
        'deceased_cin',
        'deceased_pension',
        'upload_date',
        'status',
        'remark',
    ];


    /**
     * Un dossier peut concerner plusieurs bénéficiaires
     */
    public function beneficiaires()
    {
        return $this->belongsToMany(Beneficiaire::class, 'folder_beneficiaire')
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
