<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
  protected $table ="siswa";
  protected $fillable=['NIS','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','alamat','agama'];
}
