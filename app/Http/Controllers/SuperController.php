<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnosa;
use App\Dokter;
use DB,Session,Uuid,Validator,Auth;

class SuperController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $location = $request->ipinfo->all;
        $data = Diagnosa::where('cabang_id', Auth::user()->cabang_id)->get();
        $dokter = Dokter::where('cabang_id', Auth::user()->cabang_id)->get();
        $total = 0;
        for ($i=0;  $i < count($data) ; $i++) { 
            $total += str_replace('.','',$data[$i]->pembayaran);
        }
        return view('super.home',compact('data','total','dokter'));
    }

    public function pasien()
    {
        $data = Diagnosa::where('cabang_id', Auth::user()->cabang_id)->get();
        return view('super.pasien',compact('data'));
    }

    public function pasien_detail($id)
    {
        $pasien = Diagnosa::where('kode', $id)->first();
        return view('super.pasien_detail',compact('pasien'));
    }
    
    public function pasien_search() {
        // 
    }
}
