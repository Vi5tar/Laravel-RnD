<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{



    public function home() {
      return view ('welcome');
    }

    public function badtv() {
      return view ('tv');
    }

    public function phpplayground() {
      $words = 'Messing with PHP';
      $boogers = 'slimy';
      $ninjas = 'sneaky';

      $arrayPlay = ['one' => 'one', 'two' => 'two', 'three' => 'three'];
      $arrayFun = ['one', 'two', 'three'];

      unset($arrayPlay['two']);
      unset($arrayFun[1]);
      return view ('phpplayground', compact(['words', 'ninjas', 'boogers', 'arrayPlay', 'arrayFun']));
    }
}
