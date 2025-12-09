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
        'beneficiary_id'
    ];

     public function beneficiary() {
      return  $this -> belongsTo(Beneficiary::class);
    }
}
