<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testpageController extends Controller
{
    public function index()
    {
      return 'Biasa Berhasil ';
    }
    public function middle($param)
    {
      return $param;
    }
}
