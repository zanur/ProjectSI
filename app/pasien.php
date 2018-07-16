<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table = 'pasien';
   	public $timestamps = false;

   	protected $fillable = ['nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'tanggal_kunjungan', 'user_id', 'diagnosa', 'biaya', 'obat'];

   	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
