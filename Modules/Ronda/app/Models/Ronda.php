<?php

namespace Modules\Ronda\Models;

use Modules\Master\Models\Warga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Ronda\Database\Factories\RondaFactory;

class Ronda extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function wargas()
  {
    return $this->belongsToMany(Warga::class, 'ronda_warga', 'ronda_id', 'warga_id')
      ->withTimestamps();
  }
  public function absens()
  {
    return $this->hasMany(RondaAbsen::class, 'ronda_id');
  }
}
