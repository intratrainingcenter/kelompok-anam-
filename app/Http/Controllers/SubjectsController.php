<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mata_pelajaran;
use App\kelas;

class SubjectsController extends Controller
{
    public function index()
    {
      $departments = kelas::all();
      $select = [];
      foreach($departments as $department){
          $select[$department->kode_kls] = $department->nama;
      }
      
      $data = array(
        'study' => mata_pelajaran::all(),
        'class' => $select,
      );

      return view('school.mata_pelajaran.index',$data);
    }
    public function create(Request $request)
    {
      dd($request->all());
    }
}
