<?php

namespace Modules\Master\Models;

use Modules\Master\Models\Posisi;
use Illuminate\Database\Eloquent\Model;
use Modules\Master\Models\JenisKendaraan;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Master\Database\Factories\KaryawanFactory;

class Karyawan extends Model
{
  use HasFactory, SoftDeletes;


  protected $guarded = [];
  public function posisi()
  {
    return $this->belongsTo(Posisi::class, 'posisi_id');
  }

  public function jenisKendaraan()
  {
    return $this->belongsTo(JenisKendaraan::class, 'jenis_kendaraan_id');
  }
}
