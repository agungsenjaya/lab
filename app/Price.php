<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['cabang_id','user_id','formula_id','pembayaran'];
}
