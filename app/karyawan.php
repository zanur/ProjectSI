<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table = 'karyawan';
   	public $timestamps = false;
   	protected $fillable = ['nama', 'email', 'password', 'jenis_kelamin', 'tanggal_lahir', 'alamat'];
}
