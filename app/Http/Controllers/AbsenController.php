<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\absensi;
use App\siswa;

class AbsenController extends Controller
{
    public function index()
    {
      $student = siswa::all();
      //menandakan select, adalah array
      $select = [];
      // foreach isi dari tabel siswa
      foreach($student as $departments){
          $select[$departments->NIS] = $departments->nama;
      }

      $data = array(
        'absen' => absensi::with('siswa')->get(),
        'siswa' => $select,
      );
      return view('school.absen.index',$data);
    }

    //proses create data
    public function create(Request $request)
    {
      $date = date('Ymd');
      //milisecond
      $milliseconds = round(microtime(true));
      // create code
      $code =('KA_'.$date.$milliseconds);
      $create = absensi::create([
        'kode_absensi'  =>$code,
        'NIS'           =>$request->siswa,
        'tanggal'       =>$request->date,
        'absen'         =>$request->absensi,
        'keterangan'    =>$request->keterangan,
      ]);
      return redirect('school/absen')->with('save','siswa');
    }

    //proses update data
    public function update(Request $request)
    {
        $update = absensi::where('kode_absensi','=',$request->kode_absen)->with('siswa')->first();
        $update->update([
          'absen' =>$request->absensi,
          'keterangan'  =>$request->keterangan,
        ]);
        return redirect('school/absen')->with('update',$update->siswa->nama);
    }
    //proses delete data
    public function delete(Request $request)
    {

      $delete = absensi::where('kode_absensi','=',$request->kode_absen);
      $delete->delete();

      return redirect('school/absen')->with('delete',$request->nama_siswa);
    }
}
