<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    protected $table = 'pengeluaran';
   	public $timestamps = false;
   	protected $fillable = ['tgl_pengeluaran', 'total_pengeluaran', 'keterangan', 'user_id'];

   	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
