<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cabang;
use App\Role;
use App\Formula;
use App\Formula_kat;
use App\Diagnosa;
use App\Dokter;
use App\Pasien;
use App\Nilai;
use App\Pricing;
use App\Cetak;
use Carbon\Carbon;
use App\Exports\KlinikExport;
use App\Exports\DokterExport;
use PDF,Excel;
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
        $month = Diagnosa::whereMonth('created_at', Carbon::now()->month)->count();
        $data = Diagnosa::all();
        
        $totall = 0;
        for ($i=0;  $i < count($today) ; $i++) { 
            $totall += (int)preg_replace("/\s/u","",Str::replaceFirst('.','',$today[$i]->pembayaran),1);
        }
        
        $total = 0;
        for ($i=0;  $i < count($data) ; $i++) { 
            $total += (int)preg_replace("/\s/u","",Str::replaceFirst('.','',$data[$i]->pembayaran),1);
        }
        
        return view('owner.home',compact('total','totall','today','month'))
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
        $a = rand(1000,9000);
        $b = $request->cabang_id . $a;
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'cabang_id' => 'required',
            'email' => 'required|unique:users',
        ]);
        if ($valid->fails()) {
            Session::flash('failed', 'Data update telah gagal');
            return redirect()->back()->withErrors($valid->errors())->withInput();
        }else{ 
            $data = User::create([
                'name' => $request->name,
                'username' => 'SP-' . $b,
                'cabang_id' => $request->cabang_id,
                'user_id' => Auth::user()->id,
                'email' => $request->email,
                'password' => Hash::make('SP' . $b),
            ]);
            $adm = Role::where('name', 'superadmin')->first();
            $data->attachRole($adm);
            if ($data) {
                Session::flash('success','Data berhasil ditambahkan');
                return redirect()->route('owner.user');
            }
        }
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
        
        return view('owner.diagnosa',compact('data','gas'));
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

    public function cetak_klinik(Request $request) {
        $dataa;
        $periode;
        $dia = array();
        $dk;
        if ($request->query('start_date') && $request->query('end_date')) {
            $dataa = Diagnosa::where('cabang_id', $request->query('cabang_id'))->whereDate('created_at', '>=' ,$request->query('start_date'))->whereDate('created_at','<=',$request->query('end_date'))->get();
            $dk = Diagnosa::where('cabang_id', $request->query('cabang_id'))->whereDate('created_at', '>=' ,$request->query('start_date'))->whereDate('created_at','<=',$request->query('end_date'))->get()->groupBy('dokter_id');
            $periode = $request->query('start_date') . ' - ' . $request->query('end_date');
            for ($i=0; $i < count($dataa); $i++) { 
                $ele = $dataa[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }elseif($request->query('start_date')){
            $dataa = Diagnosa::where('cabang_id', $request->query('cabang_id'))->whereDate('created_at',$request->query('start_date'))->get();
            $dk = Diagnosa::where('cabang_id', $request->query('cabang_id'))->whereDate('created_at',$request->query('start_date'))->get()->groupBy('dokter_id');
            $periode = $request->query('start_date');
            for ($i=0; $i < count($dataa); $i++) { 
                $ele = $dataa[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }
        // dd($dk);
        $headerHtml = view()->make('pdf.header_klinik')->render();
        $pdf = PDF::loadView('pdf.klinik', compact('dataa'));
        return $pdf
        ->setPaper('a4')
        ->setOrientation('portrait')
        ->setOption('margin-top', '25mm')
        ->setOption('header-font-name','Verdana')
        ->setOption('footer-font-name','Verdana')
        ->setOption('header-font-size','6')
        ->setOption('footer-font-size','6')
        ->setOption('header-html',$headerHtml)
        ->setOption('footer-right', 'Page [page] of [toPage]')
        ->inline();
    }
    
    public function cetak_dokter(Request $request) {
        $dataa;
        $periode;
        $dia = array();
        $dk;
        if ($request->query('start_date') && $request->query('end_date')) {
            $dataa = Diagnosa::where('cabang_id', $request->query('cabang_id'))->where('dokter_id', $request->query('dokter_id'))->whereDate('created_at', '>=' ,$request->query('start_date'))->whereDate('created_at','<=',$request->query('end_date'))->get();
            $dk = Diagnosa::where('cabang_id', $request->query('cabang_id'))->where('dokter_id', $request->query('dokter_id'))->whereDate('created_at', '>=' ,$request->query('start_date'))->whereDate('created_at','<=',$request->query('end_date'))->get()->groupBy('dokter_id');
            $periode = $request->query('start_date') . ' - ' . $request->query('end_date');
            for ($i=0; $i < count($dataa); $i++) { 
                $ele = $dataa[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }elseif($request->query('start_date')){
            $dataa = Diagnosa::where('cabang_id', $request->query('cabang_id'))->where('dokter_id', $request->query('dokter_id'))->whereDate('created_at',$request->query('start_date'))->get();
            $dk = Diagnosa::where('cabang_id', $request->query('cabang_id'))->where('dokter_id', $request->query('dokter_id'))->whereDate('created_at',$request->query('start_date'))->get()->groupBy('dokter_id');
            $periode = $request->query('start_date');
            for ($i=0; $i < count($dataa); $i++) { 
                $ele = $dataa[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }
        // dd($dk);
        $headerHtml = view()->make('pdf.header_dokter')->render();
        $pdf = PDF::loadView('pdf.dokter', compact('dataa'));
        return $pdf
        ->setPaper('a4')
        ->setOrientation('portrait')
        ->setOption('margin-top', '25mm')
        ->setOption('header-font-name','Verdana')
        ->setOption('footer-font-name','Verdana')
        ->setOption('header-font-size','6')
        ->setOption('footer-font-size','6')
        ->setOption('header-html',$headerHtml)
        ->setOption('footer-right', 'Page [page] of [toPage]')
        ->inline();
    }

    public function excel_klinik(Request $request) {
        $dataa;
        $periode;
        $dia = array();
        $dk;
        if ($request->query('start_date') && $request->query('end_date')) {
            $dataa = Diagnosa::where('cabang_id', $request->query('cabang_id'))->whereDate('created_at', '>=' ,$request->query('start_date'))->whereDate('created_at','<=',$request->query('end_date'))->get();
            $dk = Diagnosa::where('cabang_id', $request->query('cabang_id'))->whereDate('created_at', '>=' ,$request->query('start_date'))->whereDate('created_at','<=',$request->query('end_date'))->get()->groupBy('dokter_id');
            $periode = $request->query('start_date') . ' - ' . $request->query('end_date');
            for ($i=0; $i < count($dataa); $i++) { 
                $ele = $dataa[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }elseif($request->query('start_date')){
            $dataa = Diagnosa::where('cabang_id', $request->query('cabang_id'))->whereDate('created_at',$request->query('start_date'))->get();
            $dk = Diagnosa::where('cabang_id', $request->query('cabang_id'))->whereDate('created_at',$request->query('start_date'))->get()->groupBy('dokter_id');
            $periode = $request->query('start_date');
            for ($i=0; $i < count($dataa); $i++) { 
                $ele = $dataa[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }
        $klinik = strtoupper($request->query('cabang_name')) . ' - ' . strtoupper(date_format(date_create($request->query('start_date')),"d M Y")) . ' - ' . strtoupper(date_format(date_create($request->query('end_date')),"d M Y"));
        return Excel::download(new KlinikExport($dataa), $klinik .'.xlsx');
    }
    
    public function excel_dokter(Request $request) {
        $dataa;
        $periode;
        $dia = array();
        $dk;
        if ($request->query('start_date') && $request->query('end_date')) {
            $dataa = Diagnosa::where('cabang_id', $request->query('cabang_id'))->where('dokter_id', $request->query('dokter_id'))->whereDate('created_at', '>=' ,$request->query('start_date'))->whereDate('created_at','<=',$request->query('end_date'))->get();
            $dk = Diagnosa::where('cabang_id', $request->query('cabang_id'))->where('dokter_id', $request->query('dokter_id'))->whereDate('created_at', '>=' ,$request->query('start_date'))->whereDate('created_at','<=',$request->query('end_date'))->get()->groupBy('dokter_id');
            $periode = $request->query('start_date') . ' - ' . $request->query('end_date');
            for ($i=0; $i < count($dataa); $i++) { 
                $ele = $dataa[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }elseif($request->query('start_date')){
            $dataa = Diagnosa::where('cabang_id', $request->query('cabang_id'))->where('dokter_id', $request->query('dokter_id'))->whereDate('created_at',$request->query('start_date'))->get();
            $dk = Diagnosa::where('cabang_id', $request->query('cabang_id'))->where('dokter_id', $request->query('dokter_id'))->whereDate('created_at',$request->query('start_date'))->get()->groupBy('dokter_id');
            $periode = $request->query('start_date');
            for ($i=0; $i < count($dataa); $i++) { 
                $ele = $dataa[$i];
                $ele->ctd = $ele->created_at->format('d-m-Y');
                $ele->pasien_id = $ele->pasien->name;
                $ele->dokter_id = $ele->dokter->name;
                array_push($dia, $ele);
            }
        }
        $dokter = strtoupper($request->query('cabang_name')) . ' - ' . strtoupper($request->query('dokter_name')) . ' - ' . strtoupper(date_format(date_create($request->query('start_date')),"d M Y")) . ' - ' . strtoupper(date_format(date_create($request->query('end_date')),"d M Y"));
        return Excel::download(new DokterExport($dataa), $dokter .'.xlsx');
    }

    public function pasien() {
        return view('owner.pasien')->with('cabang', Cabang::all());
    }

    public function nilai() {
        $nilai = Nilai::all()->groupBy('formula_id')->toArray();
        // foreach($nilai as $nil => $item){
        // $dot  = Formula::where('id', $nil)->first();
        // $p = NULL;
        // $l = NULL;
        // $b = NULL;
        // $d = NULL;
        // $a = NULL;
        // $dat;
        // for($i = 0; $i < count($item); $i++){
        //     $lat = json_encode($item[$i]);
        //     $lot = json_decode($lat);
        //     if($lot->kelamin == "laki-laki"){
        //         $l =  " L :" .  $lot->normal;
        //     }elseif($lot->kelamin == "perempuan"){
        //         $p =  "P :" . $lot->normal;
        //     }elseif($lot->kelamin == "bayi"){
        //         $b =  " " . $lot->normal;
        //     }elseif($lot->kelamin == "dewasa"){
        //         $d =  $lot->normal;
        //     } else{
        //         $a =  $lot->normal;
        //     }
        // }
        // $dat = $p . $l .  $d . $b . $a;
        // $dot->content = $dat;
        // $dot->save();
        // }

        return view('owner.nilai',compact('nilai'));
    }
    
    public function nilai_edit($id) {
        $nilai = Nilai::where('formula_id',$id)->get();
        $formula = Formula::find($id);
        return view('owner.nilai_edit',compact('nilai','formula'));
    }
    
    public function nilai_update(Request $request, $id) {
        $nilai_id = json_decode($request->nilai_id);
        $data = json_decode($request->nilai_data);
        for ($i=0; $i < count($nilai_id); $i++) {
            $nil = Nilai::find($nilai_id[$i]);
            $nil->normal = $data[$i];
            $nil->save();
        }

        $formula = Formula::find($id);
        $formula->content = $request->formula_content;
        $formula->save();
        if ($formula) {
            Session::flash('success','Nilai normal telah diupdate pada database');
            return redirect()->route('owner.nilai');
        }
    }

}
