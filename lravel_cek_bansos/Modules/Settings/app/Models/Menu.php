<?php

namespace Modules\Settings\Models;

use Modules\Settings\Models\Roles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
  use SoftDeletes;

  protected $guarded = [];

  /**
   * Relasi ke submenu (anak menu)
   */
  public function children()
  {
    return $this->hasMany(self::class, 'parent_id');
  }

  /**
   * Relasi ke parent menu
   */
  public function parent()
  {
    return $this->belongsTo(self::class, 'parent_id');
  }

  /**
   * Relasi Many-to-Many ke roles
   */
  public function roles()
  {
    return $this->belongsToMany(Roles::class, 'role_menu', 'menu_id', 'role_id');
  }
}
