<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Folder;

class Countdown extends Model
{
    use HasFactory;

    protected $table = 'countdown';

    protected $fillable = [
        'beneficiary',
        'deseaced_name',
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
        'amount'
    ];

    public function countdown() {
        return $this -> belongsTo(Countdown::class);
    }
}
