<?php

namespace Modules\BuatSurat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Models\Penandatangan;

// use Modules\BuatSurat\Database\Factories\SuratDinasFactory;

class SuratDinas extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
  public function penandatangan()
  {
    return $this->belongsTo(Penandatangan::class, 'penandatangan_id');
  }
}
