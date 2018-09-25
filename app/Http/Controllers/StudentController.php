<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
class StudentController extends Controller
{
    public function index()
    {
        // dd('berhasil');
      $show = siswa::all();

      return view('school.siswa.siswa',compact('show'));
    }
    public function store(Request $request)
    {
      // dd($request->all());
      $store = siswa::create([
        'NIS'  =>str_random(5),
        'nama'      =>$request->name_class,
        'tempat_lahir'=>$request->tempat_lahir,
        'tanggal_lahir'=>$request->tanggal_lahir,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'alamat'=>$request->alamat,
        'agama'=>$request->agama,
      ]);
      return redirect('school/siswa');
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
