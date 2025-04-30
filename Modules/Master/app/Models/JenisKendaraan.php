<?php

namespace Modules\Master\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class JenisKendaraan extends Model
{
  use HasFactory, SoftDeletes;

  protected $guarded = [];

}
