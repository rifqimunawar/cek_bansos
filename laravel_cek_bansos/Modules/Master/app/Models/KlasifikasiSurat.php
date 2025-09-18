<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Master\Database\Factories\KlasifikasiSuratFactory;

class KlasifikasiSurat extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
}
