<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table ="kelas";
    protected $fillable = ['kode_kls','nama','wali_kelas','total_siswa'];
}
