<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\piket;
use App\siswa;
use App\kelas;

class PicketController extends Controller
{
    public function index()
    {
      $picket = piket::with(['siswa'])->get();
      $picket_student = siswa::all();
      $picket_class = kelas::all();

      // dd($piket2);

      // dd($data);
  
      // $departments = piket::with('siswa')->get();

      // $departments = kelas::all();
      // $select = [];
      // foreach($departments as $department){
      //     $select[$department->NIS] = $department->nama;
      //     $select[$department->kode_kelas] = $department->nama_kelas;
      // }

      // $data = array(
      //   'piket' => piket::with('siswa')->get(),
      //   'siswa' => $select,
      //   'kelas' => $select,
      // );
      return view('school.piket.index', compact('picket','picket_student','picket_class'));
    }
    public function detail(){
      $picket = piket::with(['siswa','kelas'])->get();
      // dd($piket);
      $picket_student = siswa::all();
      $picket_class = kelas::all();
      return view('school.piket.detail', compact('picket','picket_student','picket_class'));
    }
    public function store(Request $request)
    {  
          // dd($request->all());
      $store = piket::create([
        'NIS'         =>$request->siswa,
        'hari'         =>$request->hari,
        'kode_kls'        =>$request->kelas,

      ]);

      return redirect('school/piket');
    }
    public function update(Request $request)
    {
        // dd($request);
      $update = piket::where('id', $request->id_piket);
      $update->update([
        'NIS'         =>$request->siswa,
        'hari'         =>$request->hari,
        'kode_kls'        =>$request->kelas,
      ]);
        return redirect('school/piket/detail');
    }
    public function delete(Request $request)
    {   
        // dd($request->all());
      $delete = piket::where('hari', $request->hari);
      $delete->delete();

      return redirect('school/piket/detail');
    }
    public function show_update_data($id){

      $picket = piket::where('hari','=',$id)->with(['siswa','kelas'])->first();
      // dd($picket); 
      $picket_student = siswa::all();
      $picket_class = kelas::all();
      
      return view('school.piket.edit',compact('picket','picket_student','picket_class'));
    }
}
