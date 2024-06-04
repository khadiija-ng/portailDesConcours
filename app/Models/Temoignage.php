<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Temoignage extends Model
{
    use HasFactory;

    protected $fillable = [
        'temoigner',
        'user_id',
        'profil',
        'status',
     ];

     public function utilisateurs(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
