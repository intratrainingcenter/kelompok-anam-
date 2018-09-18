<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class schoolController extends Controller
{
    public function siswa()
    {
      return view('school.siswa.siswa');
    }
    public function kelas()
    {
      return view('school.kelas.kelas');
    }
    public function piket()
    {
      return view('school.piket.piket');
    }
    public function mata_pelajaran()
    {
      return view('school.mata_pelajaran.mata_pelajaran');
    }
    public function absen()
    {
      return view('school.absen.absen');
    }
}
