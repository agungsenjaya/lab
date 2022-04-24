<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{

    protected $fillable = ['name','kota','alamat','map','img','kode'];
    
    public function diagnosas()
    {
    	return $this->hasMany('App\Diagnosa');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function dokters()
    {
        return $this->hasMany('App\Dokter');
    }
    public function pricings()
    {
    	return $this->hasMany('App\Pricing');
    }
}
