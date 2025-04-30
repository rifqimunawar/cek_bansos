<?php

namespace Modules\Master\Models;

use Modules\Master\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Master\Database\Factories\PosisiFactory;

class Posisi extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   */
  protected $guarded = [];

  public function karyawans()
  {
    return $this->hasMany(Karyawan::class, 'posisi_id');
  }
}
