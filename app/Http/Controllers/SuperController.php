<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnosa;
use App\Dokter;
use App\Formula;
use App\Formula_kat;
use App\Pasien;
use App\User;
use App\Price;
use App\Cabang;
use App\Role;
use App\Pricing;
use App\Cetak;
use Carbon\Carbon;
use PDF;
use DB,Session,Uuid,Validator,Auth,Hash,Str;

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
        $data = Diagnosa::where('cabang_id', Auth::user()->cabang_id)->whereDate('created_at', Carbon::today())->get();
        $dokter = Dokter::where('cabang_id', Auth::user()->cabang_id)->get();
        $total = 0;
        for ($i=0;  $i < count($data) ; $i++) { 
            $total += (int)preg_replace("/\s/u","",Str::replaceFirst('.','',$data[$i]->pembayaran),1);
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
        // $data = Diagnosa::where('kode', $id)->first();
        // return view('super.diagnosa',compact('data'));
        $data = Diagnosa::where('kode', $id)->first();
        $dat = json_decode($data->data);
        $da = json_decode($dat[0]);
        
        for ($i=0; $i < count($da) ; $i++) {
            $ded = Formula_kat::find($da[$i]->data->formula_kat_id);
            $da[$i]->no_kategori = $ded->id;
            $da[$i]->kategori = $ded->judul;
        }
        $data->data = $da;

        $gas = array();
        foreach ($data->data as $element) {
            $gas[$element->kategori][] = $element;
        }
        
        return view('super.diagnosa',compact('data','gas'));
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
        $data = Dokter::find($id);
        $valid = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Gagal, coba periksa kembali');
            return redirect()->back();
        }else{
            $data->name = $request->name;
            $data->specialist = ($request->specialist) ? $request->specialist : NULL;
            $data->save();
            if ($data) {
                Session::flash('success','Data dokter berhasil diupdate.');
                return redirect()->route('super.dokter');
            }
        }
    }

    public function dokter_new()
    {
        return view('super.dokter_new');
    }

    public function dokter_store(Request $request)
    {
        // $valid = Dokter::where('name', $request->name)->where('specialist', $request->specialist)->where('cabang_id', Auth::user()->cabang_id)->first();
        $valid = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed','Nama dokter dan specialist sudah terdaftar sebelumnya.');
            return redirect()->route('super.dokter_new');
        }else{
            $data = Dokter::create([
                'name' => $request->name,
                'user_id' => Auth::user()->id,
                'specialist' => ($request->specialist) ? $request->specialist : NULL,
                'cabang_id' => Auth::user()->cabang_id,
            ]);
            if ($data) {
                Session::flash('success','Data dokter baru berhasil ditambahkan.');
                return redirect()->route('super.dokter');
            }
        }
    }

    public function user()
    {
        $data = User::where('cabang_id', Auth::user()->cabang_id)->get();
        return view('super.user',compact('data')); 
    }
   
    public function user_new()
    {
        return view('super.user_new')->with('cabang', Cabang::all());
    }
    
    public function user_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required','confirmed'],
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal, silahkan periksa kembali mungkin sudah terdaftar.');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $data = User::create([
                'name' => $request->name,
                'cabang_id' => Auth::user()->cabang_id,
                'user_id' => Auth::user()->id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $adm = Role::where('name', 'admin')->first();
            $data->attachRole($adm);
            if ($data) {
                Session::flash('success','User admin baru berhasil ditambahkan.');
                return redirect()->route('super.user');
            }
        }
    }
    
    public function user_edit($id)
    {
        $data = User::find($id);
        return view('super.user_edit',compact('data')); 
    }

    public function user_delete($id)
    {
        $data = User::find($id);
        $data->delete();
        if ($data) {
            Session::flash('success','User telah dihapus pada database');
            return redirect()->route('super.user');
        }
    }
    
    public function user_update(Request $request, $id)
    {
        $data = User::find($id);
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data gagal, silahkan periksa kembali mungkin sudah terdaftar.');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $data->name = $request->name; 
            $data->email = $request->email; 
            if ($request->password) {
                $dat =  Validator::make($request->password, [
                    'password' => ['required', 'string', 'confirmed'],
                ]);
                if ($dat->fails()) {
                    Session::flash('failed', 'Data update telah gagal');
                    return redirect()->back()->withErrors($valid->errors())->withInput();
                }
                $data->password = Hash::make($request->password); 
            }
            $data->save();

            if ($data) {
                Session::flash('success','User admin baru berhasil ditambahkan.');
                // return redirect(url()->previous());
                return redirect()->route('super.user');
            }
        }
    }

    public function account() {
        return view('super.account');
    }

    public function cabang_detail()
    {
        return view('super.cabang_detail');
    }

    public function laporan()
    {
        $data = Diagnosa::where('cabang_id', Auth::user()->cabang_id)->whereDate('created_at', Carbon::today())->get();
        $dokter = Dokter::where('cabang_id', Auth::user()->cabang_id)->get();
        $total = 0;
        for ($i=0;  $i < count($data) ; $i++) { 
            $total += (int)preg_replace("/\s/u","",Str::replaceFirst('.','',$data[$i]->pembayaran),1);
        }
        return view('super.laporan',compact('data','total','dokter'));
    }

    public function price()
    {
        $status = Pricing::where('cabang_id', Auth::user()->cabang_id)->first();
        if ($status->status == '1') {
            return view('super.price')->with('for_kat',Formula_kat::all());
        }
        return redirect()->route('dashboard.super');
    }

    public function cetak($id)
    {
        $data = Diagnosa::where('kode', $id)->first();
        $dat = json_decode($data->data);
        $da = json_decode($dat[0]);
        
        for ($i=0; $i < count($da) ; $i++) {
            $ded = Formula_kat::find($da[$i]->data->formula_kat_id);
            $da[$i]->no_kategori = $ded->id;
            $da[$i]->kategori = $ded->judul;
        }
        $data->data = $da;

        $gas = array();
        foreach ($data->data as $element) {
            $gas[$element->kategori][] = $element;
        }

        $headerHtml = view()->make('pdf.header',compact('data'))->render();
        $pdf = PDF::loadView('pdf.pasien', compact('data','gas'));
        return $pdf
        ->setOption('margin-top', '50mm')
        ->setOption('footer-left','Sistem Laboratorium')
        ->setOption('header-font-name','Verdana')
        ->setOption('footer-font-name','Verdana')
        ->setOption('header-font-size','6')
        ->setOption('footer-font-size','6')
        ->setOption('header-html',$headerHtml)
        ->setOption('footer-right', 'Page [page] of [toPage]')
        ->inline();
    }
    
    // public function formula()
    // {
    //     $data = Formula::where('cabang_id', Auth::user()->cabang_id)->get();
    //     return view('super.formula',compact('data'));
    // }
    
    // public function formula_new()
    // {
    //     return view('super.formula_new');
    // }

    // public function formula_store(Request $request)
    // {
    //     $valid = Validator::make($request->all(), [
    //         'judul' => 'required|unique:formulas',
    //         'pembayaran' => 'required',
    //     ]);
    //     if ($valid->fails()) {
    //         Session::flash('failed', 'Data update telah gagal');
    //         return redirect()->back()->withErrors($valid->errors())->withInput();
    //     }else{ 
    //         $data = User::create([
    //             'judul' => $request->judul,
    //             'user_id' => Auth::user()->id,
    //             'cabang_id' => Auth::user()->cabang_id,
    //             'pembayaran' => $request->pembayaran,
    //         ]);
    //         if ($data) {
    //             Session::flash('success','Data berhasil ditambahkan');
    //             return redirect()->route('super.formula');
    //         }
    //     }
    // }

    // public function formula_edit($id)
    // {
    //     $data = Formula::find($id);
    //     return view('super.formula_edit',compact('data'));
    // }

    // public function formula_update(Request $request, $id)
    // {
    //     $data = Formula::find($id);
    //     $valid = Validator::make($request->all(), [
    //         'judul' => 'required',
    //         'pembayaran' => 'required',
    //     ]);
    //     if ($valid->fails()) {
    //         Session::flash('failed', 'Data update telah gagal');
    //         return redirect()->back()->withErrors($valid->errors())->withInput();
    //     }else{ 
    //         $data->judul = $request->judul; 
    //         $data->pembayaran = $request->pembayaran; 
    //         $data->save();

    //         if ($data) {
    //             Session::flash('success','Data berhasil ditambahkan');
    //             return redirect()->route('super.formula');
    //         }
    //     }
    // }

}
