<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
