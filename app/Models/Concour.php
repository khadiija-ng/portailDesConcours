<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Concour extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'date_debut',
        'date_fin',
        'etat',
        'Frais',
        'etablissement_id',
        'image'
    ];

    public function etablissement(): BelongsTo{
        return $this->belongsTo(Etablissement::class,'etablissement_id' );
  }

  public function users():BelongsToMany
  {
    return $this->belongsToMany(User::class , 'inscription_concours');
  }
  public function inscription(): hasMany
  {
   return $this->hasMany(InscriptionConcour::class );
  }


//   public function inscriptions(): HasMany
//   {
//       return $this->hasMany(InscriptionConcour::class);
//   }
}
