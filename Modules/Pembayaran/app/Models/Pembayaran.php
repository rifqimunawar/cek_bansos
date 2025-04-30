<?php

namespace Modules\Pembayaran\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pembayaran\Database\Factories\PembayaranFactory;

class pembayaran extends Model
{
  use HasFactory;

  use HasFactory, SoftDeletes;
  protected $guarded = [];
}
