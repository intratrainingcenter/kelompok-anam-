<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kelas extends Model
{
  use SoftDeletes;

    protected $table ="kelas";
    protected $fillable = ['kode_kls','nama','wali_kelas','total_siswa'];
    protected $dates = ['deleted_at'];

}
