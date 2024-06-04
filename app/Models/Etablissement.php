<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'sigle',
        'logo',
        'address',
    ];

    public function users(): HasMany{
        return $this->hasMany(User::class);
    }

    public function concours(): HasMany{
        return $this->hasMany(Concour::class);
    }
}
