<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondController extends Controller
{
   public function show_string ()
   {
    return 'secondcontroller';
   }
}
