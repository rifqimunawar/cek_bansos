<?php

namespace Modules\Keluarga\Models;

use Modules\Master\Models\Warga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Keluarga\Database\Factories\KeluargaFactory;

class Keluarga extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function warga()
  {
    return $this->belongsTo(Warga::class, 'warga_id');
  }
}
