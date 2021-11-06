<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Dokter;
use App\Formula;
use App\Diagnosa;
use DB,Session,Uuid,Validator,Response;

class ApiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function pasiens(Request $request)
    {
        return Response::json([
            'code'  => 200,
            'data'  => Pasien::all()
        ]);
    }
    
    public function pasiens_search(Request $request, $a)
    {
        $data = Pasien::where('ktp',$a)->first();
        return Response::json([
            'code'  => 200,
            'data'  => $data
        ]);
    }
}
