<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Financial;

class Financial extends Model
{
    use HasFactory;

    protected $table = 'financial';

    protected $fillable = [
        'visa',
        'visa_date',
        'regional_delegate',
        'beneficiary',
        'deceased_name'
    ];

    public function financial() {
        return $this -> belongsTo(Financial::class);
    }
}
