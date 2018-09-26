<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class piket extends Model
{
  protected $table ="piket";
  protected $fillable = ['NIS','hari','kode_kls'];
  
public function siswa(){
  return $this->belongsTo('App\siswa','NIS','NIS');
}
public function kelas()
{
  return $this->belongsTo("App\kelas",' kode_kls','kode_kls');
}

}
