<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

/**
 *
 */
class BaseController extends \App\Http\Controllers\Controller
{

  function __construct(Request $request)
  {
      $this->middleware('admin');
  }
}
