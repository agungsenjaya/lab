<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cabang;
use App\Role;
use App\Formula;
use App\Diagnosa;
use App\Dokter;
use App\Pasien;
use App\Pricing;
use App\Cetak;
use Carbon\Carbon;
use DB,Session,Uuid,Validator,Auth,Hash,Str;

class OwnerController extends Controller
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
        $today = Diagnosa::whereDate('created_at', Carbon::today())->get();
        $data = Diagnosa::all();
        
        $totall = 0;
        for ($i=0;  $i < count($today) ; $i++) { 
            $totall += (int)preg_replace("/\s/u","",Str::replaceFirst('.','',$today[$i]->pembayaran),1);
        }
        
        $total = 0;
        for ($i=0;  $i < count($data) ; $i++) { 
            $total += (int)preg_replace("/\s/u","",Str::replaceFirst('.','',$data[$i]->pembayaran),1);
        }
        return view('owner.home',compact('total','totall','today'))
        ->with('cabang',Cabang::all())
        ->with('user',User::all())
        ->with('pasien',Pasien::all())
        ->with('diagnosa',Diagnosa::all())
        ->with('dokter',Dokter::all());
    }

    public function user()
    {
        return view('owner.user')->with('user', User::all());
    }

    public function user_new()
    {
        return view('owner.user_new')->with('cabang', Cabang::all());
    }

    public function user_edit($id)
    {
        $data = User::find($id);
        return view('owner.user_edit',compact('data'));
    }
    
    public function user_delete($id)
    {
        $data = User::find($id);
        $data->delete();
        if ($data) {
            Session::flash('success','User telah dihapus pada database');
            return redirect()->route('owner.user');
        }
    }

    public function user_store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'cabang_id' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required','confirmed'],
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data update telah gagal');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $data = User::create([
                'name' => $request->name,
                'cabang_id' => $request->cabang_id,
                'user_id' => Auth::user()->id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $adm = Role::where('name', 'superadmin')->first();
            $data->attachRole($adm);
            if ($data) {
                Session::flash('success','Data berhasil ditambahkan');
                return redirect()->route('owner.user');
            }
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
            Session::flash('failed', 'Data update telah gagal');
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
                Session::flash('success','Data berhasil ditambahkan');
                return redirect()->route('owner.user');
            }
        }
    }

    public function cabang()
    {
        return view('owner.cabang')->with('cabang', Cabang::all());
    }
    
    public function cabang_new()
    {
        return view('owner.cabang_new');
    }

    public function cabang_store(Request $request)
    {
        $uuid = Uuid::generate(1);
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data insert telah gagal');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{

            $data = Cabang::create([
                'name' => strtolower($request->name),
                'kode' => substr($uuid->string,0,8),
                'kota' => $request->kota,
                'alamat' => strtolower($request->alamat),
            ]);

            Pricing::create([
                'user_id' => Auth::user()->id,
                'cabang_id' => $data->id,
                'status' => '0',
            ]);
            
            if ($data) {
                Session::flash('success','Data berhasil ditambahkan');
                return redirect()->route('owner.cabang');
            }
        }
    }
    
    public function cabang_edit($id)
    {
        $data = Cabang::find($id);
        return view('owner.cabang_edit',compact('data'));
    }
    
    public function cabang_detail($id)
    {
        $data = Cabang::find($id);
        $today = Diagnosa::where('cabang_id', $id)->whereDate('created_at', Carbon::today())->count();
        return view('owner.cabang_detail',compact('data','today'));
    }

    public function cabang_update(Request $request, $id)
    {
        $data = Cabang::find($id);
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'kota' => 'required',
            'img' => 'mimes:jpg,png,bmp',
            'alamat' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data update telah gagal');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 

            if ($request->hasFile('img')) {
                $img = $request->img;
                $img_new = time(). $img->getClientOriginalName();
                $img->move('upload/cabang', strtolower($img_new));
                $data->img = 'upload/cabang/' . strtolower($img_new);
            }

            $data->name = $request->name; 
            $data->kota = $request->kota; 
            $data->phone = $request->phone; 
            $data->alamat = $request->alamat; 
            $data->save();

            if ($data) {
                Session::flash('success','Data berhasil ditambahkan');
                return redirect()->route('owner.cabang');
            }
        }
    }

    public function laporan($id)
    {
        $data = Diagnosa::where('cabang_id', $id)->get();
        $cab = Cabang::find($id);
        $dokter = Dokter::where('cabang_id', $id)->get();
        $total = 0;
        for ($i=0;  $i < count($data) ; $i++) { 
            $total += (int)str_replace('.','',$data[$i]->pembayaran);
        }
        return view('owner.laporan',compact('cab','dokter','data'))->with('cabang', Cabang::all());
    }

    public function account() {
        return view('owner.account');
    }

    public function pricing() {
        return view('owner.pricing')->with('cabang',Cabang::all());
    }
}
