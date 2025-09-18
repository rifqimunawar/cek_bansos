<?php
namespace App\Helpers;

use Modules\Ronda\Models\Ronda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GetSettings
{

  public static function getRondaJadwal()
  {
    $data = Ronda::with('wargas')->latest()->get();
    return json_encode($data);
  }

  public static function getMenu()
  {
    $userLogin = Auth::user();
    $userLogin->load('role.menus');

    $menus = $userLogin->role->menus()
      ->whereNull('deleted_at')
      ->orWhere('deleted_at', '')
      ->get();

    $formattedMenu = [];
    $addedMenus = [];


    foreach ($menus as $menu) {
      if (in_array($menu->url, array_column($formattedMenu, 'url'))) {
        continue;
      }
      if (self::isInSubMenu($menu->url, $formattedMenu)) {
        continue;
      }
      $menuData = [
        'icon' => $menu->icon ?? null,
        'title' => $menu->title,
        'url' => $menu->url,
        'route-name' => $menu->route_name ?? null,
      ];

      if ($menu->caret) {
        $menuData['caret'] = true;
      }

      $subMenus = self::getSubMenus($menu->id);
      if ($subMenus->isNotEmpty()) {
        $subMenuArray = self::formatSubMenus($subMenus, $addedMenus);
        if (!empty($subMenuArray)) {
          $menuData['sub_menu'] = $subMenuArray;
        }
      }

      $formattedMenu[] = $menuData;
      $addedMenus[] = $menu->url;
    }

    return $formattedMenu;
  }

  public static function getSubMenus($parentId)
  {
    return DB::table('menus')
      ->where('parent_id', $parentId)
      ->where(function ($query) {
        $query->whereNull('deleted_at')->orWhere('deleted_at', '');
      })
      ->get();
  }

  public static function formatSubMenus($subMenus, &$addedMenus)
  {
    $userLogin = Auth::user();
    $userLogin->load('role.menus');

    $userLoginRoleId = $userLogin->role->id;

    $aksesMenuUser = $userLogin->role->menus->pluck('url')->toArray();
    $subMenuArray = [];
    foreach ($subMenus as $subMenu) {
      if (in_array($subMenu->url, $addedMenus)) {
        continue;
      }
      if (!in_array($subMenu->url, $aksesMenuUser)) {
        continue;
      }
      $subMenuData = [
        'url' => $subMenu->url,
        'title' => $subMenu->title,
      ];
      $subSubMenus = self::getSubMenus($subMenu->id);
      if ($subSubMenus->isNotEmpty()) {
        $subMenuData['sub_menu'] = self::formatSubMenus($subSubMenus, $addedMenus);
      }
      $subMenuArray[] = $subMenuData;
      $addedMenus[] = $subMenu->url;
    }
    return $subMenuArray;
  }


  public static function isInSubMenu($url, $formattedMenu)
  {
    foreach ($formattedMenu as $menu) {
      if (isset($menu['sub_menu'])) {
        foreach ($menu['sub_menu'] as $subMenu) {
          if ($subMenu['url'] === $url) {
            return true;
          }
        }
      }
    }
    return false;
  }

















  public static function getTelp()
  {
    $settings = DB::table('settings')->first();
    $data = $settings->phone;
    return $data;
  }

  public static function getEmail()
  {
    $settings = DB::table('settings')->first();
    $data = $settings->email;
    return $data;
  }
  public static function getAlamat()
  {
    $settings = DB::table('settings')->first();
    $data = $settings->alamat;
    return $data;
  }
  public static function getNamaWeb()
  {
    $settings = DB::table('settings')->first();
    $data = $settings->name;
    return $data;
  }

  public static function getLogo()
  {
    $settings = DB::table('settings')->first();
    $data = $settings->base_url . 'img/' . $settings->logo;
    return $data;
  }
  public static function getBaseUrl()
  {
    $settings = DB::table('settings')->first();
    $data = $settings->base_url;
    return $data;
  }

}
