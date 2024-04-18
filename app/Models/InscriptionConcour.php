<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscriptionConcour extends Model
{
    use HasFactory;

    protected $fillable = [
        'concour_id',
        'user_id',
        'centre'
    ];

}

