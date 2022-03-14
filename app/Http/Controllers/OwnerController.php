<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cabang;
use App\Role;
use App\Formula;
use App\Diagnosa;
use App\Pasien;
use DB,Session,Uuid,Validator,Auth,Hash;

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
        return view('owner.home');
    }

    public function user()
    {
        return view('owner.user')->with('user', User::all());
    }

    public function user_new()
    {
        return view('owner.user_new');
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
            'kelamin' => 'required',
            'cabang_id' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'alamat' => 'required',
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
                'kelamin' => $request->kelamin,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
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
            'kelamin' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data update telah gagal');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $data->name = $request->name; 
            $data->kelamin = $request->kelamin; 
            $data->email = $request->email; 
            $data->phone = $request->phone; 
            $data->alamat = $request->alamat; 
            if ($request->password) {
                $dat =  Validator::make($request->password, [
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
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
                'kota' => $request->kota,
                'alamat' => strtolower($request->alamat),
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
        return view('owner.cabang_detail',compact('data'));
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

    public function laporan()
    {
        return view('owner.laporan');
    }
}
