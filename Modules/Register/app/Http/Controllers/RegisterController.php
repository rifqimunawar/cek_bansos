<?php

namespace Modules\Register\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{


  public function karyawan()
  {
    return view(
      'register::register/karyawan',
      [

      ]
    );
  }
}
