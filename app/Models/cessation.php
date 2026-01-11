<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cessation;

class Cessation extends Model
{
    use HasFactory;

    protected $table = 'cessation';

    protected $fillable = [
        'cessation_id'
    ];

    public function cessation() {
        return $this -> belongsTo(Cessation::class);
    }
}
