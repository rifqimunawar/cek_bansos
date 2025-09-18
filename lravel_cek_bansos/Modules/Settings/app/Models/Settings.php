<?php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Settings\Database\Factories\SettingsFactory;

class Settings extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   */
  protected $guarded = [];

  // protected static function newFactory(): SettingsFactory
  // {
  //     // return SettingsFactory::new();
  // }
}
