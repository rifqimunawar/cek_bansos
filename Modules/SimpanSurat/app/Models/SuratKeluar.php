<?php

namespace Modules\SimpanSurat\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Master\Models\KlasifikasiSurat;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\SimpanSurat\Database\Factories\SuratKeluarFactory;

class SuratKeluar extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = [];
  public function klasifikasiSurat()
  {
    return $this->belongsTo(KlasifikasiSurat::class, 'klasifikasi_surat_id');
  }
}
