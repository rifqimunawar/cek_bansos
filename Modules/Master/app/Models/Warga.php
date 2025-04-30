<?php

namespace Modules\Master\Models;

use Modules\Keluarga\Models\Keluarga;
use Modules\Ronda\Models\Ronda;
use Modules\Tagihan\Models\Pam;
use Modules\Tagihan\Models\Umum;
use Illuminate\Support\Facades\DB;
use Modules\Tagihan\Models\Tagihan;
use Database\Factories\WargaFactory;
use Modules\Ronda\Models\RondaAbsen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Tagihan\Models\TagihanRonda;

// use Modules\Master\Database\Factories\WargaFactory;

class Warga extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  // Relasi ke Umum melalui tabel pivot "umum_warga"
  public function umums()
  {
    return $this->belongsToMany(Umum::class, 'umum_warga', 'warga_id', 'umum_id')
      ->withTimestamps();
  }



  public function tagihanPam()
  {
    return $this->hasMany(Pam::class, 'warga_id');
  }
  public function rondas()
  {
    return $this->belongsToMany(Ronda::class, 'ronda_warga', 'warga_id', 'ronda_id')
      ->withTimestamps();
  }
  public function absens()
  {
    return $this->hasMany(RondaAbsen::class, 'warga_id');
  }
  public function tagihan_absen()
  {
    return $this->hasMany(TagihanRonda::class, 'warga_id');
  }

  // Relasi dengan Tagihan melalui tabel pivot
  public function tagihans()
  {
    return $this->belongsToMany(Umum::class, 'warga_tagihan_periode')
      ->withPivot('periode_id')
      ->withTimestamps();
  }

  // Relasi dengan Periode melalui tabel pivot
  public function periodes()
  {
    return $this->belongsToMany(Periode::class, 'warga_tagihan_periode')
      ->withPivot('umum_id')
      ->withTimestamps();
  }

  // tagihanku
  public static function semuaTagihanku($warga_id)
  {
    return DB::table('wargas as a')
      ->join('warga_tagihan_periode as b', 'a.id', '=', 'b.warga_id')
      ->join('umums as c', 'b.umum_id', '=', 'c.id')
      ->join('periodes as d', 'b.periode_id', '=', 'd.id')
      ->join('pams as e', 'e.warga_id', '=', 'a.id')
      ->join('ronda_absens as f', 'f.warga_id', '=', 'a.id')
      ->where('a.id', $warga_id)
      ->select(
        'a.id as warga_id',
        'a.nama as nama_warga',
        'b.*',
        'c.*',
        'd.*',
        'e.*',
        'f.*'
      )
      ->get();
  }
  public static function rutinTagihanku($warga_id)
  {
    return DB::table('wargas as a')
      ->join('warga_tagihan_periode as b', 'a.id', '=', 'b.warga_id')
      ->join('umums as c', 'b.umum_id', '=', 'c.id')
      ->join('periodes as d', 'b.periode_id', '=', 'd.id')
      ->where('a.id', $warga_id)
      ->select(
        'a.id as warga_id',
        'a.nama as nama_warga',
        'b.*',
        'c.*',
        'd.*',
      )
      ->get();
  }
  public static function pamTagihanku($warga_id)
  {
    return DB::table('wargas as a')
      ->join('pams as b', 'a.id', '=', 'b.warga_id')
      ->where('a.id', $warga_id)
      ->select(
        'a.id as warga_id',
        'a.nama as nama_warga',
        'b.*',
      )
      ->get();
  }
  public static function rondaTagihanku($warga_id)
  {
    return DB::table('wargas as a')
      ->join('ronda_absens as f', 'f.warga_id', '=', 'a.id')
      ->join('rondas as b', 'f.ronda_id', '=', 'b.id')
      ->where('a.id', $warga_id)
      ->where('f.absen', 1)
      ->select(
        'a.id as warga_id',
        'a.nama as nama_warga',
        'f.*',
        'b.*'
      )
      ->get();
  }

  public static function historyPembayaranRonda($warga_id)
  {
    return DB::table('wargas as a')
      ->join('ronda_absens as f', 'f.warga_id', '=', 'a.id')
      ->join('rondas as b', 'f.ronda_id', '=', 'b.id')
      ->join('pembayarans as p', 'f.id', '=', 'p.denda_ronda_id')
      ->where('a.id', $warga_id)
      ->where('f.absen', 1)
      ->select(
        'a.id as warga_id',
        'a.nama as nama_warga',
        'f.*',
        'b.*',
        'p.*'
      )
      ->get();
  }
  public static function RondaBelumDibayar($warga_id)
  {
    return DB::table('wargas as a')
      ->join('tagihan_rondas as f', 'f.warga_id', '=', 'a.id')
      ->join('rondas as b', 'f.ronda_id', '=', 'b.id')
      ->leftJoin('pembayarans as p', 'f.id', '=', 'p.denda_ronda_id') // LEFT JOIN untuk mengambil data yang mungkin NULL
      ->where('a.id', $warga_id)
      ->whereNull('p.id') // Hanya ambil data yang tidak ada pembayaran
      ->select(
        'a.id as warga_id',
        'a.nama as nama_warga',
        'f.*',
        'b.*',
      )
      ->get();
  }

  public static function pamBelumDibayar($warga_id)
  {
    return DB::table('wargas as a')
      ->join('pams as b', 'a.id', '=', 'b.warga_id')
      ->leftJoin('pembayarans as p', 'b.id', '=', 'p.pam_id') // LEFT JOIN ke tabel pembayaran berdasarkan pam_id
      ->where('a.id', $warga_id)
      ->whereNull('p.id') // Hanya ambil data yang tidak ada pembayaran
      ->select(
        'a.id as warga_id',
        'a.nama as nama_warga',
        'b.*'
      )
      ->get();
  }

  public static function rutinBelumDibayar($warga_id)
  {
    return DB::table('wargas as a')
      ->join('warga_tagihan_periode as b', 'a.id', '=', 'b.warga_id')
      ->join('umums as c', 'b.umum_id', '=', 'c.id')
      ->join('periodes as d', 'b.periode_id', '=', 'd.id')
      ->leftJoin('pembayarans as p', function ($join) {
        $join->on('b.umum_id', '=', 'p.tagihan_id')
          ->on('b.warga_id', '=', 'p.warga_id')
          ->on('b.periode_id', '=', 'p.periode_id');
      }) // LEFT JOIN pembayaran berdasarkan tagihan_id, warga_id, dan periode_id
      ->where('a.id', $warga_id)
      ->whereNull('p.id') // Hanya ambil tagihan yang belum dibayar
      ->whereNull('d.deleted_at')
      ->select(
        'a.id as warga_id',
        'a.nama as nama_warga',
        'b.*',
        'c.*',
        'd.*'
      )
      ->get();
  }



  protected static function newFactory()
  {
    return WargaFactory::new();
  }

  public function keluargas()
  {
    return $this->hasMany(Keluarga::class, 'warga_id');
  }

  public static function cari_warga($warga_id)
  {
    return DB::table('wargas')->where('id', $warga_id)->first();
  }

}
