<?php

namespace Modules\Ronda\Models;

use Modules\Master\Models\Warga;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Ronda\Database\Factories\RondaAbsenFactory;

class RondaAbsen extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function ronda()
  {
    return $this->belongsTo(Ronda::class, 'ronda_id');
  }

  public function warga()
  {
    return $this->belongsTo(Warga::class, 'warga_id');
  }

  public static function cekAbsen($id)
  {
    $data = self::where('ronda_id', $id)->with('warga')->get();

    if ($data->isEmpty()) {
      return "Data tidak ditemukan untuk ronda_id = $id";
    }

    return $data;
  }


}
