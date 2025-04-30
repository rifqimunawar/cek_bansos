<?php

namespace App\Helpers;

use Modules\Settings\Models\Menu;
use Illuminate\Support\Facades\Auth;

class Sidebar
{
  public static function getMenu()
  {
    $userLogin = Auth::user();

    $menus = Menu::whereNull('parent_id')
      ->whereHas('roles', function ($query) use ($userLogin) {
        $query->where('roles.id', $userLogin->role_id);
      })
      ->with('children')
      ->get();

    // dd($menus);

    return $menus->map(function ($menu) {
      return [
        'icon' => $menu->icon ?? 'fa fa-circle',
        'title' => $menu->title,
        'url' => $menu->url,
        'is_active' => self::isActive($menu->url),
        'sub_menu' => self::getSubMenu($menu->children),
      ];
    })->toArray();
  }


  private static function getSubMenu($children)
  {
    return $children->map(function ($subMenu) {
      return [
        'title' => $subMenu->title,
        'url' => $subMenu->url,
        'is_active' => self::isActive($subMenu->url),
        'sub_menu' => self::getSubMenu($subMenu->children),
      ];
    })->toArray();
  }

  public static function isActive($menuUrl)
  {
    $currentUrl = request()->path() != '/' ? '/' . request()->path() : '/';
    return !empty($menuUrl) && $menuUrl === $currentUrl;
  }
}
