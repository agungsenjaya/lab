<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    public function diagnosas()
    {
    	return $this->hasMany('App\Diagnosa');
    }
}
