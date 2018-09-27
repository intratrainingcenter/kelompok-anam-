<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;

class ClassController extends Controller
{
    public function index()
    {
      $show = kelas::all();

      return view('school.kelas.index',compact('show'));
    }
    public function store(Request $request)
    {
      $validation = kelas::where('nama','=',$request->name_class)->first();
      if ($validation == null) {
          $date = date('Ymd');
          $seconds = date('s');
          $code =('KLS_'.$date.$seconds);
          $store = kelas::create([
            'kode_kls'  =>$code,
            'nama'      =>$request->name_class,
            'wali_kelas'=>$request->wali_kelas,
            'total_siswa'=>$request->total_student,
          ]);
          return redirect('school/kelas')->with('save',$request->name_class);
      }else{
          return redirect('school/kelas')->with('warning',$request->name_class);
      }
    }
    public function update(Request $request)
    {
      $update = kelas::where('kode_kls', $request->id_class);
      $update->update([
        'nama'      =>$request->name_class,
        'wali_kelas'=>$request->wali_kelas,
        'total_siswa'=>$request->total_student,
      ]);
        return redirect('school/kelas')->with('update',$request->name_class);
    }
    public function delete(Request $request)
    {
      $delete = kelas::where('kode_kls', $request->id_class);
      $delete->delete();

      return redirect('school/kelas')->with('delete',$request->name_class);
    }
}
