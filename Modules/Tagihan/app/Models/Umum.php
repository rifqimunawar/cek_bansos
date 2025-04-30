<?php

namespace Modules\Tagihan\Models;

use Modules\Master\Models\Warga;
use Illuminate\Support\Facades\DB;
use Modules\Master\Models\Periode;
use Illuminate\Database\Eloquent\Model;
use Modules\Pembayaran\Models\Pembayaran;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Tagihan\Database\Factories\UmumFactory;

class Umum extends Model
{
  use HasFactory, SoftDeletes;
  protected $table = 'umums';
  protected $guarded = [];
  // Relasi ke Warga melalui tabel pivot "umum_warga"
  // public function wargas()
  // {
  //   return $this->belongsToMany(Warga::class, 'umum_warga', 'umum_id', 'warga_id')
  //     ->withTimestamps();
  // }
  public function umums()
  {
    return $this->belongsToMany(Umum::class, 'umum_warga', 'warga_id', 'umum_id')
      ->withTimestamps();
  }
  // public function periodes()
  // {
  //   return $this->belongsToMany(Periode::class, 'periode_umum', 'umum_id', 'periode_id')
  //     ->withTimestamps();
  // }

  // Relasi dengan Warga melalui tabel pivot
  public function wargas()
  {
    return $this->belongsToMany(Warga::class, 'warga_tagihan_periode')
      ->withPivot('periode_id')
      ->withTimestamps();
  }

  // Relasi dengan Periode melalui tabel pivot
  public function periodes()
  {
    return $this->belongsToMany(Periode::class, 'warga_tagihan_periode')
      ->withPivot('warga_id')
      ->withTimestamps();
  }

  public function pembayaran()
  {
    return $this->hasMany(Pembayaran::class, 'tagihan_id', 'id');
  }

  public static function tagihan_rutin_warga($id)
  {
    return DB::table('umums as a')
      ->select('a.id', 'a.nama_tagihan', 'a.nominal', 'c.nama', 'c.telp', 'd.nama_periode')
      ->join('warga_tagihan_periode as b', 'a.id', '=', 'b.umum_id')
      ->join('wargas as c', 'b.warga_id', '=', 'c.id')
      ->join('periodes as d', 'b.periode_id', '=', 'd.id')
      ->where('a.id', $id)
      ->whereNotExists(function ($query) {
        $query->select(DB::raw(1))
          ->from('pembayarans as p')
          ->whereRaw('p.warga_id = b.warga_id')
          ->whereRaw('p.tagihan_id = b.umum_id')
          ->whereRaw('p.periode_id = b.periode_id');
      })
      ->get();
  }



}
