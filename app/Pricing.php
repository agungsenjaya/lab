<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = ['cabang_id','user_id','status'];

    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }
}
