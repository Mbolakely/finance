<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Decision extends Model
{
    use HasFactory;

    protected $table = 'decision' ;

    protected $fillable = [
        'decision_number',
        'visa',
        'IM',
        'cin',
        'deceased_name',
        'beneficiary',
        'pension_number',
        'date_death',
        'death_benefit'
    ];

    public function decision() {
        return $this -> belongsTo(Decision::class);
    }
}
