<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = ['name','user_id','cabang_id','specialist'];

    public function diagnosas()
    {
    	return $this->hasMany('App\Diagnosa');
    }

    public function cabang()
    {
        return $this->belongsTo('App\Cabang');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
