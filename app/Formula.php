<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    protected $fillable = ['user_id','judul','content','formula_kat_id','formula_sub_id'];
    
    public function diagnosas()
    {
    	return $this->hasMany('App\Diagnosa');
    }
}
