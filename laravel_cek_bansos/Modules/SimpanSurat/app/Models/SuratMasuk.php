<?php

namespace Modules\SimpanSurat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Master\Models\KlasifikasiSurat;

// use Modules\SimpanSurat\Database\Factories\SuratMasukFactory;

class SuratMasuk extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = [];

  public function klasifikasiSurat()
  {
    return $this->belongsTo(KlasifikasiSurat::class, 'klasifikasi_surat_id');
  }
}
