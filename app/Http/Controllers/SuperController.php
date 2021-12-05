<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnosa;
use App\Dokter;
use App\Pasien;
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

    public function diagnosa($id)
    {
        $data = Diagnosa::where('kode', $id)->first();
        return view('super.diagnosa',compact('data'));
    }

    public function pasien_detail($id)
    {
        $pasien = Pasien::where('id', $id)->first();
        return view('super.pasien_detail',compact('pasien'));
    }
    
    public function pasien_search() {
        return view('super.pasien_search')->with('pasien', Pasien::all());
    }

    public function dokter()
    {
        $data = Dokter::where('cabang_id', Auth::user()->cabang_id)->get();
        return view('super.dokter',compact('data'));
    }

    public function dokter_edit($id)
    {
        $data = Dokter::where('id', $id)->first();
        return view('super.dokter_edit',compact('data'));
    }
    
    public function dokter_update(Request $request, $id)
    {
        // 
    }

    public function dokter_new()
    {
        return view('super.dokter_new');
    }

    public function dokter_store(Request $request)
    {
        $valid = Dokter::where('name', $request->name)->where('specialist', $request->specialist)->where('cabang_id', Auth::user()->cabang_id)->first();
        if ($valid) {
            Session::flash('failed','Nama dokter dan specialist sudah terdaftar sebelumnya.');
            return redirect()->route('super.dokter_new');
        }else{
            $data = Dokter::create([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'specialist' => $request->specialist,
                'cabang_id' => Auth::user()->cabang_id,
            ]);
            if ($data) {
                Session::flash('success','Data dokter baru berhasil ditambahkan.');
                return redirect()->route('super.dokter');
            }
        }
    }
}
