<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mata_pelajaran extends Model
{
    protected $table ="mata_pelajaran";
    protected $fillable =['kode_pelajaran','kode_kls','nama_guru','nama_pelajaran'];

     function kelas()
    {
      return $this->belongsTo("App\kelas",'kode_kls','kode_kls')->withTrashed();
    }
}
