<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    
    public function diagnosas()
    {
    	return $this->hasMany('App\Diagnosa');
    }
}
