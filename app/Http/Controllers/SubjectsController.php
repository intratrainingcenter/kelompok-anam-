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
        'study' => mata_pelajaran::with('kelas')->get(),
        'class' => $select,
        'kelas' =>kelas::all(),
      );

      return view('school.mata_pelajaran.index',$data);
    }
    public function create(Request $request)
    {
      $validation = mata_pelajaran::where('kode_pelajaran','=',$request->kode_pelajaran)->first();
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
    public function update(Request $request)
    {
      // dd($request->all());
      // $validatedData = $request->validate([
      //     'kode_kls' => 'required',
      //     'nama_guru' => 'required',
      //     'nama_pelajaran' => 'required',
      // ]);
      $find = mata_pelajaran::where('kode_pelajaran','=',$request->kode_pelajaran)->first();
      $find->update([
        'kode_kls'        => $request->class,
        'nama_guru'       => $request->nama_guru,
        'nama_pelajaran'  => $request->pelajaran,
      ]);
      return redirect('school/mata_pelajaran')->with('update',$request->pelajaran);

    }
    public function delete(Request $request)
    {
      // dd($request->all());
      $find = mata_pelajaran::where('kode_pelajaran','=',$request->kode_pelajaran)->first();
      $find->delete();

      return redirect('school/mata_pelajaran')->with('delete',$request->nama_pelajaran);

    }
}
