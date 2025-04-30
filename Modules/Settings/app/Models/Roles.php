<?php

namespace Modules\Settings\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Settings\Database\Factories\RolesFactory;

class Roles extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   */
  protected $guarded = [];
  public function setMenuIdAttribute($value)
  {
    $this->attributes['menu_id'] = json_encode($value);
  }
  public function getMenuIdAttribute($value)
  {
    return json_decode($value, true);
  }

  public function users()
  {
    return $this->hasMany(User::class, 'role_id');
  }

  public function menus()
  {
    return $this->belongsToMany(Menu::class, 'role_menu', 'role_id', 'menu_id');
  }
}
