<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $fillable = ['kode','dokter_id','pasien_id','user_id','catatan','pembayaran','cabang_id','data'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User')->withTrashed();
    }
    
    public function pasiens()
    {
    	return $this->hasMany('App\Pasien');
    }
    
    public function dokter()
    {
    	return $this->belongsTo('App\Dokter');
    }
    
    public function formula()
    {
    	return $this->belongsTo('App\Formula');
    }
    
    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }

    public function pasien()
    {
    	return $this->belongsTo('App\Pasien');
    }
}
