<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tagihan\Models\Umum;
// use Modules\Master\Database\Factories\PeriodeFactory;

class Periode extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function umums()
  {
    return $this->belongsToMany(Umum::class, 'periode_umum', 'periode_id', 'umum_id')
      ->withTimestamps();
  }



  // Relasi dengan Warga melalui tabel pivot
  public function wargas()
  {
    return $this->belongsToMany(Warga::class, 'warga_tagihan_periode')
      ->withPivot('umum_id')
      ->withTimestamps();
  }

  // Relasi dengan Tagihan melalui tabel pivot
  public function tagihans()
  {
    return $this->belongsToMany(Umum::class, 'warga_tagihan_periode')
      ->withPivot('warga_id')
      ->withTimestamps();
  }
}
