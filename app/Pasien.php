<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    protected $fillable = ['name','ktp','tanggal_lahir','alamat','kelamin'];

    public function diagnosa()
    {
    	return $this->belongsTo('App\Diagnosa');
    }
    
    public function diagnosas()
    {
    	return $this->hasMany('App\Diagnosa');
    }
}
