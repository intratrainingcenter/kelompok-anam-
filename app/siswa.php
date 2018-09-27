<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class siswa extends Model
{
  use SoftDeletes;
  protected $table ="siswa";
  protected $fillable=['NIS','nama','tempat_lahir','kode_kls','tanggal_lahir','jenis_kelamin','alamat','agama'];
  protected $dates = ['deleted_at'];
}
