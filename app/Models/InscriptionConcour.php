<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InscriptionConcour extends Model
{
    use HasFactory;

    protected $fillable = [
        'concour_id',
        'user_id',
        'centre_id',
        'statut'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');

    }
    public function concours(): BelongsTo
    {
        return $this->belongsTo(Concour::class,'concour_id');

    }
    public function docs(): HasMany{
        return $this->hasMany(Intermediaire::class);
    }

    // public function concours(): BelongsTo
    // {
    //     return $this->belongsTo(Concour::class);
    // }

}

