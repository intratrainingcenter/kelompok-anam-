<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\siswa;
use App\kelas;
use App\mata_pelajaran;
class schoolController extends Controller
{
    public function dashboard()
    {
      $data = array(
        'student' => siswa::count(),
        'Class'   => kelas::count(),
        'study'   => mata_pelajaran::count(),
      );
      return view('template.content',$data);
    }
}