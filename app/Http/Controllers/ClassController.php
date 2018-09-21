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
      // dd($request->all());
      $store = kelas::create([
        'kode_kls'  =>str_random(5),
        'nama'      =>$request->name_class,
        'total_siswa'=>$request->total_student,
      ]);
      return redirect('school/kelas');
    }
    public function update(Request $request)
    {
      $update = kelas::where('kode_kls', $request->id_class);
      $update->update([
        'nama'      =>$request->name_class,
        'total_siswa'=>$request->total_student,
      ]);
        return redirect('school/kelas');
    }
    public function delete(Request $request)
    {
      $delete = kelas::where('kode_kls', $request->id_class);
      $delete->delete();

      return redirect('school/kelas');
    }
}
