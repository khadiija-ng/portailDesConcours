<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Intermediaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'inscription_concour_id',
        'media_id',
     ];

     public function inscrire(): BelongsTo{
        return $this->belongsTo(InscriptionConcour::class, 'inscription_concour_id');
  }

  public function medias(): BelongsTo{
    return $this->belongsTo(Media::class, 'media_id');
}

}
