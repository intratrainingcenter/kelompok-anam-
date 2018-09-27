<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mata_pelajaran;
use App\kelas;

class SubjectsController extends Controller
{
    public function index()
    {
      $class = kelas::all();
      // menandakan select sebagai array
      $select = [];
      foreach($class as $departments){
          $select[$departments->kode_kls] = $departments->nama;
      }

      $data = array(
        'study' => mata_pelajaran::with('kelas')->get(),
        'class' => $select,
      );

      return view('school.mata_pelajaran.index',$data);
    }
    // fungsi proses create data
    public function create(Request $request)
    {
      // validasi mengecek kode pelajaran sudah ada apa belum dalam tabel
      $validation = mata_pelajaran::where('kode_pelajaran','=',$request->kode_pelajaran)->first();
      //jika kode pelajaran ada dia malakukan eksecute create data
      if ($validation == null) {
          $save = mata_pelajaran::create([
            'kode_pelajaran'  => $request->kode_pelajaran,
            'kode_kls'        => $request->class,
            'nama_guru'       => $request->nama_guru,
            'nama_pelajaran'  => $request->pelajaran,
          ]);
          return redirect('school/mata_pelajaran')->with('save',$request->pelajaran);
        }else{
          return redirect('school/mata_pelajaran')->with('warning',$request->kode_pelajaran);
        }
    }
    //proses update data
    public function update(Request $request)
    {
      $find = mata_pelajaran::where('kode_pelajaran','=',$request->kode_pelajaran)->first();
      $find->update([
        'kode_kls'        => $request->kelas,
        'nama_guru'       => $request->nama_guru,
        'nama_pelajaran'  => $request->pelajaran,
      ]);
      return redirect('school/mata_pelajaran')->with('update',$request->pelajaran);

    }
    // proses delete data
    public function delete(Request $request)
    {
      $find = mata_pelajaran::where('kode_pelajaran','=',$request->kode_pelajaran)->first();
      $find->delete();

      return redirect('school/mata_pelajaran')->with('delete',$request->nama_pelajaran);

    }
    //proses show data kelas menggunakan ajax
    public function callajax(Request $request)
    {
      $data = kelas::all();

      return $data;
    }
}
