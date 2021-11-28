<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\Dokter;
use App\Formula;
use App\Diagnosa;
use DB,Session,Uuid,Validator,Auth;

class AdminController extends Controller
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
    public function index()
    {
        return view('admin.index');
    }

    public function pasien()
    {
        $pasien = Diagnosa::where('cabang_id', Auth::user()->cabang_id)->get();
        return view('admin.pasien',compact('pasien'));
    }
    
    public function pasien_search()
    {
        return view('admin.pasien_search')->with('pasien', Pasien::all());
    }
    
    public function pasien_new()
    {
        // $uuid = Uuid::generate(1);
        // dd($uuid->string);
        return view('admin.pasien_new')->with('pasien', Pasien::all())->with('dokter', Dokter::all())->with('formula', Formula::all());
    }

    public function pasien_store(Request $request)
    {
        $pasien;
        $valpasien = Validator::make($request->all(), [
            'ktp' => 'required|unique:pasiens',
        ]);
        if ($valpasien->fails()) {
            $pasien = Pasien::where('ktp',$request->ktp)->first();
            $pasien = $pasien->id;
            // Session::flash('failed','Data gagal diinput, coba periksa kembali.');
            // return redirect()->back()->withErrors($valpasien)->withInput();
        }else{
            $pasien = Pasien::create([
                'name' => $request->name,
                'tanggal_lahir' => $request->tgl,
                'ktp' => $request->ktp,
                'kelamin' => $request->kelamin,
                'alamat' => $request->alamat,
            ]);
            if ($pasien) {
                $pasien = $pasien->id;
            }
        }
        $formula = json_decode($request->formula);
        $uuid = Uuid::generate(1);
        $diagnosa = Diagnosa::create([
            'kode'  => $uuid->string,
            'pasien_id' => $pasien,
            'cabang_id' => Auth::user()->cabang_id,
            'dokter_id' => $request->dokter,
            'user_id' => $request->user,
            'formula_id' => $formula->id,
            'pembayaran' => $formula->pembayaran,
        ]);
        if ($diagnosa) {
            Session::flash('success','Anda berhasil menambahkan data.');
            return redirect()->route('admin.diagnosa',$diagnosa->kode);
        }
    }

    public function diagnosa($id)
    {
        $data = Diagnosa::where('kode', $id)->first();
        return view('admin.diagnosa',compact('data'));
    }

    public function pasien_detail($id)
    {
        $pasien = Pasien::where('id', $id)->first();
        return view('admin.pasien_detail',compact('pasien'));
    }
}
