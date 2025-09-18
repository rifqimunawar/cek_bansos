<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Settings\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserPermission
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  // public function handle(Request $request, Closure $next, $urlPattern)
  // {
  //   try {
  //     $userLogin = Auth::user();
  //     $menu = Menu::where('url', 'LIKE', $urlPattern)->first();

  //     if (!$menu || !$userLogin->role->menus->contains($menu->id)) {
  //       abort(403, 'Anda Tidak Memiliki Akses!!!!');
  //     }

  //     return $next($request);
  //   } catch (\Exception $e) {
  //     dd($e->getMessage());
  //   }
  // }

}
