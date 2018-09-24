<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\absensi;
use App\siswa;

class AbsenController extends Controller
{
    public function index()
    {
      $departments = siswa::all();
      $select = [];
      foreach($departments as $department){
          $select[$department->NIS] = $department->nama;
      }

      $data = array(
        'absen' => absensi::with('siswa')->get(),
        'siswa' => $select,
      );

      return view('school.absen.index',$data);
    }
    public function create(Request $request)
    {
      $date = date('Ymd');
      $create = absensi::create([
        'kode_absensi'  =>$date.str_random(2),
        'NIS'           =>'234wdf',
        'tanggal'       =>$request->date,
        'absen'         =>$request->absensi,
        'keterangan'    =>$request->keterangan,
      ]);
      return redirect('school/absen')->with('save','siswa');
    }
    public function update(Request $request)
    {

    }
    public function delete(Request $request)
    {
      // dd($request->all());
      $delete = absensi::where('kode_absensi','=',$request->kode_absen);
      $delete->delete();

      return redirect('school/absen')->with('delete',$request->nama_siswa);
    }
}
