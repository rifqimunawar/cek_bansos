<?php

namespace Modules\Tagihan\Models;

use Modules\Master\Models\Warga;
use Illuminate\Database\Eloquent\Model;
use Modules\Pembayaran\Models\Pembayaran;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Tagihan\Database\Factories\PamFactory;

class Pam extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function warga()
  {
    return $this->belongsTo(Warga::class, 'warga_id');
  }

  public function pembayaran()
  {
    return $this->hasMany(Pembayaran::class, 'pam_id');
  }


}
