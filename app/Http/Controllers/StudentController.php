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
        $date = date('Ymd');
        $milliseconds = round(microtime(true));
        $code =($date.$milliseconds);
        //  dd($request->all());
      $store = siswa::create([
        'NIS'          =>$code,
        'nama'         =>$request->nama_siswa,
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
        // dd($request->all());
      $update = siswa::where('NIS', $request->id_siswa);
      $update->update([
        'nama'         =>$request->nama_siswa,
        'tempat_lahir'=>$request->tempat_lahir,
        'tanggal_lahir'=>$request->tanggal_lahir,
        'jenis_kelamin'=>$request->jenis_kelamin,
        'alamat'=>$request->alamat,
        'agama'=>$request->agama,
      ]);
        return redirect('school/siswa');
    }
    public function delete(Request $request)
    {   
        // dd($request->all());
      $delete = siswa::where('NIS', $request->NIS);
      $delete->delete();

      return redirect('school/siswa');
    }
}
