<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
  protected $table ="absensi";
  protected $fillable =['kode_absensi','NIS','tanggal','absen','keterangan'];

  function siswa()
 {
   return $this->belongsTo("App\siswa",'NIS','NIS');
 }
}
